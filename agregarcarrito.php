<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoId = isset($_POST['producto_id']) ? intval($_POST['producto_id']) : 0;

    if ($productoId > 0) {
        // Lógica para agregar al carrito aquí
        $_SESSION['carrito'][$productoId]['cantidad'] = isset($_SESSION['carrito'][$productoId]['cantidad'])
            ? $_SESSION['carrito'][$productoId]['cantidad'] + 1
            : 1;
        
        $_SESSION["contador"] = isset($_SESSION["contador"]) ? $_SESSION["contador"] + 1 : 1;
        
        echo json_encode(['success' => true]);
    } else {    
        echo json_encode(['error' => 'ID de producto no válido']);
    }
} else {
    echo json_encode(['error' => 'Método de solicitud no válido']);
}
