<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tablas dinamicas con Datatable y PHP</title>

	<!-- css Bootstrap 5.3.0 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!-- js Bootstrap 5.3.0 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

	<!-- jQuery 3.7.0 -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

	<!-- alertify js && css -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- dataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row py-3">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tablas dinamicas con Datatable y PHP
					</div>
					<div class="card-body">
						<span class="btn btn-primary" id="modalNuevo" data-bs-toggle="modal" data-bs-target="#agregarDatosModal">
							<span class="fas fa-plus-circle"></span> Agregar nuevo</span>
						<hr>
						<div id="tablaDatatable">
							
						</div>
					</div>
					<div class="card-footer text-muted">
						Créditos a <a href="https://www.youtube.com/playlist?list=PLoRfWwOOv4jyR6jOLZY5biv5H0Qguq8Ea" title="Facultad Autodidacta" target="_blank">Facultad Autodidacta</a>
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
				<h5 class="modal-title" id="agregarDatosModalLabel">Agrega nuevos juegos</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregar" class="btn btn-primary">Agregar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editarDatosModal" tabindex="-1" role="dialog" aria-labelledby="editarDatosModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editarDatosModalLabel">Editar juegos</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" id="frmEditar" class="form">
				<div class="modal-body">
					<input type="hidden" id="idjuego" name="idjuego">
					<div class="form-group">
						<label for="nombreU">Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
					</div>
					<div class="form-group">
						<label for="anioU">Anho</label>
						<input type="text" class="form-control input-sm" id="anioU" name="anioU">
					</div>
					<div class="form-group">
						<label for="empresaU">Empresa</label>
						<input type="text" class="form-control input-sm" id="empresaU" name="empresaU">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" id="btnEditar" class="btn btn-warning" >Editar</button>
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
			});
		});

		$('#btnEditar').click(function(){
			datos=$('#frmEditar').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url:  "procesos/editar.php",
				success: function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Editado Ok!");
					} else {
						alertify.error("Fallo al editar");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	})
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idjuego){
		$.ajax({
			type: "POST",
			data: "idjuego=" + idjuego,
			url: "procesos/obtenDatos.php",
			success: function(r){
				datos=jQuery.parseJSON(r);
				$('#idjuego').val(datos['id_juego']);
				$('#nombreU').val(datos['nombre']);
				$('#anioU').val(datos['anio']);
				$('#empresaU').val(datos['empresa']);
			}
		});
	}

	function eliminarDatos(idjuego){
		alertify.confirm('Eliminar juego', 'Seguro que desea eliminar este juego?', function(){ 
			
			$.ajax({
				type: "POST",
				data: "idjuego=" + idjuego,
				url: "procesos/eliminar.php",
				success: function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.info("Eliminado ok!");
					} else {
						alertify.error("Fallo al eliminar");
					}
				}
			});

		}
		, function(){ alertify.error('Cancelar')});

	}
</script>