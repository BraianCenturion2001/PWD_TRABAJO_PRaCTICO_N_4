<?php $Titulo = "Cambio de dueño";
include_once("./estructura/cabecera.php") ?>

<div class="card p-2 shadow-lg">
	<div class="p-2 m-auto">
		<h1 class="display-4">Ejercicio 8 del TP4: Cambio de dueño</h1>
	</div>

	<hr>

	<div class="container p-2">
		<h4 class="text-center mb-4"><i class="fa-solid fa-gear"></i> Actualizar DNI de dueño para el vehículo definido por patente:</h4>

		<form name=CambioDuenio id=CambioDuenio method=post action="accionCambioDuenio.php" autocomplete=off novalidate>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=Patente class="form-label">Patente del auto:</label>
					<input class="form-control" name=Patente id=Patente type=text maxlength=7 placeholder="AAA 111">
				</div>
				<div class="form-group col-md-6">
					<label for=DniDuenio class="form-label">DNI del nuevo dueño:</label>
					<input class="form-control" name=DniDuenio id=DniDuenio type=number maxlength=8 placeholder="12345678">
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6">
					<input name=buscar id=buscar type=submit value="Buscar" class="btn btn-info">
				</div>
			</div>
		</form>
	</div>
</div>

<?php include_once("./estructura/pie.php"); ?>