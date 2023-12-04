<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "sirenegaze";
$tabla = "inventario";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProducto = $_POST["Id_producto"];
    $nombreEditar = $_POST["nombre"];
    $precioEditar = $_POST["precio"];
    $imagen = $_FILES["imagen"]["name"];
    $existenciaEditar = $_POST["existencia"];
    $descuentoEditar = $_POST["descuento"];
    $descripcionEditar = $_POST["descripcion"];
    $categoriaEditar = $_POST["categoria"];
    $subcategoriaEditar = $_POST["subcategoria"];

    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $carpetaDestino = 'imagenes/'; 

    $rutaCompleta = $carpetaDestino . $imagen;

    move_uploaded_file($rutaTemporal, $rutaCompleta);

    // Actualizar los datos en la base de datos
    $actualizarConsulta = $conn->prepare("UPDATE $tabla SET nombre = ?, precio = ?, cantidad = ?, descuento = ?, descripcion = ?, categoria = ?, subcategoria = ?, imagen = ? WHERE Id_producto = ?");
    $actualizarConsulta->bind_param("sdiissssi", $nombreEditar, $precioEditar, $existenciaEditar, $descuentoEditar, $descripcionEditar, $categoriaEditar, $subcategoriaEditar, $imagen, $idProducto);

    if ($actualizarConsulta->execute()) {
        header("Location: tienda.php");
        exit(); 
    } else {
        echo "Error al guardar cambios: " . $actualizarConsulta->error;
    }

    $actualizarConsulta->close();
} else {
    echo "Solicitud incorrecta.";
}

$conn->close();
?>
