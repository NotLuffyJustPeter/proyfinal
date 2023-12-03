<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <h4>Iniciar Sesión</h4>
            <div class="card-body">
                <form id="loginForm" action="login.php" method="post">
                    <div class="form-group">
                        <label for="cuenta">Cuenta:</label>
                        <input type="text" class="form-control" id="cuenta" name="cuenta" value="<?php if(isset($_COOKIE["cuenta"])) {echo $_COOKIE["cuenta"]; } ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"]; } ?>" required>
                    </div>
                    <div class="form-group">
                        <p><input type="checkbox" name="remember"> Recordar cuenta y password
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuenta = $_POST["cuenta"];
    $password = $_POST["password"];

    $claveSecreta = "tu_clave_secreta";

    $conn = new mysqli("localhost", "root", "", "sirenegaze");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $stmt_verificar = $conn->prepare("SELECT nombre, password FROM usuarios WHERE cuenta = ?");
    $stmt_verificar->bind_param("s", $cuenta);
    $stmt_verificar->execute();
    $stmt_verificar->bind_result($nombre, $encryptedPassword);
    $stmt_verificar->fetch();
    $stmt_verificar->close();

    $decryptedPassword = openssl_decrypt($encryptedPassword, 'aes-256-cbc', $claveSecreta, 0, $claveSecreta);

    if ($password === $decryptedPassword) {
        echo "Inicio de sesión exitoso. Bienvenido, $nombre!";
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    if(!empty($_POST["remember"])){
        setcookie("cuenta",$_POST["cuenta"],time()+3600);
        setcookie("password",$_POST["password"],time()+3600);
        echo "Cookies Set Successfuly";
    }else{
        setcookie("cuenta","");
        setcookie("password","");
        echo "Cookies Not Set";
    }

    $conn->close();
}
?>






