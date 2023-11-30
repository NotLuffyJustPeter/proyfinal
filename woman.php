<header>
    <link rel="stylesheet" href="css/styt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</header>
<?php
require 'header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sirenegaze";
$tabla = "inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos de la tabla inventario
$dataQuery = "SELECT * FROM $tabla";
$dataResult = $conn->query($dataQuery);

    
if ($dataResult) {
    $dataResult->data_seek(0);
    
    ?>
    <h1 class="subtitulo1" style="margin:100px; ">W &nbsp&nbspO &nbsp&nbspM &nbsp&nbspA &nbsp&nbspN</h1>
    <div class="tienda" style="display: grid; grid-template-columns: repeat(4, 1fr); margin: 100 50px;">
    
    <?php

    while ($row = $dataResult->fetch_assoc()) {
        // Asignar valores a variables
        $id = $row['Id_producto'];
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $cantidad = $row['cantidad'];
        $precio = $row['precio'];
        $imagen = $row['imagen'];
        $descuento = $row['descuento'];
        $categoria = $row['categoria'];
        $subcategoria = $row['subcategoria'];

        if($categoria == 'woman'){
        ?>
        <div class="contenedor">
        <img src="<?php echo 'imagenes/' . $imagen ?>" alt="" class="con">
        <h5 style="font-weight: bold;"><?php echo $nombre ?></h5>
        <p><?php echo 'MXN ' . $precio . '<br>Cantidad en existencia: ' . $cantidad . '<br>';
        if($descuento==0){
            echo 'Sin descuento';
        }else{
            echo 'Descuento del ' . $descuento . '%';
        }
        ?></p>
        <details>
            <summary>Descripción</summary>
            <p><?php echo $descripcion ?></p>
        </details>
        <button class="buy"><i class="fa-solid fa-plus" style="color: #080808;"></i></button>
        </div>
        
    <?php
        }
    }
} else {
        echo "Error al obtener datos de la tabla: " . $conn->error;  
}

?>