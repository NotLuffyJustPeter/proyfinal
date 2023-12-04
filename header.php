<?php 
  if(isset($_SESSION["cuenta"])){
    $cuenta = $_SESSION["cuenta"];
  }
?> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styh.css">
  </head>

  <body>
<header id="header1">
        <div class="enc">
            <a href="index.php" class="boton-logo">
                <img id="logo" src="imagenes/Log.png" alt="Logo Dreams">SireneGaze
            </a>
            
            <div class="encabezado">
                <nav id="menu">
                    <a class="menu1" href="index.php">Home</a>
                    <a class="menu1" href="acercade.php">Acerca de</a>
                    <a class="menu1" href="preguntas.php">Ayuda</a>
                    <a class="menu1" href="contactanos.php">Contactanos</a>
                    <div class="dropdown">
                        <button class="dropbtn">Tienda</button>
                        <div class="dropdown-content">
                            <a id="menu1" href="woman.php">Woman</a>
                            <a href="men.php">Men</a>
                            <a href="tienda.php">Todos</a>
                        </div>
                    </div>
                    
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fa-regular fa-circle-user" style="color: #000000; font-size:28px;"></i></button>
                        <div class="dropdown-content">
                            <a id="menu1" href="iniciarsesion.php">Iniciar Sesión</a>
                            <a href="registrarse.php">Registrarse</a>
                        </div>
                    </div>
                    <div class="enc">
                      <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size:25px;"></i>
                      <div style="font-size:17px;">0</div>
                    </div>
                </nav>
            </div>
        </div>
</header>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>




<!-- 
  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styh.css">
  </head>

<body>
<nav class="navbar navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="header1 navbar-brand" href="index.php"><img src="imagenes/Log.png" alt="" class="logo">SireneGaze</a>
    <a class="header1 navbar-brand" href="index.php">Home</a>
    <a class="header1 navbar-brand" href="#">Acerca de</a>
    <a class="header1 navbar-brand" href="#">Ayuda</a>
    <a class="header1 navbar-brand" href="#">Contactanos</a>
    <a class="header1 navbar-brand" href="tienda.php">Tienda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu dropdown-menu-light">
              <li><a class="dropdown-item" href="woman.php">Woman</a></li>
              <li><a class="dropdown-item" href="men.php">Men</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Accesorios</a></li>
            </ul>
          </li>
        </ul>
        
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>

        <?php 
        if(isset($_SESSION["cuenta"])){
          if($cuenta == "admin"){?>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item activate"><a href="a.php" class="nav-link">Agregar productos</a></li>
              <li class="nav-item"><a href="c.php" class="nav-link">Editar productos</a></li>
              <li class="nav-item"><a href="b.php" class="nav-link">Eliminar productos</a></li>
            </ul>
        <?php } 
          }
        ?>

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 position-absolute bottom-0 start-50 translate-middle-x navbar-nav-divider">
          <?php 
          //Ya inicio sesion
            if(isset($_SESSION["cuenta"])){
               $cuenta = $_SESSION["cuenta"];
          ?>
          <li class="nav-item">
              <center><a class="nav-link active" aria-current="page" href="login.php"><?php echo $cuenta; ?></a></center>
          </li>
          <li class="nav-item">
              <center><a class="nav-link active red" href="cerrar_sesion.php">Cerrar Sesion</a></center>  
          </li>
          <?php }else { 
          //No ha iniciado sesion
          ?>
          <li class="nav-item">
              <center><a class="nav-link active" aria-current="page" href="login.php">Iniciar Sesion</a></center>
          </li>
          <li class="nav-item">
              <center><a class="nav-link active" href="registro.php">Registrarse</a></center>  
          </li>
          <?php } ?>


        </ul>

      </div>
    </div>
  </div>
</nav>
 
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->