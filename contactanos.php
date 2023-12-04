<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contactanos.css">
    <style>
      body{
        display: flex;
        flex-direction: column;
        color:white;
        align-items: center;
        justify-content: center;
      }
    </style>

</head>
<body>
    <div class="contenedor_form">
        <div class="overlay">
            <form id="contacto">
                <h2 style="text-align: center; font-weight: 500;">C o n t a c t a n o s</h2><br>
                <label for="inputName" class="Etiqueta">Nombre</label>
                <input type="text" name="nombre" class="input_texto">
                <label for="inputEmail" class="Etiqueta">Correo</label>
                <input type="email" name="nombre" class="input_texto">
                <label for="inputMsj" class="Etiqueta">Mensaje</label>
                <textarea class="input_msj" name="mensaje"></textarea>
                <button type="submit" class="btn_formulario">Enviar</button>
            </form>
        </div>
    </div>

</body>
</html>
<?php
    include 'footer.php';
?>