<?php include 'partials/header.php';
require_once __DIR__ . '/class/Admin.php';

$flash = '';
$action = $_POST['action'] ?? '';
if ($action === 'save') {
    if (empty($_POST['slug'])) $_POST['slug'] = Admin::slugify($_POST['title'] ?? 'servicio');
    if (!empty($_POST['highlights_raw'])) {
        $arr = preg_split('/\r?\n/', $_POST['highlights_raw']);
        $_POST['highlights'] = array_values(array_filter(array_map('trim', $arr)));
    }
    Admin::saveService($_POST);
    $flash = 'Guardado.';
}
if ($action === 'delete' && !empty($_POST['id'])) { Admin::deleteService((int) $_POST['id']); $flash = 'Eliminado.'; }

$items = Admin::allServices();
$editing = !empty($_GET['edit']) ? Admin::findService((int) $_GET['edit']) : null;
$editingHighlights = '';
if ($editing && !empty($editing->highlights)) {
    $arr = json_decode($editing->highlights, true);
    if (is_array($arr)) $editingHighlights = implode("\n", $arr);
}
?>

<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
                <a href="admin-services" class="btn btn-primary btn-sm"><i class="fas fa-plus me-2"></i>Nuevo servicio</a>
            </div>

            <?php if ($flash): ?><div class="alert alert-success py-2"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card shadow"><div class="card-body">
                        <h5 class="mb-3"><?= $editing ? 'Editar' : 'Nuevo' ?> servicio</h5>
                        <form method="POST">
                            <input type="hidden" name="action" value="save">
                            <input type="hidden" name="id" value="<?= $editing->id ?? '' ?>">

                            <div class="mb-2"><label class="form-label">Título *</label>
                                <input type="text" name="title" class="form-control" required value="<?= htmlspecialchars($editing->title ?? '') ?>"></div>
                            <div class="mb-2"><label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($editing->slug ?? '') ?>"></div>
                            <div class="mb-2"><label class="form-label">Descripción corta</label>
                                <textarea name="short_desc" rows="2" class="form-control"><?= htmlspecialchars($editing->short_desc ?? '') ?></textarea></div>
                            <div class="mb-2"><label class="form-label">Descripción larga</label>
                                <textarea name="long_desc" rows="3" class="form-control"><?= htmlspecialchars($editing->long_desc ?? '') ?></textarea></div>
                            <div class="mb-2"><label class="form-label">Puntos destacados (uno por línea)</label>
                                <textarea name="highlights_raw" rows="3" class="form-control"><?= htmlspecialchars($editingHighlights) ?></textarea></div>

                            <div class="row">
                                <div class="col-6 mb-2"><label class="form-label">Orden</label>
                                    <input type="number" name="sort_order" class="form-control" value="<?= (int) ($editing->sort_order ?? 0) ?>"></div>
                                <div class="col-6 mb-2"><label class="form-label">Estado</label>
                                    <select name="state" class="form-control"><option value="active" <?= ($editing->state ?? 'active') === 'active' ? 'selected' : '' ?>>Activo</option><option value="inactive" <?= ($editing->state ?? '') === 'inactive' ? 'selected' : '' ?>>Inactivo</option></select></div>
                            </div>

                            <button class="btn btn-primary mt-2"><i class="bx bx-save me-1"></i>Guardar</button>
                            <?php if ($editing): ?><a href="admin-services" class="btn btn-secondary mt-2">Cancelar</a><?php endif; ?>
                        </form>
                    </div></div>
                </div>

                <div class="col-lg-7">
                    <div class="table-responsive shadow p-3 bg-white rounded">
                        <table class="table table-sm align-middle">
                            <thead><tr><th>Título</th><th>Descripción</th><th>Estado</th><th></th></tr></thead>
                            <tbody>
                            <?php foreach ($items as $s): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($s->title) ?></strong><br><small class="text-muted"><?= htmlspecialchars($s->slug) ?></small></td>
                                    <td><small><?= htmlspecialchars($s->short_desc) ?></small></td>
                                    <td><span class="badge bg-<?= $s->state === 'active' ? 'success' : 'secondary' ?>"><?= $s->state ?></span></td>
                                    <td class="text-end">
                                        <a href="admin-services?edit=<?= (int) $s->id ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= (int) $s->id ?>">
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
