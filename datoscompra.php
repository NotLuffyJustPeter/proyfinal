<?php session_start(); 

require 'header.php';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZqBAYB1B/BKQxIepqXarGBjDAJ7f6dU6" crossorigin="anonymous">
    <title>Formulario de Tarjeta de Crédito</title>
</head>
<style>
        body {
            background-color: #f4f4f4;
            padding-top: 90px;
        }
    </style>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="mx-auto">
                <div class="form-group">
                    <label for="nombre">Nombre Completo (en la Tarjeta)</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required>
                </div>

                <div class="form-group">
                    <label for="numeroTarjeta">Número de Tarjeta</label>
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control" id="numeroTarjeta" placeholder="Número de Tarjeta" required>

                        <span class="input-group-text text-muted mx-2">
                            <i class="fa fa-cc-visa mx-1"></i>
                            <i class="fa fa-cc-amex mx-1"></i>
                            <i class="fa fa-cc-mastercard mx-1"></i>
                        </span>
                    </div>
                </div>

                <div class="form-row d-flex align-items-center">
                    <div class="form-group col-md-4">
                        <label for="expiracionMes">Mes de Expiración</label>
                        <input type="text" class="form-control" id="expiracionMes" placeholder="MM" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="expiracionAnio">Año de Expiración</label>
                        <input type="text" class="form-control" id="expiracionAnio" placeholder="AAAA" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label data-toggle="tooltip" title="Codigo de 3 digitos en la parte de atras de tu tarjeta">CCV
                            <i class="fa fa-question-circle"></i>
                        </label>
                        <input type="text" class="form-control" id="ccv" placeholder="CCV" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>

