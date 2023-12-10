<?php
session_start();
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

// Obtener los valores del rango de precios desde la solicitud POST
$precioMin = isset($_POST['precio_min']) ? $_POST['precio_min'] : 0;
$precioMax = isset($_POST['precio_max']) ? $_POST['precio_max'] : 2000;
$var=0;

// Construir la consulta SQL con la condición del rango de precios
$dataQuery = "SELECT * FROM $tabla";

if ($precioMin > 0 || $precioMax < 2000) {
    $dataQuery .= " WHERE precio BETWEEN $var AND $precioMin";
}

$dataResult = $conn->query($dataQuery);

if ($dataResult) {
    $dataResult->data_seek(0);

    if ($dataResult->num_rows > 0) {
        while ($row = $dataResult->fetch_assoc()) {
            // Mostrar los resultados según tus necesidades
            echo '<div class="contenedor">';
            echo '<div class="con"><img src="imagenes/' . $row['imagen'] . '" alt=""></div>';
            echo '<h5 style="font-weight: bold;">ID: ' . $row['Id_producto'] . '</h5>';
            echo '<h5 style="font-weight: bold;">' . $row['nombre'] . '</h5>';
            echo '<p>Precio: MXN ' . $row['precio'] . '</p>';
            echo '<p>Cantidad en existencia: ' . $row['cantidad'] . '</p>';
            echo '<p>Descuento del: ' . $row['descuento'] . '%</p>';
            echo '<details>';
            echo '<summary>Descripción</summary>';
            echo '<p>' . $row['descripcion'] . '</p>';
            echo '</details>';
            if(isset($_SESSION["cuenta"])){ 
            echo '<button class="buy" onclick="agregarAlCarrito(' . $row['Id_producto'] . ')"><i class="fa-solid fa-plus" style="color: #080808;"></i></button>';
            }else{
            echo '<button class="buy" onclick="mensaje()"><i class="fa-solid fa-plus" style="color: #080808;"></i></button>';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No se encontraron productos en este rango de precios.</p>';
    }
} else {
    echo "Error al obtener datos de la tabla: " . $conn->error;  
}

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    function agregarAlCarrito(productoId) {
        var xhr = new XMLHttpRequest();

        xhr.open("POST", "agregarcarrito.php", true);
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

    function mensaje() {
        Swal.fire({
            title: '¡Inicia sesión!',
            text: 'Debes iniciar sesión para agregar productos al carrito.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ir a iniciar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.php';
            }
        });
    }
</script>
