<?php
session_start();

$totalActualizado = $_SESSION['total'] + $_SESSION['gastosEnvio'] + $_SESSION['impuestos'] - $_SESSION["descuento"];

echo 'T O T A L : $' . number_format($totalActualizado, 0);
?>