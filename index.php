<?php
	require_once("config/conexion.php");
	if(isset($_POST['enviar']) && $_POST['enviar'] == 'si'){
		require_once("models/Usuario.php");

		$usuario = new Usuario();
		$usuario->login();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JBCode | Inicio de Sesión</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets\css\default\app.min.css" rel="stylesheet">
</head>
<body class="pace-top">
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="fade">
		<div class="login login-with-news-feed">
			<div class="news-feed">
				<div class="news-image" style="background-image: url(assets/img/login-bg/login-bg-11.jpeg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>Color</b> Admin App</h4>
					<p>
						Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					</p>
				</div>
			</div>
			<div class="right-content">
				<div class="login-header">
					<div class="brand">
						<span class="logo"></span> <b>Sistema</b> de Cotizaciones
						<small>Introduce tus credenciales de acceso</small>
					</div>
					
				</div>
				<div class="login-content">
					<form action="" method="POST" class="margin-bottom-0">
						<div class="form-group m-b-15">
							<input type="text" class="form-control form-control-lg" id="usu_correo" name="usu_correo" placeholder="Correo Electrónico" required="">
						</div>
						<div class="form-group m-b-15">
							<input type="password" class="form-control form-control-lg" id="usu_pass" name="usu_pass" placeholder="Contraseña" required="">
						</div>
						<div class="checkbox checkbox-css m-b-30">
							<input type="checkbox" id="remember_me_checkbox" value="">
							<label for="remember_me_checkbox">
							Recordarme
							</label>
						</div>
						<div class="login-buttons">
                            <input type="hidden" name="enviar" value="si">
							<button type="submit" class="btn btn-success btn-block btn-lg">Iniciar Sesión</button>
						</div>
						<div class="m-t-20 m-b-40 p-b-40 text-inverse">
							No estas registrado aún? Click <a href="register_v3.html">aqui</a> para registrarte.
						</div>
						<hr>
						<p class="text-center text-grey-darker mb-0">
							&copy; JBCode todos los derechos reservados 2025
						</p>
					</form>
				</div>
			</div>
		</div>

		
	</div>
	
	<script src="assets\js\app.min.js"></script>
	<script src="assets\js\theme\default.min.js"></script>
<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53034621-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>
