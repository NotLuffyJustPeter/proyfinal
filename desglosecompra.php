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
    $_SESSION['total'] = $subtotal;
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
    $temp2 = 0;

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    if($_SESSION['pais']==='MEX' || $_SESSION['pais']==='USA')
        $paisHolder=$_SESSION['pais'];
    if($_SESSION['subtotal'] < 1500)
        $gastosEnvio=300;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigoDescuento'])) {
        $codigo = $_POST['codigo'];
        if($_SESSION['impuestos']===0){
            echo '<script type="text/javascript">
            var mensaje = "¡Primero selecciona un país!";
            alert(mensaje);

            setTimeout(function() {
                window.location.href = "desglosecompra.php";
            }, 500);
            </script>';
        }
        
        if (array_key_exists($codigo, $cuponesValidos)) {
            
            $descuento = $cuponesValidos[$codigo];
            $totalCarrito = $subtotal;
            $_SESSION['cupon']=$totalCarrito * $descuento / 100;
            $_SESSION['total'] = $_SESSION['total'] - $_SESSION['cupon'];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica si se recibieron datos por POST
        if (isset($_POST['pais'])) {
            $pais = $_POST['pais']; // Obtiene el país seleccionado
            if ($pais === 'USA') {
                $impuestos = $_SESSION['subtotal'] * 0.0625;
                $_SESSION['pais']='USA';
                $_SESSION['impuestos']=$impuestos;
            } else if ($pais === 'MEX') {
                $impuestos = $_SESSION['subtotal'] * 0.16;
                $_SESSION['impuestos']=$impuestos;
                $_SESSION['pais']='MEX';
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checar'])) {
        if ($_SESSION['impuestos']===0) {
            echo '<script type="text/javascript">
            var mensaje = "¡Primero selecciona un país!";
            alert(mensaje);

            setTimeout(function() {
                window.location.href = "desglosecompra.php";
            }, 500);
            </script>';
        }else{
            $_SESSION['total'] = $_SESSION['total'] + $gastosEnvio + $_SESSION['impuestos'] - $_SESSION['cupon'];
            header("Location: direccionenvio.php");
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#pais').change(function() {
            $('#formDireccion').submit(); // Envía el formulario al seleccionar un país
        });
    });
    </script>
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
            <h3> <a href="desglosecompra.php">Paso 1-></a></h3>
            <h3>Detalle de Pago</h3>
            
            
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
                            echo '<td rowspan=5><img class="img_carrito" src="imagenes/' . $row['imagen'] . '" alt="imagen no cargada" width="130" height="180"></td>';
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
                    <p>Subtotal: $<?php echo $subtotal;?></p>
                    <div class="form-group">
                    <p>Descuento del cupón al subtotal: $<?php echo $_SESSION['cupon']; ?></p>
                    </div>
                    <div class="form-group">
                    <form class="mx-auto" id="formDireccion" method="post">
                        <div class="form-group">
                            <label for="pais">País:</label>
                            <select id="pais" name="pais" required>
                            <?php $paisHolder=$_SESSION['pais'];?>
                                <option value=""><?php echo $paisHolder; ?></option>
                                <option value="USA">Estados Unidos</option>
                                <option value="MEX">México</option>
                            </select>
                        </div>
                    </form>
                    </div>
                    <div class="form-group">
                        <p title="Los impuestos son aplicados al subtotal">Impuestos aplicados: (6.25% USA 16% Mex) $<?php echo $_SESSION['impuestos']; ?></p>
                    </div>
                    <div class="form-group">
                    <p>Gastos de envío: $<?php echo $gastosEnvio; ?></p>
                    </div>
                    <div class="form-group">
                        <h2>Total a Pagar: $<?php echo $_SESSION['total'] + $gastosEnvio + $_SESSION['impuestos'];?></h2>
                    </div>
                </div>
                <form class="mx-auto" method="post">
                <div class="form-group">
                    <button type="submit" name="checar" class="btn btn-primary">Siguiente</button>
                </div>
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