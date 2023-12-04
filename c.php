<?php
session_start();
?>

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

$dataQuery = "SELECT * FROM $tabla";
$dataResult = $conn->query($dataQuery);
if ($dataResult) {
    $dataResult->data_seek(0);
    ?>
    <div class="tienda" style="display: grid; grid-template-columns: repeat(4, 1fr); margin: 100 50px;">
        <?php
        while ($row = $dataResult->fetch_assoc()) {
            // Asignar valores a variables
            $id = $row['Id_producto'];
            $nombreE = $row['nombre'];
            $descripcionE = $row['descripcion'];
            $cantidadE = $row['cantidad'];
            $precioE = $row['precio'];
            $imagenE = $row['imagen'];
            $descuentoE = $row['descuento'];
            $categoriaE = $row['categoria'];
            $subcategoriaE = $row['subcategoria'];
            ?>
            <div class="contenedor">
                <img src="<?php echo 'imagenes/' . $imagenE ?>" alt="" class="con">
                <h5 style="font-weight: bold;"><?php echo $nombreE ?></h5>
                <p><?php echo 'MXN ' . $precioE . '<br>Cantidad en existencia: ' . $cantidadE . '<br>';
                    if ($descuentoE == 0) {
                        echo 'Sin descuento';
                    } else {
                        echo 'Descuento del ' . $descuentoE . '%';
                    }
                    ?>

                </p>
                <button class="editar-button" onclick="editarProducto(<?php echo $id; ?>)">Editar Producto <?php echo $id ?></button>
                <div id="editarP"></div>

                <details>
                    <summary>Descripción</summary>
                    <p><?php echo $descripcionE ?></p>
                </details>
            </div>
        <?php
        }
        ?>
    </div>
<?php
} else {
    echo "Error al obtener datos de la tabla: " . $conn->error;
}

$conn->close();
?>

<script>
    function editarProducto(idProducto) {
        window.location.href = 'cambiostienda.php?id=' + idProducto;
    }
</script>