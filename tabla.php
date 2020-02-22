<?php 

	require_once "clases/conexion.php";

	$obj = new conectar();

	$conexion=$obj->conexion();

	$sql = "SELECT id_juego, nombre, anio, empresa 
		FROM t_juegos";

	$result = mysqli_query($conexion, $sql);

?>

<div>
	<table class="table table-hover table-condensed" id="iddatatable">
		<thead style="background-color: #dc3545; color: white; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Año</td>
				<td>Empresa</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc; color: white; font-weight: bold;">
			<tr>
				<td>Nombre</td>
				<td>Año</td>
				<td>Empresa</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				while ($mostrar = mysqli_fetch_row($result)) {
					
			?>
			<tr>
				<td><?php echo $mostrar[1]; ?></td>
				<td><?php echo $mostrar[2]; ?></td>
				<td><?php echo $mostrar[3]; ?></td>
				<td class="text-center"><span class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editarDatosModal" onclick="agregaFrmActualizar('<?php echo $mostrar[0]; ?>')">
					Editar
				</span></td>
				<td class="text-center"><span class="btn btn-sm btn-danger">
					Eliminar
				</span></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function() {
    	$('#iddatatable').DataTable();
	} );
</script>