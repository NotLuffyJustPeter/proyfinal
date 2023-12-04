<?php session_start(); ?>

<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/styt.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</header>

<?php
require('header.php');
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
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $categoria = $_POST["categoria"];
    $subcategoria = $_POST["subcategoria"];

    // Procesar la imagen si se proporciona
    if (!empty($_FILES["imagen"]["name"])) {
        $imagen = $_FILES["imagen"]["name"];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $carpetaDestino = 'imagenes/';
        $rutaCompleta = $carpetaDestino . $imagen;
        move_uploaded_file($rutaTemporal, $rutaCompleta);
    } else {
        // Si no se proporciona una nueva imagen, mantener la imagen existente
        $consultaImagen = $conn->prepare("SELECT imagen FROM $tabla WHERE Id_producto = ?");
        $consultaImagen->bind_param("i", $idProducto);
        $consultaImagen->execute();
        $resultadoImagen = $consultaImagen->get_result();
        $imagenAntigua = $resultadoImagen->fetch_assoc()['imagen']['name'];
        $imagen = $imagenAntigua;
        $consultaImagen->close();
    }

    // Actualizar los datos en la base de datos
    $actualizarConsulta = $conn->prepare("UPDATE $tabla SET nombre = ?, descripcion = ?, cantidad = ?, precio = ?, descuento = ?, categoria = ?, subcategoria = ?, imagen = ? WHERE Id_producto = ?");
    $actualizarConsulta->bind_param("ssidisss", $nombre, $descripcion, $cantidad, $precio, $descuento, $categoria, $subcategoria, $imagen);

    if ($actualizarConsulta->execute()) {
        echo "Cambios guardados correctamente.";
        header("Location: tienda.php");  
    } else {
        echo "Error al guardar cambios: " . $actualizarConsulta->error;
    }

    $actualizarConsulta->close();
}

// Obtener los datos actuales del producto
if (isset($_GET['id'])) {
    $idProductoEditar = $_GET['id'];

    $consultaEditar = $conn->prepare("SELECT * FROM $tabla WHERE Id_producto = ?");
    $consultaEditar->bind_param("i", $idProductoEditar);
    $consultaEditar->execute();
    $resultadoEditar = $consultaEditar->get_result();

    if ($resultadoEditar->num_rows > 0) {
        $productoEditar = $resultadoEditar->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
    }

    $consultaEditar->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<body>
    <div class="tienda" style="display: grid; grid-template-columns: repeat(4, 1fr); margin: 100 50px;">
        <form method="post" enctype="multipart/form-data" action="cambiosguardar.php">
            <div class="contenedor">
                <h5 style="font-weight: bold;">Editar Producto <?php echo $idProductoEditar ?></h5>
                <input type="hidden" name="Id_producto" value="<?php echo $productoEditar['Id_producto']; ?>">
                <img id="imagenPrevia" src="<?php echo 'imagenes/' . $productoEditar['imagen']; ?>" alt="" class="con" style="max-width: 300px; max-height: 300px;">
                <input type="file" name="imagen" accept="image/jpeg, image/png" onchange="mostrarVistaPrevia(this)"><br>
                <h5 style="font-weight: bold;">Nombre de la prenda</h5>
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $productoEditar['nombre']; ?>" required><br>
                <p><?php echo 'Precio MXN:'  , '<br>'; ?>
                <input type="number" name="precio" placeholder="Precio" value="<?php echo $productoEditar['precio']; ?>" required>
                <?php echo 'Cantidad en existencia: '  , '<br>'; ?>
                <input type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $productoEditar['cantidad']; ?>" required><br>
                <?php echo 'Descuento <br><input type="number" name="descuento" value="' . $productoEditar['descuento'] . '" required> %'; ?>
                <br></p>
                <details>
                    <summary>Descripción</summary>
                    <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $productoEditar['descripcion']; ?>" required><br>
                    <label for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required>
                        <option value="men">Men</option>
                        <option value="woman">Women</option>
                    </select><br>
                    <input type="text" name="subcategoria" placeholder="Subcategoria" value="<?php echo $productoEditar['subcategoria']; ?>" required>
                </details>
                <button type="submit">Guardar Cambios</button><br>
            </div>
        </form>

        <script>
            function mostrarVistaPrevia(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('imagenPrevia').src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</body>

</html>
