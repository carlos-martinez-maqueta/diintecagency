<!-- Header -->
<?php include 'partials/header.php';
?>

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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Blog List</h1>
                <div class="d-flex gap-3">
                    <!-- Botón para agregar blog -->
                    <a href="add-blog" class="btn btn-primary btn-sm d-flex align-items-center">
                        <i class="fas fa-plus me-2"></i> Add Blog
                    </a>

                    <!-- Botón para administrar etiquetas -->
                    <!-- <a href="#" class="btn btn-info btn-sm  d-flex align-items-center text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-tags me-2"></i> Labels
                    </a> -->
                </div>

            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="table-responsive table-light shadow small-table p-3">
                        <table class="table p-lg-4" id="table-blog">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">ID</th>
                                    <th class="text-center" scope="col">Title</th>
                                    <th class="text-center" scope="col">Description</th>
                                    <th class="text-center" scope="col">Date Create</th>
                                    <th class="text-center" scope="col">State</th>
                                    <th class="text-center" scope="col">Actions</th>
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

    <!-- Modal Agregar Blog -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form id="addTravel" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class='bx bx-save me-1'></i>Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'partials/footer.php' ?>
    <!-- End of Footer -->

    <script src="js/global/get-blog.js"></script>