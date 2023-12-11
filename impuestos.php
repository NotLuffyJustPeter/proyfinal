<?php
session_start();

if (isset($_POST['impuestos'])) {
    $_SESSION["impuestos"] = $_POST['impuestos'];
    echo "Impuestos guardados correctamente";
} else {
    echo "Error al guardar impuestos";
}

?>
