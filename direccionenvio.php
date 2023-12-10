<?php session_start(); 
require 'header.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Dirección de envio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
  body{
    padding-top: 90px;
  }
</style>
</head>

<body>
    
		<div class="col-md-4 container bg-default">
			
			<h4 class="my-4">
					Direccion de envio
			</h4>
			<form>
				<div class="form-row">
					<div class="col-md-6 form-group">
						<label for="firstname">Nombre</label>
						<input type="text" class="form-control" id="firstname" placeholder="Nombre">
						<div class="invalid-feedback">
							El nombre es requerido.
						</div>
					</div>

					<div class="col-md-6 form-group">
						<label for="lastname">Apellido</label>
						<input type="text" class="form-control" id="lastname" placeholder="Apellido">
						<div class="invalid-feedback">
							El apellido es requerido
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="username">Usuario</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>	
							<input type="text" class="form-control" id="username" placeholder="Usuario" required>
							<div class="invalid-feedback">
								El usuario es requerido.
							</div>
						</div>
				</div>

				<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com" required>
				</div>

				<div class="form-group">
					<label for="adress">Dirección</label>
					<input type="text" class="form-control" id="adress" placeholder="123, Juan Escutia" required>
					<div class="invalid-feedback">
						Ingresa tu dirección de envio.
					</div>
				</div>

				<div class="form-group">
					<label for="address2">Dirección 2
						<span class="text-muted">(Opcional)</span>
					</label>
					<input type="text" class="form-control" id="adress2" placeholder="123, Juan Barragan">
				</div>

				<div class="row">
            <div class="col-md-4 form-group">
                <label for="Pais">País</label>
                <select type="text" class="form-control" id="Pais">
                    <option value>Selecciona...</option>
                    <option>México</option>
                    <option>Estados Unidos</option>
                </select>
                <div class="invalid-feedback">
                    Selecciona un país válido.
                </div>
            </div>

            <div class="col-md-4 form-group">
                <label for="Ciudad">Ciudad</label>
                <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad" required>
                <div class="invalid-feedback">
                    Ingresa una ciudad válida.
                </div>
            </div>
            
            <div class="col-md-4 form-group">
                <label for="CodigoPostal">Código Postal</label>
                <input type="text" class="form-control" id="CodigoPostal" placeholder="Código postal" required>
                <div class="invalid-feedback">
                    Ingresa un código postal válido.
                </div>
            </div>
        </div>

				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="shipping-adress"> 
            La dirección de envío es la misma que mi dirección de facturación.
					<label for="shipping-adress" class="form-check-label"></label>
				</div>

				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="same-adress">
						Guardar información para futuras compras.
					<label for="same-adress" class="form-check-label"></label>					
					</div>
          <br>
					<button id="btnContinuarPago" class="btn btn-danger bt-lg btn-block" type="submit">Continuar al método de pago</button>

			</form>
		</div>
    <script>
      document.getElementById("btnContinuarPago").addEventListener("click", function(event) {
        // Validar campos del formulario
        if (!validarFormulario()) {
          event.preventDefault(); 
          return;
        }
        var nuevaPagina = "datoscompra.php";
        window.location.href = nuevaPagina;
      });

      function validarFormulario() {
        var nombre = document.getElementById("firstname").value;
        var apellido = document.getElementById("lastname").value;
        var usuario = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var direccion = document.getElementById("adress").value;
        if (nombre === "" || apellido === "" || usuario === "" || email === "" || direccion === "") {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, completa todos los campos obligatorios.'
          });
          return false;
        }
        return true;
      }
    </script>
  
</body>
</html>

<?php include 'footer.php'; ?>