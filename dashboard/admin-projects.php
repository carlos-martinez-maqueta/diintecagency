<?php include 'partials/header.php';
require_once __DIR__ . '/class/Admin.php';

$action = $_POST['action'] ?? '';
$flash = '';
if ($action === 'save') {
    $imagePath = Admin::uploadImage('image', 'projects');
    if ($imagePath) $_POST['image'] = $imagePath;
    if (empty($_POST['slug'])) $_POST['slug'] = Admin::slugify($_POST['title'] ?? 'proyecto');
    $id = Admin::saveProject($_POST);

    if (!empty($_FILES['gallery']['name'][0])) {
        foreach ($_FILES['gallery']['name'] as $i => $name) {
            if (!$name) continue;
            $tmp = [
                'name' => $_FILES['gallery']['name'][$i],
                'type' => $_FILES['gallery']['type'][$i],
                'tmp_name' => $_FILES['gallery']['tmp_name'][$i],
                'error' => $_FILES['gallery']['error'][$i],
                'size' => $_FILES['gallery']['size'][$i],
            ];
            $bak = $_FILES['__single']; $_FILES['__single'] = $tmp;
            $p = Admin::uploadImage('__single', 'projects');
            $_FILES['__single'] = $bak;
            if ($p) Admin::addProjectImage($id, $p, '', $i);
        }
    }
    $flash = 'Proyecto guardado.';
}
if ($action === 'delete' && !empty($_POST['id'])) {
    Admin::deleteProject((int) $_POST['id']);
    $flash = 'Proyecto eliminado.';
}
if ($action === 'delete-image' && !empty($_POST['image_id'])) {
    Admin::deleteProjectImage((int) $_POST['image_id']);
    $flash = 'Imagen eliminada.';
}

$projects = Admin::allProjects();
$editing = null;
if (!empty($_GET['edit'])) $editing = Admin::findProject((int) $_GET['edit']);
$editingImages = $editing ? Admin::projectImages((int) $editing->id) : [];
?>

<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Proyectos</h1>
                <a href="admin-projects" class="btn btn-primary btn-sm"><i class="fas fa-plus me-2"></i>Nuevo proyecto</a>
            </div>

            <?php if ($flash): ?><div class="alert alert-success py-2"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card shadow"><div class="card-body">
                        <h5 class="mb-3"><?= $editing ? 'Editar proyecto' : 'Nuevo proyecto' ?></h5>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="save">
                            <input type="hidden" name="id" value="<?= $editing->id ?? '' ?>">

                            <div class="mb-2"><label class="form-label">Título *</label>
                                <input type="text" name="title" class="form-control" required value="<?= htmlspecialchars($editing->title ?? '') ?>"></div>

                            <div class="mb-2"><label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($editing->slug ?? '') ?>" placeholder="auto si está vacío"></div>

                            <div class="mb-2"><label class="form-label">Categoría</label>
                                <input type="text" name="category" class="form-control" value="<?= htmlspecialchars($editing->category ?? '') ?>"></div>

                            <div class="row">
                                <div class="col-7 mb-2"><label class="form-label">Cliente</label>
                                    <input type="text" name="client_name" class="form-control" value="<?= htmlspecialchars($editing->client_name ?? '') ?>"></div>
                                <div class="col-5 mb-2"><label class="form-label">Ciudad</label>
                                    <input type="text" name="city" class="form-control" value="<?= htmlspecialchars($editing->city ?? '') ?>"></div>
                            </div>

                            <div class="mb-2"><label class="form-label">URL del proyecto (opcional)</label>
                                <input type="url" name="project_url" class="form-control" value="<?= htmlspecialchars($editing->project_url ?? '') ?>"></div>

                            <div class="mb-2"><label class="form-label">Descripción corta</label>
                                <textarea name="description" rows="2" class="form-control"><?= htmlspecialchars($editing->description ?? '') ?></textarea></div>

                            <div class="mb-2"><label class="form-label">Descripción larga (detalle)</label>
                                <textarea name="long_description" rows="4" class="form-control"><?= htmlspecialchars($editing->long_description ?? '') ?></textarea></div>

                            <div class="mb-2"><label class="form-label">Imagen principal</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <?php if (!empty($editing->image)): ?>
                                    <small class="text-muted d-block mt-1"><img src="../<?= htmlspecialchars($editing->image) ?>" style="height:40px"> <?= htmlspecialchars($editing->image) ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="mb-2"><label class="form-label">Galería de imágenes (puedes subir varias)</label>
                                <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple></div>

                            <div class="row">
                                <div class="col-4 mb-2"><label class="form-label">Orden</label>
                                    <input type="number" name="sort_order" class="form-control" value="<?= (int) ($editing->sort_order ?? 0) ?>"></div>
                                <div class="col-4 mb-2"><label class="form-label">Destacado</label>
                                    <select name="is_featured" class="form-control"><option value="1" <?= !empty($editing->is_featured) ? 'selected' : '' ?>>Sí</option><option value="0" <?= empty($editing->is_featured) ? 'selected' : '' ?>>No</option></select></div>
                                <div class="col-4 mb-2"><label class="form-label">Estado</label>
                                    <select name="state" class="form-control"><option value="active" <?= ($editing->state ?? 'active') === 'active' ? 'selected' : '' ?>>Activo</option><option value="inactive" <?= ($editing->state ?? '') === 'inactive' ? 'selected' : '' ?>>Inactivo</option></select></div>
                            </div>

                            <button class="btn btn-primary mt-2"><i class="bx bx-save me-1"></i>Guardar</button>
                            <?php if ($editing): ?><a href="admin-projects" class="btn btn-secondary mt-2">Cancelar</a><?php endif; ?>
                        </form>

                        <?php if ($editing && $editingImages): ?>
                            <hr><h6>Galería actual</h6>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($editingImages as $img): ?>
                                    <div class="border rounded p-1 position-relative">
                                        <img src="../<?= htmlspecialchars($img->image) ?>" style="height:60px">
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="action" value="delete-image">
                                            <input type="hidden" name="image_id" value="<?= (int) $img->id ?>">
                                            <button class="btn btn-sm btn-link text-danger p-0">×</button>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div></div>
                </div>

                <div class="col-lg-7">
                    <div class="table-responsive shadow p-3 bg-white rounded">
                        <table class="table table-sm align-middle">
                            <thead><tr><th>Imagen</th><th>Título</th><th>Categoría</th><th>Estado</th><th></th></tr></thead>
                            <tbody>
                            <?php foreach ($projects as $p): ?>
                                <tr>
                                    <td><?php if (!empty($p->image)): ?><img src="../<?= htmlspecialchars($p->image) ?>" style="height:40px"><?php endif; ?></td>
                                    <td><strong><?= htmlspecialchars($p->title) ?></strong><br><small class="text-muted"><?= htmlspecialchars($p->slug) ?></small></td>
                                    <td><?= htmlspecialchars($p->category) ?></td>
                                    <td><span class="badge bg-<?= $p->state === 'active' ? 'success' : 'secondary' ?>"><?= $p->state ?></span></td>
                                    <td class="text-end">
                                        <a href="admin-projects?edit=<?= (int) $p->id ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar proyecto?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= (int) $p->id ?>">
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php' ?>
