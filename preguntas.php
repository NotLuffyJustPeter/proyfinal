<?php
    include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @font-face {
        font-family: 'Cormorant_Infant';
        src: url('/fonts/Cormorant_Infant/CormorantInfant-Light.ttf') format('truetype');
    }
    body {
        font-family: 'Cormorant_Infant', sans-serif;
        font-size:18px;
        /* display:flex;
        flex-direction:column; */
        /* display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap:0px; */
    }
    .preguntas{
        margin-left: 50px;
    }
  </style>
</head>
<body style="margin-top: 100px;">
<h1 style="text-align:center;">P r e g u n t a s&nbsp&nbsp   f r e c u e n t e s</h1>
<br>
    <div class="preguntas">
    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample1" aria-controls="collapseWidthExample1">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Cuáles son las opciones de pago disponibles?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample1">
        <div class="card card-body" style="width: 1000px; border:none;">
        Aceptamos pagos con tarjeta de crédito, débito y PayPal.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample2" aria-controls="collapseWidthExample2">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Cuánto tiempo tarda en llegar mi pedido?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample2">
        <div class="card card-body" style="width: 800px; border:none;">
        Los tiempos de envío varían según la ubicación. Por lo general, toma entre 3 y 7 días laborables
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample3" aria-controls="collapseWidthExample3">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Puedo devolver un artículo si no me queda bien?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample3">
        <div class="card card-body" style="width: 800px; border:none;">
        Sí, aceptamos devoluciones dentro de los 30 días posteriores a la compra. Consulta nuestra política de devoluciones para más detalles.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample4" aria-controls="collapseWidthExample4">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Cuánto tiempo tarda en llegar mi pedido?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample4">
        <div class="card card-body" style="width: 800px; border:none;">
        El tiempo de entrega puede variar según tu ubicación y la disponibilidad de los productos. Normalmente, los pedidos se envían dentro de las 48 horas posteriores a la compra. Una vez enviado, el tiempo de entrega estimado es de X a Y días laborables.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample5" aria-controls="collapseWidthExample5">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Ofrecen envíos internacionales?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample5">
        <div class="card card-body" style="width: 800px; border:none;">
        Sí, enviamos a varios países. Los costos de envío y tiempos pueden variar.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample6" aria-controls="collapseWidthExample6">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Cómo puedo realizar un seguimiento de mi pedido?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample6">
        <div class="card card-body" style="width: 800px; border:none;">
        Una vez que tu pedido se envíe, recibirás un número de seguimiento por correo electrónico para rastrear tu paquete.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample1" aria-controls="collapseWidthExample1">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Tienen tallas para niños?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample1">
        <div class="card card-body" style="width: 800px; border:none;">
        No, nuestra ropa esta diseñada para adolescente, jovenes y adultos, por lo que no contamos con dichas tallas.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample7" aria-controls="collapseWidthExample7">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Los precios incluyen impuestos?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample7">
        <div class="card card-body" style="width: 800px; border:none;">
        Sí, los precios mostrados incluyen los impuestos correspondientes.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample8" aria-controls="collapseWidthExample8">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Ofrecen descuentos para estudiantes?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample8">
        <div class="card card-body" style="width: 800px; border:none;">
        Sí, ofrecemos descuentos especiales para estudiantes. Regístrate con tu correo estudiantil para obtener más detalles.
        </div>
        </div>
    </div>

    <p>
        <button class="btn" type="button" style="font-size:19px;" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample9" aria-controls="collapseWidthExample9">
        <i class="fa-solid fa-splotch" style="color: rgba(228, 158, 158, 0.356); font-size:13px;"></i> ¿Puedo cancelar mi pedido después de realizarlo?
        </button>
    </p>
    <div style="min-height: 120px;">
        <div class="collapse collapse-horizontal" id="collapseWidthExample9">
        <div class="card card-body" style="width: 800px; border:none;">
        Puedes cancelar tu pedido antes de que sea enviado. Ponte en contacto con nuestro equipo de soporte para asistencia.
        </div>
        </div>
    </div>

</div>

</body>

<!-- header
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->

<?php
    include 'footer.php'
?>