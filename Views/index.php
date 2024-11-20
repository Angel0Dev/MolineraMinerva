<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $data['title']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo BASE_URL . 'Assets/images/icons/favicon.ico'; ?>" />
	<!--===============================================================================================-->
	<link href="<?php echo BASE_URL . 'Assets/js/plugins/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
	<link href="<?php echo BASE_URL . 'Assets/jsplugins/perfectscroll/perfect-scrollbar.css'; ?>" rel="stylesheet">
	<link href="<?php echo BASE_URL . 'Assets/js/plugins/pace/pace.css'; ?>" rel="stylesheet"><!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css'; ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/animate/animate.css'; ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/css-hamburgers/hamburgers.min.css'; ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/select2/select2.min.css'; ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/css/util.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'vendor/css/main.css'; ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo BASE_URL . 'Assets/img/img-01.png'; ?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="formulario" autocomplete="off">
					<span class="login100-form-title">
						Inicio de sesión
					</span>
					<div class="text-center p-t-8">
						<p class="txt1">
							Bienvenido al Sistema de Gestión de Archivos de la Molinera Minerva
						</p>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Se requiere un correo electrónico válido: example@abc.xyz">
						<input class="input100" type="email" name="correo" id="correo" placeholder="Correo electrónico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="La contraseña es requerida">
						<input class="input100" type="password" name="clave" id="clave" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" id="">
							Ingresar
						</button>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Olvidó
						</span>
						<a id="reset" class="txt2" href="#">
							Contraseña?
						</a>
					</div>

					<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Olvidaste tu contraseña</h5>
									<button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="inputReset">Correo</label>
										<input id="inputReset" class="form-control" type="text" name="inputReset" placeholder="Correo electronico">
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary" type="button" id="btnProcesar">Procesar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'Assets/js/plugins/jquery/jquery-3.5.1.min.js'; ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'Assets/js/plugins/bootstrap/js/popper.min.js'; ?>"></script>
	<script src="<?php echo BASE_URL . 'Assets/js/plugins/bootstrap/js/bootstrap.min.js'; ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'vendor/select2/select2.min.js'; ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'vendor/tilt/tilt.jquery.min.js'; ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'Assets/js/sweetalert2@11.js'; ?>"></script>
	<script src="<?php echo BASE_URL . 'Assets/js/main.min.js'; ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'Assets/js/alertas.js'; ?>"></script>
	<script src="<?php echo BASE_URL . 'Assets/js/plugins/pace/pace.min.js'; ?>"></script>

	<script>
		const base_url = '<?php echo BASE_URL; ?>';
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo BASE_URL . 'Assets/js/pages/login.js'; ?>"></script>
	<!--===============================================================================================-->
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
</body>

</html>