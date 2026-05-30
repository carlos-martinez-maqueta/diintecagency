<?php include 'partials/header.php';
require_once __DIR__ . '/class/Admin.php';

$flash = '';
$action = $_POST['action'] ?? '';
if ($action === 'save') {
    $img = Admin::uploadImage('image', 'trust');
    if ($img) $_POST['image'] = $img;
    Admin::saveTrust($_POST);
    $flash = 'Guardado.';
}
if ($action === 'delete' && !empty($_POST['id'])) {
    Admin::deleteTrust((int) $_POST['id']);
    $flash = 'Eliminado.';
}

$items = Admin::allTrust();
$editing = !empty($_GET['edit']) ? Admin::findTrust((int) $_GET['edit']) : null;
?>

<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Confían en nosotros</h1>
                <a href="admin-trust" class="btn btn-primary btn-sm"><i class="fas fa-plus me-2"></i>Nueva marca</a>
            </div>

            <?php if ($flash): ?><div class="alert alert-success py-2"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card shadow"><div class="card-body">
                        <h5 class="mb-3"><?= $editing ? 'Editar' : 'Nueva' ?> marca</h5>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="save">
                            <input type="hidden" name="id" value="<?= $editing->id ?? '' ?>">
                            <div class="mb-2"><label class="form-label">Nombre *</label>
                                <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($editing->name ?? '') ?>"></div>
                            <div class="mb-2"><label class="form-label">Logo</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <?php if (!empty($editing->image)): ?><small class="d-block mt-1"><img src="../<?= htmlspecialchars($editing->image) ?>" style="height:36px"></small><?php endif; ?>
                            </div>
                            <div class="mb-2"><label class="form-label">URL (opcional)</label>
                                <input type="text" name="url" class="form-control" value="<?= htmlspecialchars($editing->url ?? '') ?>"></div>
                            <div class="row">
                                <div class="col-6 mb-2"><label class="form-label">Orden</label>
                                    <input type="number" name="sort_order" class="form-control" value="<?= (int) ($editing->sort_order ?? 0) ?>"></div>
                                <div class="col-6 mb-2"><label class="form-label">Estado</label>
                                    <select name="state" class="form-control"><option value="active" <?= ($editing->state ?? 'active') === 'active' ? 'selected' : '' ?>>Activo</option><option value="inactive" <?= ($editing->state ?? '') === 'inactive' ? 'selected' : '' ?>>Inactivo</option></select></div>
                            </div>
                            <button class="btn btn-primary mt-2"><i class="bx bx-save me-1"></i>Guardar</button>
                            <?php if ($editing): ?><a href="admin-trust" class="btn btn-secondary mt-2">Cancelar</a><?php endif; ?>
                        </form>
                    </div></div>
                </div>

                <div class="col-lg-7">
                    <div class="table-responsive shadow p-3 bg-white rounded">
                        <table class="table table-sm align-middle">
                            <thead><tr><th>Logo</th><th>Nombre</th><th>URL</th><th>Estado</th><th></th></tr></thead>
                            <tbody>
                            <?php foreach ($items as $i): ?>
                                <tr>
                                    <td><?php if (!empty($i->image)): ?><img src="../<?= htmlspecialchars($i->image) ?>" style="height:36px"><?php endif; ?></td>
                                    <td><?= htmlspecialchars($i->name) ?></td>
                                    <td><small><?= htmlspecialchars($i->url ?? '') ?></small></td>
                                    <td><span class="badge bg-<?= $i->state === 'active' ? 'success' : 'secondary' ?>"><?= $i->state ?></span></td>
                                    <td class="text-end">
                                        <a href="admin-trust?edit=<?= (int) $i->id ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= (int) $i->id ?>">
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
