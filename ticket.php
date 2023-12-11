<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Ticket</title>
    <!-- Agrega los enlaces a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i04F5L5+8rvaI8L2PxpM46CDXitWq6YdUCqKxIep9tiCx8V88RNqmz9w9" crossorigin="anonymous">
    <style>
        /* Agrega estilos CSS según sea necesario */
        body {
            font-family: Arial, sans-serif;
        }

        .button-container {
            text-align: center;
            margin-top: 120px;
        }

        .button-container h1{
            margin: 50px;
        }

        .custom-button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
            color: gray;
        }
        .custom-button:hover{
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="button-container">
        <h1>Elije cómo quieres tu Ticket</h1>
        <a href="pdf.php" class="custom-button">
            <i class="fas fa-file-pdf"></i> PDF<?php echo $_SESSION["descuento"] ?>
        </a>
        <a href="" class="custom-button">
            <i class="fas fa-digital-tachograph"></i> DIGITAL
        </a>
        <a href="" class="custom-button">
            <i class="fas fa-envelope"></i> CORREO
        </a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
