<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Add reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                    <!-- Add reCAPTCHA widget -->
                    <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Your existing code...

        // Validate reCAPTCHA
        $recaptchaSecretKey = "";
        $recaptchaResponse = $_POST['g-recaptcha-response'];

        $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse";
        $recaptchaData = json_decode(file_get_contents($recaptchaUrl));

        if (!$recaptchaData->success) {
            echo "reCAPTCHA verification failed. Please try again.";
            // You might want to redirect or display an error message.
        } else {
            // Continue with your existing login logic...
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

            $conn->close();
        }
    }
    ?>
</body>
</html>
