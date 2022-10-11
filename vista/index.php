<?php $Titulo = "Inicio Grupo 1";
include_once("./estructura/cabecera.php"); ?>

<div class="container-sm p-4 text-center">
	<div class="row p-2 my-1">
		<div class="col-3">

			<h4><a href="./ListaAutos.php" class="enlaces">Ver autos</a></h4>
			<p class="font-weight-bold text-dark">
				Muestra todos los datos de los autos que se encuentran cargados,
				junto con el nombre y apellido del due&ntilde;o de cada auto.
			</P>
		</div>
		<div class="col-3">

			<h4><a href="./BuscarAuto.php" class="enlaces">Buscar auto</a></h4>
			<p class="font-weight-bold text-dark">
				Muestra los datos referidos al auto con la patente ingresada.
			</P>
		</div>
		<div class="col-3">
			<h4><a href="./ListaPersonas.php" class="enlaces">Listar personas</a></h4>
			<p class="font-weight-bold text-dark">
				Muestra un listado con las personas que est&aacute;n cargadas.
			</P>
		</div>
		<div class="col-3">
			<h4><a href="./NuevaPersona.php" class="enlaces">Nueva persona</a></h4>
			<p class="font-weight-bold text-dark">
				Cargar una nueva persona al sistema.
			</P>
		</div>
		<div class="col-3">
			<h4><a href="./NuevoAuto.php" class="enlaces">Nuevo auto</a></h4>
			<p class="font-weight-bold text-dark">
				Cargar un nuevo auto al sistema.
			</P>
		</div>
		<div class="col-3">
			<h4><a href="./CambioDuenio.php" class="enlaces">Cambiar due&ntilde;o</a></h4>
			<p class="font-weight-bold text-dark">
				Se ingresa el numero de DNI del propietario y patente del auto a cambiar.
			</P>
		</div>
		<div class="col-3">
			<h4><a href="./BuscarPersona.php" class="enlaces">Buscar y actualizar persona</a></h4>
			<p class="font-weight-bold text-dark">
				Ingresa el numero de DNI de la persona a buscar y modificar.
			</P>
		</div>
	</div>
</div>
</div>
<?php include_once("./estructura/pie.php"); ?>