<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tablas dinamicas con Datatable y PHP</title>
	<?php 
		require_once "scripts.php";
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tablas dinamicas con Datatable y PHP
					</div>
					<div class="card-body">
						<span class="btn btn-primary"><span class="fas fa-plus-circle"></span> Agregar nuevo</span>
						<hr>
						<div id="tablaDatatable">
							
						</div>
					</div>
					<div class="card-footer text-muted">
						@hviveros
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	})
</script>