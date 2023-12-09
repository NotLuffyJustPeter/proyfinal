<?php
session_start();

// Verificar si hay productos en el carrito
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    $carrito = $_SESSION['carrito'];

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

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/carrito.css">
        <title>Carrito de compras</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <br><br><br>
        <h1>Carrito de compras</h1>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carrito as $productoId => $detallesProducto) {
                    // Consulta para obtener detalles del producto desde la base de datos
                    $query = "SELECT * FROM $tabla WHERE Id_producto = $productoId";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<tr>';
                        echo '<td>' . $row['Id_producto'] . '</td>';
                        echo '<td><img src="imagenes/' . $row['imagen'] . '" alt="imagen no cargada"></td>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $detallesProducto['cantidad'] . '</td>';
                        // Agrega más columnas según sea necesario
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>

        <?php include 'footer.php'; ?>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito de compras</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <h1>Carrito de compras</h1>
        <p>No hay productos en el carrito.</p>
        <?php include 'footer.php'; ?>
    </body>
    </html>
<?php
}
?>