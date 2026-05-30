<?php include 'partials/header.php';
require_once __DIR__ . '/class/Admin.php';

$nProjects = count(Admin::allProjects());
$nClients = count(Admin::allClients());
$nTrust = count(Admin::allTrust());
$nLocations = count(Admin::allLocations());
$nServices = count(Admin::allServices());
$nBlog = (int) $conn->query("SELECT COUNT(*) FROM tbl_blog")->fetchColumn();
?>

<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="../" class="btn btn-outline-primary btn-sm"><i class="fas fa-external-link-alt me-2"></i>Ver sitio</a>
            </div>

            <div class="row">
                <?php
                $cards = [
                    ['Proyectos', $nProjects, 'briefcase', 'primary', 'admin-projects'],
                    ['Clientes', $nClients, 'users', 'success', 'admin-clients'],
                    ['Confían en nosotros', $nTrust, 'handshake', 'info', 'admin-trust'],
                    ['Ubicaciones', $nLocations, 'map-marker-alt', 'warning', 'admin-locations'],
                    ['Servicios', $nServices, 'cube', 'danger', 'admin-services'],
                    ['Publicaciones', $nBlog, 'rss', 'secondary', 'blog'],
                ];
                foreach ($cards as $c): ?>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="<?= $c[4] ?>" class="card border-left-<?= $c[3] ?> shadow h-100 py-2 text-decoration-none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-<?= $c[3] ?> text-uppercase mb-1"><?= $c[0] ?></div>
                                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?= $c[1] ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-<?= $c[2] ?> fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Accesos rápidos</h6></div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="admin-projects" class="btn btn-primary btn-sm"><i class="fas fa-plus me-1"></i>Agregar proyecto</a>
                        <a href="admin-clients" class="btn btn-success btn-sm"><i class="fas fa-plus me-1"></i>Agregar cliente</a>
                        <a href="admin-trust" class="btn btn-info btn-sm text-white"><i class="fas fa-plus me-1"></i>Agregar marca</a>
                        <a href="admin-locations" class="btn btn-warning btn-sm"><i class="fas fa-plus me-1"></i>Nueva ubicación</a>
                        <a href="add-blog" class="btn btn-secondary btn-sm"><i class="fas fa-plus me-1"></i>Nuevo post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php' ?>
