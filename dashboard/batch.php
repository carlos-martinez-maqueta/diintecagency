<!-- Header -->
<?php include 'partials/header.php' ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include 'partials/sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php include 'partials/topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-11">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lotes</h1>
                    </div>
                </div>
            </div>



            <!-- Content Row -->
            <div class="row justify-content-center">
                <div class="col-11 d-flex justify-content-around mb-3">
                    <div class="form-check form-check-inline align-items-center d-flex">
                        <input type="checkbox" class="form-check-input checkbox1" value="disponible" id="chk-disponible" checked>
                        <label class="form-check-label" for="chk-disponible">Disponible</label>
                    </div>
                    <div class="form-check form-check-inline align-items-center d-flex">
                        <input type="checkbox" class="form-check-input checkbox2" value="vendido" id="chk-vendido" checked>
                        <label class="form-check-label" for="chk-vendido">Vendido</label>
                    </div>
                    <div class="form-check form-check-inline align-items-center d-flex">
                        <input type="checkbox" class="form-check-input checkbox3" value="plazaIndustriale" id="chk-plazaIndustriale" checked>
                        <label class="form-check-label" for="chk-plazaIndustriale">Plaza Industriale</label>
                    </div>
                    <div class="form-check form-check-inline align-items-center d-flex">
                        <input type="checkbox" class="form-check-input checkbox4" value="areasVerdes" id="chk-areasVerdes" checked>
                        <label class="form-check-label" for="chk-areasVerdes">Áreas Verdes</label>
                    </div>
                </div>

                <div class="col-11">
                    <div class="table-responsive table-light shadow small-table p-3">
                        <table class="table p-lg-4" id="table-lotes">
                            <!-- Van haber las opciones : VER ECUACION, VER VOUCHER DE COMPRA, CAMBIO DE ESTADO A APROBADO O RECHAZADO -->
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">ID</th>
                                    <th class="text-center" scope="col">Nombre</th>
                                    <th class="text-center" scope="col">ESTADO</th>
                                    <th class="text-center" scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include 'partials/footer.php' ?>
    <!-- End of Footer -->

    <script src="js/global/get-lotes.js"></script>