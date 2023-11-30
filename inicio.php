<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/sty.css">
    <style>
    .bloque2{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
        background-color: rgba(0, 0, 0, 0.078);
        margin: 100px;
    }
    .uno{
        padding: 20px;
        grid-column: span 1; /* El primer elemento ocupa una columna */
    }

    .dos{
        grid-column: span 2; /* El segundo elemento ocupa dos columnas */
    }
    </style>
</head>
<body>
    <div class="bloque1">
        <div class="texto">
            <h1 class="t1">F A S H I O N</h1>
            <h1 class="t2">N E V E R</h1>
            <h1 class="t2" style="margin-left: 180px;">S L E E P S</h1>
            <i style="margin-left: 500px; margin-top: 0px;" class="fa-solid fa-splotch" style="color: #000000;"></i>
            <br>
            <img class="logo2" src="imagenes/Log.png" alt="" class="logo">

            <h5>Explora el mundo de la moda. En nuestra tienda online, cada prenda es una declaración de estilo. Encuentra lo que te define y eleva tu guardarropa.</h5>

        </div>
        <div class="imagenes">
            <img class="b1" src="imagenes/imginicio2.jpg" alt="" class="jess">
            <img class="b1" src="imagenes/jess5.jpg" alt="" class="jess">
            <img class="b1" src="imagenes/man_chamarra.jpg" alt="" class="jess">
            <img class="b1" src="imagenes/jess2.jpg" alt="" class="jess">
        </div>
    </div>

    <div class="bloque2">
        <div class="uno">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="imagenes/jess1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="imagenes/imginicio.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="imagenes/imginicio2.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="dos">
          HOLA MUNDO
        </div>
    </div>

    <h1 class="subtitulo1">W &nbsp&nbspO &nbsp&nbspM &nbsp&nbspA &nbsp&nbspN</h1>
    <div class="bloque4">
        <img src="imagenes/woman_pantalon.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/woman_blusa.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/woman_sueter.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/woman_chamarra.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/woman_vestido.jpg" alt="" class="cat b3 efecto1">

        <h4>Pantalones</h4>
        <h4>Blusas</h4>
        <h4>Sueteres</h4>
        <h4>Chamarras</h4>
        <h4>Vestidos</h4>
    </div>
    <h1 class="subtitulo2">M &nbspE &nbspN</h1>
    <div class="bloque5">
        <div class="blanco"></div>
        <div class="blanco"></div>
        <div class="blanco"></div>
        <img src="imagenes/man_camisa.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/man_camisa_mc.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/man_chamarra.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/man_pantalon.jpg" alt="" class="cat b3 efecto1">
        <img src="imagenes/man_sudadera.jpg" alt="" class="cat b3 efecto1">
        <div class="blanco"></div>
        <div class="blanco"></div>
        <div class="blanco"></div>
        
        <div class="blanco"></div>
        <div class="blanco"></div>
        <h4>Camisas</h4>
        <h4>Playeras</h4>
        <h4>Chamarras</h4>
        <h4>Pantalones</h4>
        <h4>Sudaderas</h4>
    </div>
    

    <div class="bloque6">
      <!-- <img class="inicio" src="imagenes/imginicio3.jpg" alt=""> -->
    </div>

</body>

</html>