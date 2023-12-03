<!DOCTYPE html>
<html>
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
	<main>
		<section class="regresar">
			<a href="./index.php">
				<i class=" fa-solid fa-arrow-left "></i>
			</a>
		</section>
		<div class="contenedor__todo">
			<div class="caja__trasera">
				<div class="caja__trasera-login">
				</div>

				<div class="caja__trasera-register">
					<h3>¿Aun no tienes cuenta?</h3>
					<p>Registrate para que puedas iniciar sesión</p>
					<button id="btn__registrarse"><a href="registro.php">Registrarse</a></button>
				</div>
			</div>

			<div class="contenedor__login-register">
				<form id="loginForm" action="login.php" method="post" class="formulario__login">
                    <h2>Iniciar Sesion</h2>
                    <label for="cuenta">Cuenta:</label>
                    <input type="text" class="form-control" id="cuenta" name="cuenta" value="<?php if(isset($_COOKIE["cuenta"])){ echo $_COOKIE["cuenta"];} ?>" required>

                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"];} ?>" required>

                    <div class="captcha">
                        <label for="captcha-input">Introduce el captcha</label>
                        <div class="preview"></div>
                        <div class="captcha-form">
                            <input type="text" id="captcha-form" name="capt" placeholder="Introduce el captcha" required>
                            <button class="captcha-refresh"><i class="fa fa-refresh"></i></button>
                        </div>
                    </div>

                    <input type="hidden" id="captcha-hidden" name="capt2" value="">

                    <p><input type="checkbox" name="remember" > Recordar usuario y password</p>
                    <center><button type="submit" class="btn btn-primary" id="login-btn">Iniciar Sesión</button></center>
                </form>

			</div>

		</div>
	</main>
    <script src="https://kit.fontawesome.com/673553f744.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/login.js"></script>
</body>
</html>

<?php
session_start();

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

    $stmt_verificar = $conn->prepare("SELECT nombre, password, Intentos_fallidos, cuenta_habilitada FROM usuarios WHERE cuenta = ?");
    $stmt_verificar->bind_param("s", $cuenta);
    $stmt_verificar->execute();
    $stmt_verificar->bind_result($nombre, $encryptedPassword, $intentosFallidos, $cuentaHabilitada);
    $stmt_verificar->fetch();
    $stmt_verificar->close();

    $decryptedPassword = openssl_decrypt($encryptedPassword, 'aes-256-cbc', $claveSecreta, 0, $claveSecreta);

    if ($cuentaHabilitada && $password === $decryptedPassword && $captcha === $captchaValue) {
        // Restablecer intentos fallidos en caso de inicio de sesión exitoso
        $stmt_reset_intentos = $conn->prepare("UPDATE usuarios SET Intentos_fallidos = 0 WHERE cuenta = ?");
        $stmt_reset_intentos->bind_param("s", $cuenta);
        $stmt_reset_intentos->execute();
        $stmt_reset_intentos->close();

        // Restablecer la cuenta bloqueada
        $stmt_reset_cuenta = $conn->prepare("UPDATE usuarios SET cuenta_habilitada = 1 WHERE cuenta = ?");
        $stmt_reset_cuenta->bind_param("s", $cuenta);
        $stmt_reset_cuenta->execute();
        $stmt_reset_cuenta->close();

        if(!empty($_POST["remember"])){
            setcookie("cuenta",$_POST["cuenta"],time()+3600);
            setcookie("password",$_POST["password"],time()+3600);
        } else {
            setcookie("cuenta","");
            setcookie("password","");
        }

        $_SESSION["cuenta"] = $cuenta;
        echo "<script>
                Swal.fire({
                title: '',
                text: '¡Iniciando sesión!',
                icon: 'success',
                confirmButtonText: 'OK'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
                });
              </script>";
    } else {
        // Incrementar el contador de intentos fallidos
        $intentosFallidos++;

        // Bloquear la cuenta al tercer intento fallido
        if ($intentosFallidos >= 3) {
            $stmt_bloquear_cuenta = $conn->prepare("UPDATE usuarios SET cuenta_habilitada = 0 WHERE cuenta = ?");
            $stmt_bloquear_cuenta->bind_param("s", $cuenta);
            $stmt_bloquear_cuenta->execute();
            $stmt_bloquear_cuenta->close();

            echo "<script>
                    Swal.fire({
                    title: 'Cuenta Bloqueada',
                    text: 'Su cuenta ha sido bloqueada. Puede recuperar su contraseña.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'recuperarpassword.php';
                    }
                    });
                  </script>";
        } else {
            // Actualizar el contador de intentos fallidos
            $stmt_actualizar_intentos = $conn->prepare("UPDATE usuarios SET Intentos_fallidos = ? WHERE cuenta = ?");
            $stmt_actualizar_intentos->bind_param("is", $intentosFallidos, $cuenta);
            $stmt_actualizar_intentos->execute();
            $stmt_actualizar_intentos->close();

            echo "<script>Swal.fire('Credenciales incorrectas o captcha inválido')</script>";
        }
    }

    if(!empty($_POST["remember"])){
        setcookie("cuenta",$_POST["cuenta"],time()+3600);
        setcookie("password",$_POST["password"],time()+3600);
    } else {
        setcookie("cuenta","");
        setcookie("password","");
    }

    $conn->close();
}
?>