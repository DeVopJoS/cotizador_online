<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION['usu_id'])){

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>JBCode | Cotización</title>
	<?php require_once("../Html/Head.php") ?>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php require_once("../Html/Header.php") ?>
		
		<?php require_once("../Html/Sidebar.php") ?>
		
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Nueva Contización</li>
			</ol>
			<h1 class="page-header">Nueva Contización <small>Creación y registro de información</small></h1>
			
			<?php require_once('paso1.php') ?>

			<?php require_once('paso2.php') ?>

			<?php require_once('paso3.php') ?>

			<?php require_once('paso4.php') ?>            
            
		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<?php require_once("../Html/modal.php") ?>
	
	<?php require_once("modald.php") ?>

	<?php require_once("../Html/Js.php") ?>
    
    <script src="nueva-cotizacion.js"></script>
</body>
</html>
<?php
	} else {
		header("Location:".Conectar::ruta());
	}
?>