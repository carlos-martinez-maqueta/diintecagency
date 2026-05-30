<?php
/**
 * Capa de administración: CRUD para proyectos, clientes, marcas (trust),
 * ubicaciones del mapa, servicios.
 */
class Admin
{
    private static function conn(): PDO
    {
        global $conn;
        return $conn;
    }

    /* ============ PROYECTOS ============ */

    public static function allProjects(): array
    {
        return self::conn()->query("SELECT * FROM tbl_project ORDER BY sort_order ASC, id DESC")->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findProject(int $id): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_project WHERE id = :id");
        $s->execute([':id' => $id]);
        $row = $s->fetch(PDO::FETCH_OBJ);
        return $row ?: null;
    }

    public static function findProjectBySlug(string $slug): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_project WHERE slug = :s AND state = 'active' LIMIT 1");
        $s->execute([':s' => $slug]);
        $row = $s->fetch(PDO::FETCH_OBJ);
        return $row ?: null;
    }

    public static function saveProject(array $d): int
    {
        $isUpdate = !empty($d['id']);
        $params = [
            ':title' => $d['title'],
            ':slug' => $d['slug'],
            ':description' => $d['description'] ?? '',
            ':long_description' => $d['long_description'] ?? '',
            ':category' => $d['category'] ?? '',
            ':client_name' => $d['client_name'] ?? '',
            ':city' => $d['city'] ?? '',
            ':project_url' => $d['project_url'] ?? '',
            ':image' => $d['image'] ?? '',
            ':is_featured' => !empty($d['is_featured']) ? 1 : 0,
            ':sort_order' => (int) ($d['sort_order'] ?? 0),
            ':state' => $d['state'] ?? 'active',
        ];
        if ($isUpdate) {
            $params[':id'] = (int) $d['id'];
            $sql = "UPDATE tbl_project SET title=:title, slug=:slug, description=:description, long_description=:long_description, category=:category, client_name=:client_name, city=:city, project_url=:project_url, image=:image, is_featured=:is_featured, sort_order=:sort_order, state=:state WHERE id=:id";
            self::conn()->prepare($sql)->execute($params);
            return (int) $d['id'];
        }
        $sql = "INSERT INTO tbl_project (title, slug, description, long_description, category, client_name, city, project_url, image, is_featured, sort_order, state) VALUES (:title, :slug, :description, :long_description, :category, :client_name, :city, :project_url, :image, :is_featured, :sort_order, :state)";
        self::conn()->prepare($sql)->execute($params);
        return (int) self::conn()->lastInsertId();
    }

    public static function deleteProject(int $id): void
    {
        self::conn()->prepare("DELETE FROM tbl_project_image WHERE project_id = :id")->execute([':id' => $id]);
        self::conn()->prepare("DELETE FROM tbl_project WHERE id = :id")->execute([':id' => $id]);
    }

    public static function projectImages(int $projectId): array
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_project_image WHERE project_id = :id ORDER BY sort_order ASC, id ASC");
        $s->execute([':id' => $projectId]);
        return $s->fetchAll(PDO::FETCH_OBJ);
    }

    public static function addProjectImage(int $projectId, string $path, string $caption = '', int $sortOrder = 0): void
    {
        $s = self::conn()->prepare("INSERT INTO tbl_project_image (project_id, image, caption, sort_order) VALUES (:p, :i, :c, :s)");
        $s->execute([':p' => $projectId, ':i' => $path, ':c' => $caption, ':s' => $sortOrder]);
    }

    public static function deleteProjectImage(int $imageId): void
    {
        $img = self::conn()->prepare("SELECT image FROM tbl_project_image WHERE id = :id");
        $img->execute([':id' => $imageId]);
        $row = $img->fetch(PDO::FETCH_OBJ);
        if ($row && !empty($row->image)) {
            $abs = __DIR__ . '/../../' . ltrim($row->image, '/');
            if (is_file($abs)) @unlink($abs);
        }
        self::conn()->prepare("DELETE FROM tbl_project_image WHERE id = :id")->execute([':id' => $imageId]);
    }

    /* ============ CLIENTES ============ */

    public static function allClients(): array
    {
        return self::conn()->query("SELECT * FROM tbl_client ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findClient(int $id): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_client WHERE id = :id");
        $s->execute([':id' => $id]);
        return $s->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public static function saveClient(array $d): int
    {
        $params = [
            ':name' => $d['name'],
            ':logo' => $d['logo'] ?? '',
            ':hover_text' => $d['hover_text'] ?? '',
            ':tagline' => $d['tagline'] ?? '',
            ':project_url' => $d['project_url'] ?? '',
            ':sort_order' => (int) ($d['sort_order'] ?? 0),
            ':state' => $d['state'] ?? 'active',
        ];
        if (!empty($d['id'])) {
            $params[':id'] = (int) $d['id'];
            $sql = "UPDATE tbl_client SET name=:name, logo=:logo, hover_text=:hover_text, tagline=:tagline, project_url=:project_url, sort_order=:sort_order, state=:state WHERE id=:id";
            self::conn()->prepare($sql)->execute($params);
            return (int) $d['id'];
        }
        $sql = "INSERT INTO tbl_client (name, logo, hover_text, tagline, project_url, sort_order, state) VALUES (:name, :logo, :hover_text, :tagline, :project_url, :sort_order, :state)";
        self::conn()->prepare($sql)->execute($params);
        return (int) self::conn()->lastInsertId();
    }

    public static function deleteClient(int $id): void
    {
        self::conn()->prepare("DELETE FROM tbl_client WHERE id = :id")->execute([':id' => $id]);
    }

    /* ============ TRUST (Confían en nosotros) ============ */

    public static function allTrust(): array
    {
        return self::conn()->query("SELECT * FROM tbl_trust_brand ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findTrust(int $id): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_trust_brand WHERE id = :id");
        $s->execute([':id' => $id]);
        return $s->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public static function saveTrust(array $d): int
    {
        $params = [
            ':name' => $d['name'],
            ':image' => $d['image'] ?? '',
            ':url' => $d['url'] ?? '',
            ':sort_order' => (int) ($d['sort_order'] ?? 0),
            ':state' => $d['state'] ?? 'active',
        ];
        if (!empty($d['id'])) {
            $params[':id'] = (int) $d['id'];
            $sql = "UPDATE tbl_trust_brand SET name=:name, image=:image, url=:url, sort_order=:sort_order, state=:state WHERE id=:id";
            self::conn()->prepare($sql)->execute($params);
            return (int) $d['id'];
        }
        $sql = "INSERT INTO tbl_trust_brand (name, image, url, sort_order, state) VALUES (:name, :image, :url, :sort_order, :state)";
        self::conn()->prepare($sql)->execute($params);
        return (int) self::conn()->lastInsertId();
    }

    public static function deleteTrust(int $id): void
    {
        self::conn()->prepare("DELETE FROM tbl_trust_brand WHERE id = :id")->execute([':id' => $id]);
    }

    /* ============ LOCATIONS (Mapa) ============ */

    public static function allLocations(): array
    {
        return self::conn()->query("SELECT * FROM tbl_location ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findLocation(int $id): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_location WHERE id = :id");
        $s->execute([':id' => $id]);
        return $s->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public static function saveLocation(array $d): int
    {
        $params = [
            ':city' => $d['city'],
            ':region' => $d['region'] ?? '',
            ':label' => $d['label'] ?? '',
            ':description' => $d['description'] ?? '',
            ':lng' => (float) ($d['lng'] ?? 0),
            ':lat' => (float) ($d['lat'] ?? 0),
            ':projects_count' => (int) ($d['projects_count'] ?? 0),
            ':sort_order' => (int) ($d['sort_order'] ?? 0),
            ':state' => $d['state'] ?? 'active',
        ];
        if (!empty($d['id'])) {
            $params[':id'] = (int) $d['id'];
            $sql = "UPDATE tbl_location SET city=:city, region=:region, label=:label, description=:description, lng=:lng, lat=:lat, projects_count=:projects_count, sort_order=:sort_order, state=:state WHERE id=:id";
            self::conn()->prepare($sql)->execute($params);
            return (int) $d['id'];
        }
        $sql = "INSERT INTO tbl_location (city, region, label, description, lng, lat, projects_count, sort_order, state) VALUES (:city, :region, :label, :description, :lng, :lat, :projects_count, :sort_order, :state)";
        self::conn()->prepare($sql)->execute($params);
        return (int) self::conn()->lastInsertId();
    }

    public static function deleteLocation(int $id): void
    {
        self::conn()->prepare("DELETE FROM tbl_location WHERE id = :id")->execute([':id' => $id]);
    }

    /* ============ SERVICIOS ============ */

    public static function allServices(): array
    {
        return self::conn()->query("SELECT * FROM tbl_service ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findService(int $id): ?object
    {
        $s = self::conn()->prepare("SELECT * FROM tbl_service WHERE id = :id");
        $s->execute([':id' => $id]);
        return $s->fetch(PDO::FETCH_OBJ) ?: null;
    }

    public static function saveService(array $d): int
    {
        $highlights = $d['highlights'] ?? '';
        if (is_array($highlights)) $highlights = json_encode(array_values(array_filter($highlights)), JSON_UNESCAPED_UNICODE);
        $params = [
            ':title' => $d['title'],
            ':slug' => $d['slug'],
            ':short_desc' => $d['short_desc'] ?? '',
            ':long_desc' => $d['long_desc'] ?? '',
            ':highlights' => $highlights,
            ':sort_order' => (int) ($d['sort_order'] ?? 0),
            ':state' => $d['state'] ?? 'active',
        ];
        if (!empty($d['id'])) {
            $params[':id'] = (int) $d['id'];
            $sql = "UPDATE tbl_service SET title=:title, slug=:slug, short_desc=:short_desc, long_desc=:long_desc, highlights=:highlights, sort_order=:sort_order, state=:state WHERE id=:id";
            self::conn()->prepare($sql)->execute($params);
            return (int) $d['id'];
        }
        $sql = "INSERT INTO tbl_service (title, slug, short_desc, long_desc, highlights, sort_order, state) VALUES (:title, :slug, :short_desc, :long_desc, :highlights, :sort_order, :state)";
        self::conn()->prepare($sql)->execute($params);
        return (int) self::conn()->lastInsertId();
    }

    public static function deleteService(int $id): void
    {
        self::conn()->prepare("DELETE FROM tbl_service WHERE id = :id")->execute([':id' => $id]);
    }

    /* ============ Helpers ============ */

    public static function uploadImage(string $field, string $folder = 'projects'): ?string
    {
        if (empty($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return null;
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg', 'gif'];
        $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed, true)) return null;
        $dir = __DIR__ . '/../img/' . $folder;
        if (!is_dir($dir)) @mkdir($dir, 0775, true);
        $name = uniqid('img_', true) . '.' . $ext;
        $abs = $dir . '/' . $name;
        if (move_uploaded_file($_FILES[$field]['tmp_name'], $abs)) {
            return 'dashboard/img/' . $folder . '/' . $name;
        }
        return null;
    }

    public static function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        return strtolower($text ?: 'item');
    }
}
