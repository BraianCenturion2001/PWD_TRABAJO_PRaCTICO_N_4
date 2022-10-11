<?php $Titulo = "Formulario Actualizar Datos Persona";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de autos:
$objAbmPersona = new AbmPersona();
?>
<div class="container-sm p-4">
	<div class="container text-center">
		<h4 class="text-center mb-4"><i class="fa-solid fa-file-pen"></i> Actualizar los datos de la persona:</h4>
	</div>

	<hr>

	<div class="container p-2">
		<?php
		// Lee los datos recibidos:
		$datosIng = data_submitted();
		if (!empty($datosIng)) {
			// Busca si se encuentra la persona según DNI:
			$objPersona = $objAbmPersona->buscar(array("NroDni" => $datosIng['dni']));

			if (!empty($objPersona)) {
				// Muestra el formulario con los datos de la BD para modificarlos:
				echo "<form name=ActualizarPersona id=ActualizarPersona method=post action=ActualizarDatosPersona.php autocomplete=off novalidate>
			<div class='form-group row'>
				<label for=NroDni class='col-md-2 col-form-label'>Número de DNI:</label> 
				<div class='col-md-4'>
					<input class=form-control name=NroDni id=NroDni type=number maxlength=10 value='" . $objPersona[0]->getNroDni() . "' readonly>
				</div>
			</div>
			<div class='form-group row'>
				<label for=Apellido class='col-md-2 col-form-label'>Apellido:</label> 
				<div class=col-md-4>
					<input class=form-control name=Apellido id=Apellido type=text value='" . $objPersona[0]->getApellido() . "'>
				</div>
			</div>
			<div class='form-group row'>
				<label for=Nombre class='col-md-2 col-form-label'>Nombre:</label> 
				<div class=col-md-4>
					<input class=form-control name=Nombre id=Nombre type=text value='" . $objPersona[0]->getNombre() . "'>
				</div>
			</div>
			<div class='form-group row'>
				<label for=fechaNac class='col-md-2 col-form-label'>Fecha de Nacimiento:</label>
				<div class=col-md-4>
					<input class=form-control name=fechaNac id=fechaNac type=date placeholder='DD/MM/YYYY' value='" . $objPersona[0]->getfechaNac() . "'>
				</div>
			</div>
			<div class='form-group row'>
				<label for=Telefono class='col-md-2 col-form-label'>Teléfono:</label> 
				<div class=col-md-4>
					<input class=form-control name=Telefono id=Telefono type=text placeholder='2991115555' value='" . $objPersona[0]->getTelefono() . "'>
				</div>
			</div>
			<div class='form-group row'>
				<label for=Domicilio class='col-md-2 col-form-label'>Domicilio:</label> 
				<div class=col-md-4>
					<input class=form-control name=Domicilio id=Domicilio type=text value='" . $objPersona[0]->getDomicilio() . "'>
				</div>
			</div>
			<div class='form-group row'>
				<label for=cargar class='col-md-2 col-form-label'></label> 
				<div class=col-md-4>
					<input type=submit value='Actualizar datos' class='btn btn-info'>
				</div>
			</div>
		</form>";
			} else {
				echo "<div class='alert alert-info' role='alert'><i class='fas fa-times-circle mx-2'></i> No se encontró la persona con DNI " . $datosIng['dni'] . ".</div>";
			}
		} else {
			// Muestra error si no hay datos recibidos:
			echo "<div class='alert alert-danger' role='alert'>No se recibieron datos para realizar la búsqueda.</div>";
		}
		?>
		<hr>
		<a href="BuscarPersona.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
	</div>
</div>

<?php include_once("./estructura/pie.php"); ?>