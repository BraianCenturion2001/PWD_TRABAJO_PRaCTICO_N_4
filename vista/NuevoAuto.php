<?php $Titulo = "Nuevo Auto";
include_once("./estructura/cabecera.php") ?>

<div class="card p-2 shadow-lg">
	<div class="p-2 m-auto">
		<h1 class="display-4">Ejercicio 7 del TP4: Nuevo Auto</h1>
	</div>

	<hr>

	<div class="container p-2">
		<h4 class="text-center mb-4"><i class="fas fa-pen mx-2"></i>Ingrese los datos del auto nuevo:</h4>

		<div class="alert alert-info alert-dismissible fade show" role='alert'>
			Verificar que la persona exista primero.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<form name=nuevoAuto id=nuevoAuto method=post action="accionNuevoAuto.php" autocomplete=off novalidate>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=Patente class="form-label">Patente:</label>
					<input class="form-control" name=Patente id=Patente type=text maxlength=7 placeholder="AAA 111">
				</div>
				<div class="form-group col-md-6">
					<label for=Marca class="form-label">Marca:</label>
					<input class="form-control" name=Marca id=Marca type=text>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for=Modelo class="form-label">Modelo:</label>
					<input class="form-control" name=Modelo id=Modelo type=number maxlength=4>
				</div>
				<div class="form-group col-md-6">
					<label for=DniDuenio class="form-label">DNI del dueño:</label>
					<input class="form-control" name=DniDuenio id=DniDuenio type=number maxlength=8 placeholder="12345678">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<input name=cargar id=cargar type=submit value="Cargar auto" class="btn btn-info">
				</div>
			</div>
		</form>
	</div>
</div>

<?php include_once("./estructura/pie.php"); ?>