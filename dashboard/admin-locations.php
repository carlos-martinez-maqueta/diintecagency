<?php include 'partials/header.php';
require_once __DIR__ . '/class/Admin.php';

$flash = '';
$action = $_POST['action'] ?? '';
if ($action === 'save') { Admin::saveLocation($_POST); $flash = 'Ubicación guardada.'; }
if ($action === 'delete' && !empty($_POST['id'])) { Admin::deleteLocation((int) $_POST['id']); $flash = 'Eliminada.'; }

$items = Admin::allLocations();
$editing = !empty($_GET['edit']) ? Admin::findLocation((int) $_GET['edit']) : null;
?>

<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Mapa · Ubicaciones</h1>
                <a href="admin-locations" class="btn btn-primary btn-sm"><i class="fas fa-plus me-2"></i>Nueva ubicación</a>
            </div>

            <?php if ($flash): ?><div class="alert alert-success py-2"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card shadow"><div class="card-body">
                        <h5 class="mb-3"><?= $editing ? 'Editar' : 'Nueva' ?> ubicación</h5>
                        <form method="POST">
                            <input type="hidden" name="action" value="save">
                            <input type="hidden" name="id" value="<?= $editing->id ?? '' ?>">

                            <div class="mb-2"><label class="form-label">Ciudad *</label>
                                <input type="text" name="city" class="form-control" required value="<?= htmlspecialchars($editing->city ?? '') ?>"></div>

                            <div class="mb-2"><label class="form-label">Región</label>
                                <input type="text" name="region" class="form-control" value="<?= htmlspecialchars($editing->region ?? '') ?>"></div>

                            <div class="mb-2"><label class="form-label">Título visible (ej: "Proyecto X")</label>
                                <input type="text" name="label" class="form-control" value="<?= htmlspecialchars($editing->label ?? '') ?>"></div>

                            <div class="mb-2"><label class="form-label">Descripción del proyecto</label>
                                <textarea name="description" rows="3" class="form-control"><?= htmlspecialchars($editing->description ?? '') ?></textarea></div>

                            <div class="row">
                                <div class="col-6 mb-2"><label class="form-label">Longitud (lng)</label>
                                    <input type="number" step="0.000001" name="lng" class="form-control" required value="<?= htmlspecialchars($editing->lng ?? '') ?>"></div>
                                <div class="col-6 mb-2"><label class="form-label">Latitud (lat)</label>
                                    <input type="number" step="0.000001" name="lat" class="form-control" required value="<?= htmlspecialchars($editing->lat ?? '') ?>"></div>
                            </div>
                            <small class="text-muted d-block mb-2">Tip: para Lima usa lng <code>-77.0428</code>, lat <code>-12.0464</code>. Búscalo en Google Maps → click derecho.</small>

                            <div class="row">
                                <div class="col-4 mb-2"><label class="form-label">N° proyectos</label>
                                    <input type="number" name="projects_count" class="form-control" value="<?= (int) ($editing->projects_count ?? 0) ?>"></div>
                                <div class="col-4 mb-2"><label class="form-label">Orden</label>
                                    <input type="number" name="sort_order" class="form-control" value="<?= (int) ($editing->sort_order ?? 0) ?>"></div>
                                <div class="col-4 mb-2"><label class="form-label">Estado</label>
                                    <select name="state" class="form-control"><option value="active" <?= ($editing->state ?? 'active') === 'active' ? 'selected' : '' ?>>Activo</option><option value="inactive" <?= ($editing->state ?? '') === 'inactive' ? 'selected' : '' ?>>Inactivo</option></select></div>
                            </div>

                            <button class="btn btn-primary mt-2"><i class="bx bx-save me-1"></i>Guardar</button>
                            <?php if ($editing): ?><a href="admin-locations" class="btn btn-secondary mt-2">Cancelar</a><?php endif; ?>
                        </form>
                    </div></div>
                </div>

                <div class="col-lg-7">
                    <div class="table-responsive shadow p-3 bg-white rounded">
                        <table class="table table-sm align-middle">
                            <thead><tr><th>Ciudad</th><th>Proyecto</th><th>Coord</th><th>#</th><th>Estado</th><th></th></tr></thead>
                            <tbody>
                            <?php foreach ($items as $i): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($i->city) ?></strong><br><small class="text-muted"><?= htmlspecialchars($i->region ?? '') ?></small></td>
                                    <td><small><?= htmlspecialchars($i->label) ?></small></td>
                                    <td><small><?= number_format((float) $i->lng, 3) ?>, <?= number_format((float) $i->lat, 3) ?></small></td>
                                    <td><?= (int) $i->projects_count ?></td>
                                    <td><span class="badge bg-<?= $i->state === 'active' ? 'success' : 'secondary' ?>"><?= $i->state ?></span></td>
                                    <td class="text-end">
                                        <a href="admin-locations?edit=<?= (int) $i->id ?>" class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></a>
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
