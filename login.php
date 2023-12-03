<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-... (valor del hash) ..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="css/iniciar_sesion.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h4>Iniciar Sesión</h4>
            <div class="card-body">
                <form id="loginForm" action="login.php" method="post">
                    <div class="form-group">
                        <label for="cuenta">Cuenta:</label>
                        <input type="text" class="form-control" id="cuenta" name="cuenta" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="hidden" id="captcha-hidden" name="capt2" value="">
                    <p><input type="checkbox" name="remember" > Recordar usuario y password</p>
                    <button type="submit" class="btn btn-primary" id="login-btn">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/login.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuenta = $_POST["cuenta"];
    $password = $_POST["password"];
    $captcha = $_POST["capt"];
    $captchaValue = $_POST["capt2"];

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

    if ($password === $decryptedPassword && $captcha === $captchaValue) {
        if(!empty($_POST["remember"])){
            setcookie("cuenta",$_POST["cuenta"],time()+3600);
            setcookie("password",$_POST["password"],time()+3600);
        }else{
            setcookie("cuenta","");
            setcookie("password","");
        }
        echo "<script>Swal.fire('', '¡Iniciando sesión!', 'success')</script>";
        session_start();
        $_SESSION["cuenta"] = $cuenta;
        header("Location: index.php");
    } else {
        echo "<script>Swal.fire('Credenciales incorrectas o captcha inválido')</script>";
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