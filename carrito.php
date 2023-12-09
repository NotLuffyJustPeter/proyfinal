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
    $total = 0;

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
        <style>
    
        </style>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <br><br><br>
        <br><br>
        <div class="carrito">

        <h1 class="titulo">C a r r i t o &nbsp&nbsp  d e  &nbsp&nbspc o m p r a s</h1>
        <table class="table table-borderless table-hover prod">
        
            <thead>
                <tr>
                    <th class="px-3 can">ID</th>
                    <th class="px-3 can">Imagen</th>
                    <th class="px-3 can">Producto</th>
                    <th class="px-3 can">Descripcion</th>
                    <th class="px-3 can">Precio</th>
                    <th class="px-3 can">Cantidad</th>
                    <th class="px-3 can">Subtotal</th>
                    <!-- Agrega más columnas según sea necesario -->
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carrito as $productoId => $detallesProducto) {
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
                    $total = $row['precio'] * $detallesProducto['cantidad'] + $total;
                }
                echo '<tr>';
                    echo '<td colspan="6" style="text-align:center;">T&nbsp O &nbspT&nbsp A&nbsp L</td>';
                    // echo '<td></td>';
                    // echo '<td></td>';
                    // echo '<td></td>';
                    // echo '<td></td>';
                    // echo '<td></td>';
                    echo '<td class="can">$' . $total .'</td>';
                    echo '<td></td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        </div>

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