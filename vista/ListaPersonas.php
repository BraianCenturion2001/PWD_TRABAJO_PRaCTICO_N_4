<?php $Titulo = "Ver personas";
include_once("./estructura/cabecera.php");
// Llama al objeto con métodos para manejar ABM de personas:
$objAbmPersona = new AbmPersona();
// Procede a buscar todas las personas en la tabla:
$listadoPersonas = $objAbmPersona->buscar(null);
?>

<div class="card p-2 shadow-lg">
	<div class="p-2 m-auto">
		<h1 class="display-4">Ejercicio 5 del TP4: Ver personas</h1>
	</div>

	<hr>

	<div class="container p-3">

		<div class="text-center">
			<h4 class="text-center mb-4"><i class="fas fa-user"></i> Listado de Personas:</h4>

			<a href="NuevaPersona.php" class='btn btn-info mx-2'><i class="fas fa-plus mx-2"></i>Cargar nueva persona</a>
			<a href="BuscarPersona.php" class='btn btn-info mx-2'><i class="fas fa-search mx-2"></i>Buscar persona por DNI</a>
		</div>
		<p></p>


		<table class='table table-striped table-hover table-responsive text-center'>
			<?php

			if (count($listadoPersonas) > 0) {
				// Se arma el encabezado, sabiendo las columnas que tiene la tabla:
				echo "<thead>
			<tr>
			  	<th scope=col>DNI</th>
			  	<th scope=col>Apellido</th>
			  	<th scope=col>Nombre</th>
			  	<th scope=col>Fecha de nacimiento</th>
			  	<th scope=col>Teléfono</th>
			  	<th scope=col>Domicilio</th>
			  	<th scope=col>Autos en propiedad</th>
			</tr>
		</thead>
		<tbody>";
				// Se lista cada fila con los datos:
				foreach ($listadoPersonas as $objersona) {
					echo "<tr>";
					echo "<td>" . $objersona->getNroDni() . "</td>";
					echo "<td>" . $objersona->getApellido() . "</td>";
					echo "<td>" . $objersona->getNombre() . "</td>";
					echo "<td>" . $objersona->getfechaNac() . "</td>";
					echo "<td>" . $objersona->getTelefono() . "</td>";
					echo "<td>" . $objersona->getDomicilio() . "</td>
					<td><a href='autosPersona.php?dni=" . $objersona->getNroDni() . "' class='btn btn-warning btn-sm'>
				<i class='fas fa-eye mx-2'></i>Ver autos</a></td>
		</tr>";
				}
				echo "</tbody>";
			} else {
				echo "<div class='alert alert-info' role='alert'> El listado de autos está vacío. </div>";
			}
			?>
		</table>
	</div>
</div>
<?php include_once("./estructura/pie.php"); ?>