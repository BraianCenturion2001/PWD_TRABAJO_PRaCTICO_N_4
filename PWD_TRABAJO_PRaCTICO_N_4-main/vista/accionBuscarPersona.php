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
				echo "<form name=ActualizarPersona id=ActualizarPersona method=post action=ActualizarDatosPersona.php class='row g-3' autocomplete=off novalidate>
			
					<div class='form-group col-md-6'>
						<label for=NroDni class='form-label'>Número de DNI:</label> 
						<input class='form-control border-danger' name=NroDni id=NroDni type=number maxlength=10 value='" . $objPersona[0]->getNroDni() . "' readonly>
					</div>
					<div class='form-group col-md-6'>
						<label for=Apellido class='form-label'>Apellido:</label> 
						<input class=form-control name=Apellido id=Apellido type=text value='" . $objPersona[0]->getApellido() . "'>
					</div>
					<div class='form-group col-md-6'>
						<label for=Nombre class='form-label'>Nombre:</label> 
						<input class=form-control name=Nombre id=Nombre type=text value='" . $objPersona[0]->getNombre() . "'>
					</div>
					<div class='form-group col-md-6'>
						<label for=fechaNac class='form-label'>Fecha de Nacimiento:</label>
						<input class=form-control name=fechaNac id=fechaNac type=date placeholder='DD/MM/YYYY' value='" . $objPersona[0]->getfechaNac() . "'>
					</div>
					<div class='form-group col-md-6'>
						<label for=Telefono class='form-label'>Teléfono:</label> 
						<input class=form-control name=Telefono id=Telefono type=text placeholder='2991115555' value='" . $objPersona[0]->getTelefono() . "'>
					</div>
					<div class='form-group col-md-6'>
						<label for=Domicilio class='form-label'>Domicilio:</label> 
						<input class=form-control name=Domicilio id=Domicilio type=text value='" . $objPersona[0]->getDomicilio() . "'>
					</div> 
					<div class='form-group col-md-6'>
						<input type=submit value='Actualizar datos' class='btn btn-outline-success'>
					</div>
				</form>";
			} else {
				echo "<div class='alert alert-info' role='alert'><i class='fa-solid fa-question'></i> No se encontró la persona con DNI " . $datosIng['dni'] . ".</div>";
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