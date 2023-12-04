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
                            <a id="menu1" href="men.php">Men</a>
                            <a id="menu1" href="tienda.php">Todos</a>
                        </div>
                    </div>
                    
                    <div class="enc">
                      <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size:25px;"></i>
                      <div style="font-size:17px;">0</div>
                    </div>
                    <?php 
                    if(isset($_SESSION["cuenta"])){
                      if($cuenta == "admin"){?>
                      <div class="dropdown">
                          <button class="dropbtn">Admin</button>
                          <div class="dropdown-content">
                              <a id="menu1" href="altastienda.php">Agregar productos</a>
                              <a id="menu1" href="cambiostienda.php">Editar productos</a>
                              <a id="menu1" href="bajastienda.php">Eliminar productos</a>
                          </div>
                      </div>
                    <?php } 
                      }
                    ?>
                    <?php 
                //Ya inicio sesion
                if(isset($_SESSION["cuenta"])){
                $cuenta = $_SESSION["cuenta"];
                ?>
                <div class="dropdown">
                        <button class="dropbtn"><i class="fa-solid fa-user" style="color: #000000; font-size:25px;"></i><?php echo $cuenta; ?></button>
                        <div class="dropdown-content">
                            <a id="menu1" href="cerrar_sesion.php">Cerrar Sesión</a>
                        </div>
                    </div>
                <?php }else{
                  ?>
                  <div class="dropdown">
                        <button class="dropbtn"><i class="fa-regular fa-circle-user" style="color: #000000; font-size:28px;"></i></button>
                        <div class="dropdown-content">
                            <a id="menu1" href="login.php">Iniciar Sesión</a>
                            <a href="registro.php">Registrarse</a>
                        </div>
                    </div>
                  <?php
                } ?>
                </nav>
            </div>
        </div>
</header>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


