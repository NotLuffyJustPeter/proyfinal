<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acerca de</title>
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/testimonios.css">
    <link rel="stylesheet" href="css/acercade.css">
    <link rel="icon" sizes="180x180" href="imagenes/logoic.ico">
    <style>
      @font-face {
          font-family: 'Cormorant_Infant';
          src: url('/fonts/Cormorant_Infant/CormorantInfant-Light.ttf') format('truetype');
      }
      *{
        font-family: 'Cormorant_Infant';
      }
    </style>
</head>
<body>
<?php include("header.php") ?> 
<div class="acerca-container">
        <div class="acerca-card">
            <i class="fa-solid fa-binoculars"></i>
            <h2>Mision</h2>
            <p>Nuestra misión es ofrecer a nuestros clientes una experiencia de compra excepcional, brindando moda de alta calidad y tendencias actualizadas, junto con un servicio personalizado que refleje nuestra pasión por la moda y el estilo único de cada individuo.</p>
        </div>
        <div class="acerca-card">
            <i class="fa-solid fa-crosshairs"></i>
            <h2>Vision</h2>
            <p>Nos esforzamos por convertirnos en la tienda de referencia para quienes buscan no solo ropa de moda, sino una experiencia de compra que celebre la diversidad, fomente la autoexpresión y promueva la sostenibilidad en la industria de la moda, manteniendo siempre nuestra excelencia en calidad y servicio.</p>
        </div>
        <div class="acerca-card">
            <i class="fa-solid fa-bullseye"></i>
            <h2>Objetivo</h2>
            <p>Objetivo: En los próximos dos años, nuestro objetivo es aumentar en un 30% nuestra base de clientes recurrentes, al tiempo que ampliamos nuestra línea de ropa sostenible en un 40%, ofreciendo así opciones que reflejen nuestro compromiso con la moda responsable y la elección consciente.</p>
        </div>
    </div>

<section class="container">
      <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
          <div class="slide swiper-slide">
            <img src="imagenes/omar.jpg" alt="" class="image" />
            <p class="fs-4">
             Me Gustan la programacion
            </p>
            <div class="details">
              <span class="name">Omar Reyes Ramirez</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="imagenes/Alan.jpg" alt="" class="image" />
            <p class="fs-4">
              Estoy orgulloso de trabajar en InovaTech, por que es una empresa mexicana que va a la vanguardia y que esta en constante evolucion para competir a nivel global.
            </p>
            <div class="details">
              <span class="name">Alan Kaled Guerrero Ortiz</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="imagenes/pedro.jpg" alt="" class="image" />
            <p class="fs-4">
              He tenido la oportunidad de comprtir son gente de InovaTech de todo el mundo y he senstido la misma empatia, carisma y actitud de servicios a los demas. Eso es lo que te hace amar a InovaTech su calidez humana.
            </p>


            <div class="details">
              <span class="name">Pedro Roman Garcia Delgado</span>
              <span class="job">Web Developer</span>
            </div>
          </div>

          <div class="slide swiper-slide">
            <img src="imagenes/aaron.jpg" alt="" class="image" />
            <p class="fs-4">
              He tenido la oportunidad de comprtir son gente de InovaTech de todo el mundo y he senstido la misma empatia, carisma y actitud de servicios a los demas. Eso es lo que te hace amar a InovaTech su calidez humana.
            </p>


            <div class="details">
              <span class="name">Luis Aaron Lopez Ramirez</span>
              <span class="job">Web Developer</span>
            </div>
          </div>


          <div class="slide swiper-slide">
            <img src="imagenes/isidro.jpg" alt="" class="image" />
            <p class="fs-4">
              He tenido la oportunidad de comprtir son gente de InovaTech de todo el mundo y he senstido la misma empatia, carisma y actitud de servicios a los demas. Eso es lo que te hace amar a InovaTech su calidez humana.
            </p>


            <div class="details">
              <span class="name">Isidro Hernandez Guel</span>
              <span class="job">Web Developer</span>
            </div>
          </div>



          <div class="slide swiper-slide">
            <img src="imagenes/xitlali.jpg" alt="" class="image" />
            <p class="fs-4">
              He tenido la oportunidad de comprtir son gente de InovaTech de todo el mundo y he senstido la misma empatia, carisma y actitud de servicios a los demas. Eso es lo que te hace amar a InovaTech su calidez humana.
            </p>


            <div class="details">
              <span class="name">Xitlali Sarahi Reyes Reyes</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/testimonio.js"></script>
    <?php include("footer.php") ?>
</body>
</html>