<?php
	require_once("../../config/conexion.php");
	if(isset($_SESSION['usu_id'])){

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>JBCode | Categoria</title>
	<?php require_once("../Html/Head.php") ?>
</head>
<body>
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php require_once("../Html/Header.php") ?>
		
		<?php require_once("../Html/Sidebar.php") ?>
		
		<div id="content" class="content">
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Mantenimiento</a></li>
				<li class="breadcrumb-item active">Categoría</li>
			</ol>
			<h1 class="page-header">Categoría <small></small></h1>
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Mantenimiento de categoría</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<button class="btn btn-primary mb-2" id="btnNuevo">Nuevo registro</button>
                <table id="table_data" class="table table-striped table-bordered table-td-valign-middle">
					<thead>
						<tr>
							<th class="text-nowrap">Nombre</th>
							<th class="text-nowrap">Descripción</th>
							<th width="1%"></th>
							<th width="1%"></th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				</div>
			</div>
		</div>
		
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	
	<?php require_once("mdlMnt.php") ?>
	
	<?php require_once("../Html/modal.php") ?>

	<?php require_once("../Html/Js.php") ?>
    <script src="categoria.js"></script>
</body>
</html>
<?php
	} else {
		header("Location:".Conectar::ruta());
	}
?>