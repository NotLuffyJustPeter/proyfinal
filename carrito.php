<?php
session_start();

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    $carrito = $_SESSION['carrito'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sirenegaze";
    $tabla = "inventario";
    $total = 0;

    $conn = new mysqli($servername, $username, $password, $dbname);

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
                    <th class="px-3 can">Imagen</th>
                    <th class="px-3 can">Producto</th>
                    <th class="px-3 can">Descripcion</th>
                    <th class="px-3 can">Precio</th>
                    <th class="px-3 can">Cantidad</th>
                    <th class="px-3 can">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carrito as $productoId => $detallesProducto) {
                    if($detallesProducto['cantidad'] != 0){
                        $query = "SELECT * FROM $tabla WHERE Id_producto = $productoId";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<tr>';
                            echo '<td class="align-middle px-4"><img class="img_carrito" src="imagenes/' . $row['imagen'] . '" alt="imagen no cargada"></td>';
                            echo '<td class="align-middle px-4">' . $row['nombre'] . '</td>';
                            echo '<td class="align-middle px-4">' . $row['descripcion'] . '</td>';
                            echo '<td class="align-middle px-4 can"> $' . $row['precio'] . '</td>';
                            echo '<td class="align-middle px-4 can">' . $detallesProducto['cantidad'] . '</td>';
                            echo '<td class="align-middle px-4 can"> $' . $row['precio'] * $detallesProducto['cantidad'] . '</td>';
                            echo '<td class="align-middle px-4 can"><button onclick="eliminar(' . $row['Id_producto'] . ')"><i class="fa-regular fa-trash-can" style="color: #000000; font-size:25px;"></i></button></td>';
                            echo '</tr>';
                        }
                        $total = $row['precio'] * $detallesProducto['cantidad'] + $total;
                    }
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
        <script>
            function eliminar(productoId) {
                var xhr = new XMLHttpRequest();

                xhr.open("POST", "eliminarcarrito.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var respuesta = JSON.parse(xhr.responseText);

                        if (respuesta.success) {
                            window.location.reload();
                        }else{
                            Swal.fire({
                            icon: 'info',
                            title: 'Sin existencias',
                            text: 'Ya no hay más productos en existencias.',
                            confirmButtonText: 'OK'
                            });
                        }
                    }
                };

                xhr.send("producto_id=" + productoId);
            }
        </script>
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