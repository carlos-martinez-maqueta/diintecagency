<!-- Header -->
<?php include 'partials/header.php';
$labelAll = Globales::getLabelAll();
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
        <div class="container">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add Blog</h1>
                <a href="blog" class="btn btn-primary btn-sm d-flex align-items-center">
                    <i class="fas fa-undo me-2"></i> Return
                </a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-12">
                    <form id="addBlog" method="POST" enctype="multipart/form-data">
                        <!-- Input oculto para enviar las etiquetas seleccionadas -->
                        <input type="hidden" name="labels_seleccionadas" id="labelsSeleccionadas">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="name@example.com">
                            <label for="floatingInput">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <textarea id="summernote" name="summernote"></textarea>
                        </div>
                        <!-- Label de sección -->
                        <label for="labelContainer" class="form-label mb-2 fw-bold">Select Tags</label>

                        <!-- Contenedor de etiquetas -->
                        <div id="labelContainer" class="d-flex flex-wrap gap-2 mb-3">
                            <?php foreach ($labelAll as $label): ?>
                                <div
                                    class="label-tag border px-3 py-1 rounded-pill text-muted"
                                    data-id="<?= $label->id ?>"
                                    style="cursor: pointer; border-color: #ccc;">
                                    <?= htmlspecialchars($label->name) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="url" name="url" placeholder="name@example.com">
                            <label for="floatingInput">Url Amigable</label>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class='bx bx-save me-1'></i>Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include 'partials/footer.php' ?>
    <script src="js/global/add-blog.js"></script>
    <!-- End of Footer -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Escribe tu contenido aquí...',
                tabsize: 2,
                height: 300
            });
        });
    </script>
    <script>
        const labelContainer = document.getElementById('labelContainer');
        const inputHidden = document.getElementById('labelsSeleccionadas');
        let etiquetasSeleccionadas = [];

        labelContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('label-tag')) {
                const tag = e.target;
                const id = tag.getAttribute('data-id');

                tag.classList.toggle('selected');

                if (tag.classList.contains('selected')) {
                    etiquetasSeleccionadas.push(id);
                } else {
                    etiquetasSeleccionadas = etiquetasSeleccionadas.filter(item => item !== id);
                }

                inputHidden.value = etiquetasSeleccionadas.join(',');
            }
        });
    </script>