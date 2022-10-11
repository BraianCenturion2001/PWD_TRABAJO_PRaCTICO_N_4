<?php $Titulo = "Nuevo Auto";
include_once("./estructura/cabecera.php") ?>

<div class="container-sm p-4">
	<div class="container text-center">
		<h4 class="text-center mb-4"><i class="fas fa-pen mx-2"></i>Ingrese los datos del auto nuevo:</h4>
	</div>

	<hr>

	<div class="alert alert-info alert-dismissible fade show" role="alert">
		Verificar que la persona exista primero.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

	<form name=nuevoAuto id=nuevoAuto method=post action="accionNuevoAuto.php" autocomplete=off novalidate class="row g-3">

			<div class="form-group col-md-6">
				<label for=Patente class="form-label">Patente:</label>
				<input class="form-control" name=Patente id=Patente type=text maxlength=7 placeholder="AAA 111">
			</div>
			<div class="form-group col-md-6">
				<label for=Marca class="form-label">Marca:</label>
				<input class="form-control" name=Marca id=Marca type=text>
			</div>

			<div class="form-group col-md-6">
				<label for=Modelo class="form-label">Modelo:</label>
				<input class="form-control" name=Modelo id=Modelo type=number maxlength=4>
			</div>
			<div class="form-group col-md-6">
				<label for=DniDuenio class="form-label">DNI del dueño:</label>
				<input class="form-control" name=DniDuenio id=DniDuenio type=number maxlength=8 placeholder="12345678">
			</div>

			<div class="col-12">
				<input type=submit name=cargar id=cargar value="Cargar Auto" class="btn btn-outline-success">
			</div>
	</form>
</div>

<?php include_once("./estructura/pie.php"); ?>