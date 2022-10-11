<?php $Titulo = "Nueva Persona";
include_once("./estructura/cabecera.php") ?>

<div class="container-sm p-4">
	<div class="container text-center">
		<h4 class="text-center mb-4"><i class="fas fa-pen mx-2"></i>Ingrese los datos de la persona:</h4>
	</div>

	<hr>

	<form name=nuevaPersona id=nuevaPersona method=post action="accionNuevaPersona.php" autocomplete=off novalidate>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for=NroDni class="form-label">Número de DNI:</label>
				<input class="form-control" name=NroDni id=NroDni type=number placeholder="12345678" maxlength=8 <?php if (isset($_GET['dni'])) echo 'value="' . $_GET['dni'] . '"'; ?>>
			</div>
			<div class="form-group col-md-6">
				<label for=Apellido class="form-label">Apellido:</label>
				<input class="form-control" name=Apellido id=Apellido type=text>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for=Nombre class="form-label">Nombre:</label>
				<input class="form-control" name=Nombre id=Nombre type=text>
			</div>
			<div class="form-group col-md-6">
				<label for=fechaNac class="form-label">Fecha de Nacimiento:</label>
				<input class="form-control" name=fechaNac id=fechaNac type=date placeholder="DD/MM/YYYY">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for=Telefono class="form-label">Teléfono:</label>
				<input class="form-control" name=Telefono id=Telefono type=text placeholder="012345678">
			</div>
			<div class="form-group col-md-6">
				<label for=Domicilio class="form-label">Domicilio:</label>
				<input class="form-control" name=Domicilio id=Domicilio type=text>
			</div>
		</div>
		<div class="form-group form-row">
			<div class="col-md-6">
				<input name=cargar id=cargar type=submit value="Cargar persona" class="btn btn-info">
			</div>
		</div>
	</form>
</div>

<?php include_once("./estructura/pie.php"); ?>