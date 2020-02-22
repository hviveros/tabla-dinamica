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
						<span class="btn btn-primary" id="modalNuevo"  data-toggle="modal" data-target="#agregarDatosModal">
							<span class="fas fa-plus-circle"></span> Agregar nuevo</span>
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

<!-- Modal -->
<div class="modal fade" id="agregarDatosModal" tabindex="-1" role="dialog" aria-labelledby="agregarDatosModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="agregarDatosModalLabel">Agrega nuevos juevos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="frmNuevo" class="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
					</div>
					<div class="form-group">
						<label for="anio">Anho</label>
						<input type="text" class="form-control input-sm" id="anio" name="anio">
					</div>
					<div class="form-group">
						<label for="empresa">Empresa</label>
						<input type="text" class="form-control input-sm" id="empresa" name="empresa">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregar" class="btn btn-primary">Agregar</button>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>

<script>
	$(document).ready(function(){
		$('#btnAgregar').click(function(){
			datos=$('#frmNuevo').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url:  "procesos/agregar.php",
				success: function(r){
					if (r==1) {
						$('#frmNuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Agregado Ok!");
					} else {
						alertify.error("Fallo al agregar");
					}
				}
			})
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	})
</script>