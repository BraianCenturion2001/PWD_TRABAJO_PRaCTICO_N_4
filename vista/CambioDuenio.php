<?php $Titulo = "Cambio de dueño";
include_once("./estructura/cabecera.php") ?>

<div class="container-sm p-4">
	<div class="container text-center">
		<h4 class="text-center mb-4"><i class="fas fa-people-arrows"></i> Actualizar DNI de dueño para el vehículo definido por patente:</h4>
	</div>

	<hr>

	<form name=CambioDuenio id=CambioDuenio method=post action="accionCambioDuenio.php" autocomplete=off novalidate class="row g-3">
		<div class="form-group col-md-6">
			<label for=Patente class="form-label">Patente del auto:</label>
			<input class="form-control" name=Patente id=Patente type=text maxlength=7 placeholder="AAA 111">
		</div>
		<div class="form-group col-md-6">
			<label for=DniDuenio class="form-label">DNI del nuevo dueño:</label>
			<input class="form-control" name=DniDuenio id=DniDuenio type=number maxlength=8 placeholder="12345678">
		</div>
		<div class="col-md-6">
			<input name=buscar id=buscar type=submit value="Buscar" class="btn btn-outline-info">
		</div>
	</form>

</div>

<?php include_once("./estructura/pie.php"); ?>