<?php $Titulo = "Ver Autos de Persona";
include_once("./estructura/cabecera.php");
// Llama al objeto con métodos para manejar ABM de autos:
$objAbmAuto = new AbmAuto();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
	// Procede a buscar según el DNI del dueño:
	$paramBuscar = array('DniDuenio' => $datosIng['dni']);
	$autoBuscado = $objAbmAuto->buscar($paramBuscar);
	// Muestra los datos si fue encontrado, sino notifica error:
	if (!empty($autoBuscado)) {
		// Se arma el encabezado, sabiendo las columnas que tiene la tabla:
		$mensaje = "<thead>
			<tr>
			  	<th scope=col>Patente</th>
			  	<th scope=col>Marca</th>
			  	<th scope=col>Modelo</th>
			</tr>
		</thead>
		<tbody>";
		// Se lista cada fila con los datos:
		foreach ($autoBuscado as $objAuto) {
			$mensaje .= "<tr>
			<td>" . $objAuto->getPatente() . "</td>
			<td>" . $objAuto->getMarca() . "</td>
			<td>" . $objAuto->getModelo() . "</td>
			</tr>";
		}
		$mensaje .= "</tbody>";
	} else {
		$mensaje = "<div class='alert alert-warning' role='alert'>No se encontraron vehículos en propiedad del usuario con DNI " . $datosIng['dni'] . "</div>";
	}
} else {
	// Muestra error si no hay datos recibidos:
	$mensaje =  "<div class='alert alert-danger' role='alert'>No se recibió el DNI del usuario para mostrar este listado.</div>";
}
?>
<div class="card p-2 shadow-lg">
	<div class="p-2 m-auto">
		<h1 class="display-4">Ejercicio 5 del TP4: Ver autos de persona</h1>
	</div>
	<hr>

	<div class="container p-2">
		<h4 class="text-center mb-4"><i class="fas fa-car mx-2"></i>Listado de autos según DNI <?= $datosIng['dni'] ?>:</h4>
		<a href="NuevoAuto.php" class='btn btn-info mx-2'><i class="fas fa-plus mx-2"></i>Cargar nuevo auto</a>
		<a href="BuscarAuto.php" class='btn btn-info mx-2'><i class="fas fa-search mx-2"></i>Buscar otro auto por Patente</a>
		<p></p>
		<table class='table table-striped table-hover table-responsive text-center'>
			<?= $mensaje ?>
		</table>
		<a href="ListaPersonas.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
	</div>
</div>

<?php include_once("./estructura/pie.php"); ?>