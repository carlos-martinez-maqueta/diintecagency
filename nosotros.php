<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://fonts.cdnfonts.com/css/formula-condensed" rel="stylesheet">
                
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/media.css">
  </head>
  <style type="text/css">
    .section_nosotros .title_nosotros{
      font-family: 'Formula Condensed', sans-serif;
      text-transform: uppercase;
      color: #001514;
          font-weight: 700;
      line-height: 0.88;
      font-size: 60px;
    }
    .col_team .d_flex_info_ns{
      display: flex;
      justify-content: space-between;
      padding: 14px 6px;
    }
    .col_team .d_flex_info_ns .datos_info p{
      margin: 0px;
      font-family: 'Formula Condensed', sans-serif;
      font-size: 1.5em;
      font-weight: 700;
      color: #182b2a;
    }
    .col_team .d_flex_info_ns .datos_info span{
      font-family: 'Formula Condensed', sans-serif;
      font-size: 1em;
      font-weight: 600;
      color: #00151454;
      letter-spacing: 0.025em;
      letter-spacing: 0.025em;
    }
    .card_user{
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);

            position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      opacity: 0;
      border-radius: 10px;
    }
    .col_team .opaci_img img{
      border-radius: 10px;
    }
    .col_team .overflow_cuadro{
      overflow: hidden;
      border-radius: 10px;
      height: 400px;
    }
    .card_user{
      text-align: center;
    }
    .col_team:hover .card_user{
      opacity: 1;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding: 40px;
      
      transition: var(--animation-primary);

    }
    .col_team:hover .opaci_img{
      filter: grayscale(0) blur(0px);
      opacity: 1;
      transform: scale(1.09) rotate(0.001deg);
      transition: 0.4s ease;
    }
    .card_user span{
      font-size: 40px;
      font-weight: 700;
      font-family: 'Formula Condensed', sans-serif;
      color: #ffffff;
      line-height: 0.9;
      letter-spacing: normal;
    }
  </style>
  <body>
    <?php include 'app/componentes/header.php' ?>

    <main>
      <section class="section_nosotros" style="margin-top: 200px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 px-5">
              <h2 class="title_nosotros">THE SQUAD</h2>
            </div>
          </div>
          <div class="row justify-content-md-center py-5 px-5">
            <div class="col-lg-3">
              <div class="col_team">
                <div class="position-relative overflow_cuadro">
                  <div class="opaci_img">
                    <img src="assets/img/asdw.jpg" class="img-fluid">
                  </div>
                  <div class="card_user">
                    <span>'ENJOY THE PROCESS'</span>
                  </div>
                </div>

                <div class="d_flex_info_ns">
                  <div class="datos_info">
                    <p>CARLOS MARTINEZ</p>
                    <span>OWNER</span>
                  </div>
                  <div class="redes_info">
                    <a href=""><img src="assets/img/insta_black.svg"></a>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3">
              <div class="col_team">
                <div class="position-relative overflow_cuadro">
                  <div class="opaci_img">
                    <img src="assets/img/asdw.jpg" class="img-fluid">
                  </div>
                  <div class="card_user">
                    <span>'SUCCESS IS NOT GIVEN, IT IS EARNED'</span>
                  </div>
                </div>

                <div class="d_flex_info_ns">
                  <div class="datos_info">
                    <p>CARLOS MARTINEZ</p>
                    <span>OWNER</span>
                  </div>
                  <div class="redes_info">
                    <a href=""><img src="assets/img/insta_black.svg"></a>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-lg-3">
              <div class="col_team">
                <div class="position-relative overflow_cuadro">
                  <div class="opaci_img">
                    <img src="assets/img/asdw.jpg" class="img-fluid">
                  </div>
                  <div class="card_user">
                    <span>'ENJOY THE PROCESS'</span>
                  </div>
                </div>

                <div class="d_flex_info_ns">
                  <div class="datos_info">
                    <p>CARLOS MARTINEZ</p>
                    <span>OWNER</span>
                  </div>
                  <div class="redes_info">
                    <a href=""><img src="assets/img/insta_black.svg"></a>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-lg-3">
              <div class="col_team">
                <div class="position-relative overflow_cuadro">
                  <div class="opaci_img">
                    <img src="assets/img/asdw.jpg" class="img-fluid">
                  </div>
                  <div class="card_user">
                    <span>'SUCCESS IS NOT GIVEN, IT IS EARNED'</span>
                  </div>
                </div>

                <div class="d_flex_info_ns">
                  <div class="datos_info">
                    <p>CARLOS MARTINEZ</p>
                    <span>OWNER</span>
                  </div>
                  <div class="redes_info">
                    <a href=""><img src="assets/img/insta_black.svg"></a>
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