<?php $current = basename($_SERVER['PHP_SELF'], '.php'); ?>
<ul class="navbar-nav bg-gradient-diintec sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="p-4">
            <img src="../assets/img/logo.svg" class="img-fluid" alt="">
        </div>
    </a>

    <div class="sidebar-heading">Panel</div>
    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= $current === 'index' ? 'active' : '' ?>">
        <a class="nav-link" href="index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <div class="sidebar-heading">Contenido del sitio</div>

    <li class="nav-item <?= $current === 'admin-projects' ? 'active' : '' ?>">
        <a class="nav-link" href="admin-projects">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Proyectos</span></a>
    </li>
    <li class="nav-item <?= $current === 'admin-clients' ? 'active' : '' ?>">
        <a class="nav-link" href="admin-clients">
            <i class="fas fa-fw fa-users"></i>
            <span>Nuestros Clientes</span></a>
    </li>
    <li class="nav-item <?= $current === 'admin-trust' ? 'active' : '' ?>">
        <a class="nav-link" href="admin-trust">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Confían en nosotros</span></a>
    </li>
    <li class="nav-item <?= $current === 'admin-locations' ? 'active' : '' ?>">
        <a class="nav-link" href="admin-locations">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Mapa / Ubicaciones</span></a>
    </li>
    <li class="nav-item <?= $current === 'admin-services' ? 'active' : '' ?>">
        <a class="nav-link" href="admin-services">
            <i class="fas fa-fw fa-cube"></i>
            <span>Servicios</span></a>
    </li>

    <div class="sidebar-heading">Publicaciones</div>

    <li class="nav-item <?= in_array($current, ['blog', 'add-blog', 'edit-blog']) ? 'active' : '' ?>">
        <a class="nav-link" href="blog">
            <i class="fas fa-fw fa-rss"></i>
            <span>Blog</span></a>
    </li>

</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">