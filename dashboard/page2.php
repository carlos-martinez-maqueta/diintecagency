<!-- Header -->
<?php
include 'partials/header.php';
$page = Globales::getPageFetch();

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
        <form id="editPage" method="POST" enctype="multipart/form-data">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">P&aacute;gina</h1>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-warning">
                            <i class='bx bx-save me-1'></i>Editar
                        </button>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col-12">



                        <div class="accordion" id="accordionExample">
                            <!-- Item 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Principal
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner1 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen" name="imagen">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Informaci&oacute;n Importante
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="url_yt" id="url_yt" value="<?= $page->url_yt ?>">
                                                    <label for="floatingInput">Url Video Youtube</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="maps" id="maps" value="<?= $page->url_maps ?>">
                                                    <label for="floatingInput">Url Google Maps</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="correo" id="correo" value="<?= $page->correo ?>">
                                                    <label for="floatingInput">Direcci&oacute;n de Correo</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="wsp" id="wsp" value="<?= $page->wsp ?>">
                                                    <label for="floatingInput">Whatsapp</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Nosotros
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner2 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen2" name="imagen2">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage2" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Caracteristicas
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner3 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen3" name="imagen3">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage3" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Brochure
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <iframe src="../assets/docs/<?= $page->brochure ?>" width="100%" height="500px" style="border: none;"></iframe>
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">
                                                    <label for="formFile" class="form-label">Seleccionar Brochure (PDF)</label>
                                                    <input class="form-control" type="file" id="pdfFile" name="imagen3" accept="application/pdf">

                                                    <!-- Vista previa del PDF -->
                                                    <div class="mt-3 text-center">
                                                        <iframe id="pdfPreview" src="#" style="display: none; width: 100%; height: 300px; border: 1px solid #ccc;"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Mapa
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner4 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen4" name="imagen4">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage4" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item 7 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        Formulario
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner5 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen5" name="imagen5">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage5" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 8 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        Carrusel
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <img class="img-fluid" src="../images/<?= $page->banner6 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen6" name="imagen6">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage6" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 mt-3">
                                                <img class="img-fluid" src="../images/<?= $page->banner7 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen7" name="imagen7">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage7" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 mt-3">
                                                <img class="img-fluid" src="../images/<?= $page->banner8 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen8" name="imagen8">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage8" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 mt-3">
                                                <img class="img-fluid" src="../images/<?= $page->banner9 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen9" name="imagen9">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage9" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 my-3">
                                                <img class="img-fluid" src="../images/<?= $page->banner10 ?>" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center">
                                                <div class="card mt-2 p-3">

                                                    <label for="formFile" class="form-label">Seleccionar Banner</label>
                                                    <input class="form-control" type="file" id="imagen10" name="imagen10">

                                                    <!-- Vista previa de la imagen -->
                                                    <div class="mt-3 text-center">
                                                        <img id="previewImage10" src="#" alt="Vista previa" style="max-width: 100%; max-height: 300px; display: none; border: 1px solid #ccc; padding: 5px;" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Item 10 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading10">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        Textos
                                    </button>
                                </h2>
                                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text1" id="text1" value="<?= $page->text1 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text2" id="text2" value="<?= $page->text2 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text3" id="text3" value="<?= $page->text3 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text4" id="text4" value="<?= $page->text4 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text5" id="text5" value="<?= $page->text5 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text6" id="text6" value="<?= $page->text6 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text7" id="text7" value="<?= $page->text7 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text8" id="text8" value="<?= $page->text8 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text9" id="text9" value="<?= $page->text9 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text10" id="text10" value="<?= $page->text10 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text11" id="text11" value="<?= $page->text11 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text12" id="text12" value="<?= $page->text12 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text13" id="text13" value="<?= $page->text13 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text14" id="text14" value="<?= $page->text14 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text15" id="text15" value="<?= $page->text15 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text16" id="text16" value="<?= $page->text16 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text17" id="text17" value="<?= $page->text17 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text18" id="text18" value="<?= $page->text18 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text19" id="text19" value="<?= $page->text19 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text20" id="text20" value="<?= $page->text20 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text21" id="text21" value="<?= $page->text21 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text22" id="text22" value="<?= $page->text22 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text23" id="text23" value="<?= $page->text23 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text24" id="text24" value="<?= $page->text24 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text25" id="text25" value="<?= $page->text25 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text26" id="text26" value="<?= $page->text26 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text27" id="text27" value="<?= $page->text27 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text28" id="text28" value="<?= $page->text28 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text29" id="text29" value="<?= $page->text29 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text30" id="text30" value="<?= $page->text30 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text31" id="text31" value="<?= $page->text31 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text32" id="text32" value="<?= $page->text32 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text33" id="text33" value="<?= $page->text33 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text34" id="text34" value="<?= $page->text34 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text35" id="text35" value="<?= $page->text35 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text36" id="text36" value="<?= $page->text36 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text37" id="text37" value="<?= $page->text37 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text38" id="text38" value="<?= $page->text38 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text39" id="text39" value="<?= $page->text39 ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="text40" id="text40" value="<?= $page->text40 ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>










                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </form>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include 'partials/footer.php' ?>
    <!-- End of Footer -->
    <script src="js/global/edit-page.js"></script>
    <script>
        document.getElementById('imagen').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen2').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage2');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen3').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage3');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('pdfFile').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file && file.type === 'application/pdf') {
                var fileURL = URL.createObjectURL(file);
                var preview = document.getElementById('pdfPreview');
                preview.src = fileURL;
                preview.style.display = 'block';
            } else {
                alert("Por favor selecciona un archivo PDF.");
                document.getElementById('pdfPreview').style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen4').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage4');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen5').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage5');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen6').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage6');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen7').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage7');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen8').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage8');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen9').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage9');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
    <script>
        document.getElementById('imagen10').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImage10');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>