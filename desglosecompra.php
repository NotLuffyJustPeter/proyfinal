<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="css/styt.css">
    <link rel="stylesheet" href="css/altas.css">
</header>
<?php
session_start();
include 'header.php';
$cuponesValidos = [
    'SGFS23' => 15,
    'FASHION30' => 20,
    'SGFS10' => 10,
];

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    $subtotal = $_SESSION['subtotal'];
    $_SESSION['total']=$subtotal;
    $carrito = $_SESSION['carrito'];

    $descuentototal = $_SESSION['descuentototal'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sirenegaze";
    $tabla = "inventario";

    $descuento = 0;
    $totalCarrito = 0;
    $totalcupon = 0;
    $impuestos = 0;
    $gastosEnvio = 0;


    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigoDescuento'])) {
        $codigo = $_POST['codigo'];
        if (array_key_exists($codigo, $cuponesValidos)) {
            
            $descuento = $cuponesValidos[$codigo];
            $totalCarrito = $subtotal; 
            $totalcupon = $totalCarrito - ($totalCarrito * $descuento / 100);
            $_SESSION['total'] = $totalcupon;
        }
    }
}
?>

<!-- Vista: Mostrar desglose -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZqBAYB1B/BKQxIepqXarGBjDAJ7f6dU6" crossorigin="anonymous">
    <title>Procesar Pago</title>
</head>
    <style>
        body {
            background-color: #f4f4f4;
            padding-top: 90px;
        }
        table {
            width: 55%;
            border-collapse: collapse;
            border: 1px solid black; /* Establece el borde de la tabla */
        }
        td {
            padding: 8px; /* Añade relleno a las celdas para separar el contenido del borde */
        }
    </style>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3> <a href="direccionenvio.php">Paso 2-></a>  Paso 3-></h3>
            <h3>Detalle de Pago</h3>
            
            <form class="mx-auto" action="direccionenvio.php">
                <div class="form-group">
                <?php 
                foreach ($carrito as $productoId => $detallesProducto) {
                    echo '<div class="form-group">';
                    
                    if($detallesProducto['cantidad'] != 0){
                        $query = "SELECT * FROM $tabla WHERE Id_producto = $productoId";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<table>';
                            echo '<tr>';
                            echo '<td rowspan=5><img class="img_carrito" src="imagenes/' . $row['imagen'] . '" alt="imagen no cargada" width="70" height="90"></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>' . $detallesProducto['cantidad'] . ' pz</td>';
                            echo '<td> </td>';
                            echo '<td> </td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td> </td>';
                            echo '<td> </td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td>' . $row['descripcion'] . '</td>';
                            echo '<td> </td>';
                            echo '<td> </td>';
                            echo '</tr>';
                            if ($row['descuento'] != 0) {
                                $precio_final = ($row['precio'] - $row['precio'] * $row['descuento'] / 100);
                            } else {
                                $precio_final = $row['precio'];
                            }
                            echo '<tr>';
                            echo '<td>$' . $precio_final * $detallesProducto['cantidad'] . '</td>';
                            echo '<td> </td>';
                            echo '<td> </td>';
                            echo '</tr>';
                            echo '</table>';

                        }
                    }
                     echo '</div>';
                }
                ?>
                </div>
                <div class="form-group">
                    <p>Subtotal: $<?php echo $subtotal; ?></p>
                    <!-- <p>Descuento del cupón: $<?php //echo $descuento; ?></p>
                    <p>Total con descuento: $<?php //echo $totalConDescuento; ?></p>
                    <p>Impuestos (<?php //echo ($impuestos * 100); ?>%): $<?php //echo $totalConImpuestos - $totalConDescuento; ?></p>
                    <p>Gastos de envío: $<?php //echo //$gastosEnvio; ?></p> -->
                    <h2>Total a Pagar: $<?php echo $_SESSION['total']; ?></h2>
                </div>
                
                <div class="form-group">
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <form class="mx-auto" method="post">
                <div class="form-group">
                    <input type="text" id="codigo" name="codigo" placeholder="Promo code">
                    <button type="submit" name="codigoDescuento" class="btn btn-primary">Aplicar Código</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>