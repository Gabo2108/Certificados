<?php include 'core/configGeneral.php'; ?>

<?php

$peticionAjax = false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo SERVERURL ?>view/assets/images/icono.png">
    <title>Inicio</title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/feather.css">
	<link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/select2.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/dropzone.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/uppy.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/jquery.steps.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/app-dark.css" id="darkTheme" disabled>
	<script src="<?php echo SERVERURL ?>view/js/jquery.min.js"></script>

<body class="vertical  light">


	<?php
	require_once "./controller/vista.controlador.php";
	$vt = new VistaControlador();
	$vistas = $vt->CtrMostrarVistas();
	if ($vistas == "login" || $vistas == "404") :
		if ($vistas == "login") {
			require_once "./view/content/login-view.php";
			
		} else {
			require_once "./view/content/404-view.php";
		}
	else :
		session_start(["name" => "UIC"]);
		require_once "./controller/login.controlador.php";
		
		$cerrar = new LoginControlador();
		
		include 'modules/navbar.php';
		include 'modules/sidebar.php';
		 ?>
		<!-- Content page-->
		<section class="full-box dashboard-contentPage">
			<!-- NavBar -->
			
			<!-- Content page -->

			<?php require_once $vistas; ?>


		</section>
	<?php endif; ?>

	<!--====== Scripts -->
	<?php include 'modules/scripts.php'; ?>
	
</body>

</html>