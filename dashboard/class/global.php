<?php
class Globales
{
    // Objeto Admin
    public static function getAdminFech($id)
    {
        global $conn;
        $statement = $conn->prepare("SELECT * FROM tbl_admin WHERE id=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public static function getBlogAllWithLabels()
    {
        global $conn;
        $stmt = $conn->prepare("
            SELECT 
                b.id,
                b.title,
                b.description,
                b.banner,
                b.date_create,
                b.summer,
                b.friendly_url,
                b.state,
                l.name AS label_name
            FROM 
                tbl_blog b
            LEFT JOIN 
                tbl_blog_label bl ON b.id = bl.blog_id
            LEFT JOIN 
                tbl_label l ON bl.label_id = l.id
            ORDER BY 
                b.id DESC
        ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Agrupar por blog
        $blogs = [];
        foreach ($rows as $row) {
            $id = $row['id'];
            if (!isset($blogs[$id])) {
                $blogs[$id] = [
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'banner' => $row['banner'],
                    'date_create' => $row['date_create'],
                    'summer' => $row['summer'],
                    'friendly_url' => $row['friendly_url'],
                    'state' => $row['state'],
                    'labels' => []
                ];
            }
            if (!empty($row['label_name'])) {
                $blogs[$id]['labels'][] = $row['label_name'];
            }
        }
        // Reindexar para obtener un array numérico
        return array_values($blogs);
    }
    // section blog
    public static function getBlogAll()
    {
        global $conn;
        $statement = $conn->prepare("SELECT * FROM tbl_blog");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function getBlogId($id)
    {
        global $conn;
        $statement = $conn->prepare("SELECT * FROM tbl_blog WHERE id=:id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public static function getBlogByFriendlyUrl($slug)
    {
        global $conn;
        $statement = $conn->prepare(
            "SELECT * FROM tbl_blog WHERE friendly_url = :slug AND state = 'active' LIMIT 1"
        );
        $statement->bindValue(':slug', $slug);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public static function getBlogLabels($blog_id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT label_id FROM tbl_blog_label WHERE blog_id = :blog_id");
        $stmt->bindParam(':blog_id', $blog_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }


    public static function getLabelAll()
    {
        global $conn;
        $statement = $conn->prepare("SELECT * FROM tbl_label");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public static function addBlog($title, $description, $summernote, $url)
    {
        global $conn;

        $sql = "INSERT INTO tbl_blog (title, description, date_create, summer, friendly_url, state) 
            VALUES (:title, :description, NOW(), :summer, :friendly_url, 'active')";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':summer', $summernote);
        $stmt->bindParam(':friendly_url', $url);

        return $stmt;
    }
    public static function editImageBlog($id, $banner)
    {
        global $conn;
        $sql = "UPDATE tbl_blog SET banner=:banner WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindParam(':banner', $banner);
        return $stmt;
    }
}
