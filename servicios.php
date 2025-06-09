<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicios de Diseño Web, Desarrollo y Seo en Lima, Perú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/formula-condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <style type="text/css">
    .services_home{
      background-color: #c0cac9;
    }
    .services_home .content_txt h2{
    font-family: 'Formula Condensed', sans-serif;
    font-size: 150px;
    font-weight: 700;
    line-height: 1.3;
    letter-spacing: 2;
    }
    .section_services .img_servicio img{
      border-radius: 8px;
    }
    .section_services .descrip_servicio{
      height: 100%;
      display: flex;
      align-items: center;
     
    }
    .section_services .descrip_servicio h2{
      font-family: 'Formula Condensed', sans-serif;
      text-transform: uppercase;
      font-size: 54px;
      letter-spacing: normal;
      color: #001514;
      font-weight: 700;
    }
    .section_services .descrip_servicio p{
      font-family: 'Formula Condensed', sans-serif;
      font-size: 20px;
      line-height: 1.5;
      color: #001514cc;
      font-weight: 400;
      font-style: normal;
    }
    .section_services .descrip_servicio ul{
      padding: 30px 0px 0px 0px;
      list-style: none;
    }
    .section_services .descrip_servicio ul li{
      font-family: 'Formula Condensed', sans-serif;
      font-size: 1.5em;
      letter-spacing: 0.05em;
      padding: 10px 0px;
      border-bottom: 1px solid #000000;
      text-transform: uppercase;
      font-weight: 600;
    }
    .section_services .descrip_servicio ul li:first-child {
      border-top: 1px solid #000000;
    }
    #title_servicios{
      overflow: hidden;
      white-space: nowrap;
      border-right: 0px solid transparent; /* Cambia el color transparente */
      animation: titles 2.5s steps(80, end);
    }
    @keyframes titles {
      from { width: 0; }
      to { width: 100%; }
    }    
  </style>    
    <link rel="stylesheet" type="text/css" href="assets/css/media.css">
  </head>

  <body>
    <?php include 'app/componentes/header.php' ?>

    <main>
      <section class="section_banner_home services_home">
        <div class="div_banner_txt">
          <div class="titulo_txt">
            <div class="content_txt text-center">
              <h2 id="title_servicios">DESTACA EN EL <br> MUNDO DIGITAL </h2>             
            </div>
          </div>
        </div>
      </section>      
      <section class="section_services"  style="margin-top: 200px;">
        <div class="container">
          <div class="row px-lg-5 mb-lg-0 mb-5">
            <div class="col-lg-6 text-center">
              <div class="img_servicio"><img src="assets/img/servicio-desarrollo-tienda-virtual.png" class="img-fluid"></div>
            </div>
            <div class="col-lg-6">
              <div class="descrip_servicio">
                <div>
                  <h2>Desarrollo de Tiendas Virtuales</h2>
                  <p>Ofrecemos soluciones completas para el desarrollo de tiendas virtuales que destacan por su funcionalidad y estética. Nuestros servicios incluyen:</p>
                  <ul>
                    <li>Creación de tiendas virtuales personalizadas</li>
                    <li>Integración de sistemas de pago seguros</li>
                    <li>Optimización para dispositivos móviles</li>
                    <li>Gestión de inventario y pedidos</li>
                    <li>Implementación de funcionalidades de comercio electrónico avanzadas</li>
                  </ul>  
                  <div>
                    <!-- <a href="servicios/desarrollo-web-tienda-virtual" style="text-decoration: none;">Conocer Más</a> -->
                  </div>                                 
                </div>
              </div>
            </div>
          </div>
          <div class="row px-lg-5 mb-lg-0 mb-5">
            <div class="col-lg-6">
              <div class="descrip_servicio">
                <div>
                  <h2>Desarrollo de Catálogo Virtual</h2>
                  <p>Ofrecemos servicios de desarrollo y producción de contenido audiovisual original para crear catálogos virtuales impactantes que transmitan eficazmente el mensaje de nuestros clientes. Nuestros servicios incluyen:</p>
                  <ul>
                    <li>Creación de catálogos virtuales personalizados</li>
                    <li>Integración de elementos interactivos</li>
                    <li>Optimización para diversas plataformas</li>
                  </ul>   
                  <div>
                    <!-- <a href="servicios/desarrollo-web-catalogo-virtual" style="text-decoration: none;">Conocer Más</a> -->
                  </div>                                
                </div>
              </div>
            </div>
            <div class="col-lg-6 text-center">
              <div class="img_servicio"><img src="assets/img/ser.jpg" class="img-fluid"></div>
            </div>            
          </div>
          <div class="row px-lg-5 mb-lg-0 mb-5" id="seo">
            <div class="col-lg-6 text-center">
              <div class="img_servicio"><img src="assets/img/seo-y-posicionamiento-diintec.png" class="img-fluid"></div>
            </div>
            <div class="col-lg-6">
              <div class="descrip_servicio">
                <div>
                  <h2>SEO y Posicionamiento Web</h2>
                  <p>Mejoramos la visibilidad de tu sitio en los motores de búsqueda mediante estrategias personalizadas de SEO (Optimización de Motores de Búsqueda) y técnicas avanzadas de optimización web. Nuestro enfoque integral incluye:</p>
                  <ul>
                    <li>Aumentar tráfico orgánico </li>
                    <li>Análisis de empresa</li>
                    <li>Optimización técnica del sitio web</li>
                    <li>Creación de contenido optimizado</li>
                    <li>Estrategias de construcción de enlaces</li>
                  </ul>      
                  <div>
                    <!-- <a href="servicios/servicio-seo-y-posicionamiento-web" style="text-decoration: none;">Conocer Más</a> -->
                  </div>           
                </div>
              </div>
            </div>
          </div>                  
        </div>
      </section>
    </main>
    
    <?php 
      include 'app/componentes/form.php';
      include 'app/componentes/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="assets/js/fullscreen.js"></script>

    <script  src="assets/js/parrallax.js"></script>
  </body>
</html>