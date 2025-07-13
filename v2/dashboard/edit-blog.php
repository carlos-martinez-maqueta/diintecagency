<!-- Header -->
<?php 
include 'partials/header.php';
$labelAll = Globales::getLabelAll();
$blog_id = $_GET['id'];
$blogObj = Globales::getBlogId($blog_id);
$selectedLabels = Globales::getBlogLabels($blog_id); // Devuelve array de label_id
?>

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include 'partials/sidebar.php' ?>
    <div id="content">
        <?php include 'partials/topbar.php' ?>

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Blog</h1>
                <a href="blog" class="btn btn-primary btn-sm d-flex align-items-center">
                    <i class="fas fa-undo me-2"></i> Return
                </a>
            </div>

            <div class="row">
                <div class="col-12">
                    <form id="editBlog" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="labels_seleccionadas" id="labelsSeleccionadas">
                        <input type="hidden" name="blog_id" value="<?= $blog_id ?>">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($blogObj->title) ?>" placeholder="Título del blog">
                            <label for="title">Title</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" placeholder="Descripción"><?= htmlspecialchars($blogObj->description) ?></textarea>
                            <label for="description">Description</label>
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
                            <?php if (!empty($blogObj->banner)): ?>
                                <div class="mt-2">
                                    <img src="img/blog/<?= $blogObj->banner ?>" alt="Banner actual" class="img-thumbnail" width="200">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <textarea id="summernote" name="summernote"><?= htmlspecialchars($blogObj->summer) ?></textarea>
                        </div>

                        <label for="labelContainer" class="form-label mb-2 fw-bold">Select Tags</label>
                        <div id="labelContainer" class="d-flex flex-wrap gap-2 mb-3">
                            <?php foreach ($labelAll as $label): 
                                $isSelected = in_array($label->id, $selectedLabels);
                            ?>
                                <div
                                    class="label-tag border px-3 py-1 rounded-pill <?= $isSelected ? 'selected text-white bg-primary' : 'text-muted' ?>"
                                    data-id="<?= $label->id ?>"
                                    style="cursor: pointer; border-color: #ccc;">
                                    <?= htmlspecialchars($label->name) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="url" name="url" value="<?= htmlspecialchars($blogObj->friendly_url) ?>" placeholder="URL amigable">
                            <label for="url">Url Amigable</label>
                        </div>

                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><i class='bx bx-save me-1'></i>Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <?php include 'partials/footer.php' ?>
  <script src="js/global/edit-blog.js"></script>

    <!-- Inicializa Summernote -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Escribe tu contenido aquí...',
                tabsize: 2,
                height: 300
            });

            // Rellenar input oculto con etiquetas seleccionadas al cargar
            const etiquetasIniciales = [];
            document.querySelectorAll('.label-tag.selected').forEach(tag => {
                etiquetasIniciales.push(tag.getAttribute('data-id'));
            });
            document.getElementById('labelsSeleccionadas').value = etiquetasIniciales.join(',');
        });
    </script>

    <!-- Manejo de etiquetas -->
    <script>
        const labelContainer = document.getElementById('labelContainer');
        const inputHidden = document.getElementById('labelsSeleccionadas');
        let etiquetasSeleccionadas = document.getElementById('labelsSeleccionadas').value.split(',');

        labelContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('label-tag')) {
                const tag = e.target;
                const id = tag.getAttribute('data-id');

                tag.classList.toggle('selected');
                tag.classList.toggle('text-white');
                tag.classList.toggle('bg-primary');
                tag.classList.toggle('text-muted');

                if (tag.classList.contains('selected')) {
                    etiquetasSeleccionadas.push(id);
                } else {
                    etiquetasSeleccionadas = etiquetasSeleccionadas.filter(item => item !== id);
                }

                inputHidden.value = etiquetasSeleccionadas.join(',');
            }
        });
    </script>
</div>
