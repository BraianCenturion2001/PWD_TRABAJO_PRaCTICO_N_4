<?php $Titulo = "Actualizar Persona";
include_once("./estructura/cabecera.php") ?>

<div class="container-sm p-4">
	<div class="container text-center">
		<h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Búsqueda y modificación de persona:</h4>
	</div>

	<hr>

	<form name=BuscarPersona id=BuscarPersona method=post action="accionBuscarPersona.php" autocomplete=off novalidate>
		<div class="form-group row">
			<label for=dni class="col-md-2 col-form-label font-weight-bold">Número de DNI:</label>
			<div class="col-md-4">
				<input class="form-control" name=dni id=dni type=number maxlength="8" placeholder="12345678">
			</div>
			<div class="col-md-2">
				<input name=buscar id=buscar type=submit value="Buscar" class="btn btn-info">
			</div>
		</div>
	</form>
</div>

<?php include_once("./estructura/pie.php"); ?>