<?php $Titulo = "Ver autos";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de autos:
$objAbmAuto = new AbmAuto();
// Procede a buscar todos los autos en la tabla:
$listadoAutos = $objAbmAuto->buscar(null);
?>


<div class="container-sm p-4 text-center">
	<h4 class="mb-4"><i class="fas fa-car mx-2"></i>Listado de Autos:</h4>

	<hr>

	<div class="m-3">
		<a href="NuevoAuto.php" class='btn btn-outline-info mx-2'><i class="fas fa-plus"></i> Cargar nuevo auto</a>
		<a href="BuscarAuto.php" class='btn btn-outline-info mx-2'><i class="fas fa-search"></i> Buscar auto por Patente</a>
		<a href="CambioDuenio.php" class='btn btn-outline-info mx-2'><i class="fas fa-people-arrows"></i> Cambiar dueño de auto</a>
	</div>

	<table class='table table-striped table-hover table-responsive text-center'>
		<?php

		if (count($listadoAutos) > 0) {
			// Se arma el encabezado, sabiendo las columnas que tiene la tabla:
			echo "<thead>
				<tr>
					<th scope=col>Patente</th>
					<th scope=col>Marca</th>
					<th scope=col>Modelo</th>
					<th scope=col>Nombre Dueño</th>
					<th scope=col>Eliminar</th>
				</tr>
			</thead>
			<tbody>";
			// Se lista cada fila con los datos:
			foreach ($listadoAutos as $objAuto) {
				$objDuenio = $objAuto->getObjDuenio();
				echo "<tr>";
				echo "<td>" . $objAuto->getPatente() . "</td>";
				echo "<td>" . $objAuto->getMarca() . "</td>";
				echo "<td>" . $objAuto->getModelo() . "</td>";
				echo "<td>" . $objDuenio->getNombre() . " " . $objDuenio->getApellido() . "</td>";
				echo "<td><a href='accionEliminarAuto.php?patente=" . $objAuto->getPatente() . "' class='btn btn-outline-danger btn-sm'> 
			<i class='fa-solid fa-trash mx-2'></i> </a></td>
			</tr>";
			}
			echo "</tbody>";
		} else {
			echo "<div class='alert alert-info' role='alert'> El listado de autos está vacío. </div>";
		}
		?>
	</table>
</div>
<?php include_once("./estructura/pie.php"); ?>