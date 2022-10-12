<?php $Titulo = "Inicio Grupo 1";
include_once("./estructura/cabecera.php"); ?>

<div class="container-sm p-4 text-center">
	<div class="row p-2 my-1">
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-table"></i></h4>
					<h5 class="card-title"><a href="./ListaAutos.php" class="enlaces">Ver Autos</a></h5>
					<p class="font-weight-bold text-dark">
						Muestra todos los datos de los autos que se encuentran cargados,
						junto con el nombre y apellido del due&ntilde;o de cada auto.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-magnifying-glass-chart"></i></h4>
					<h5 class="card-title"><a href="./BuscarAuto.php" class="enlaces">Buscar Auto</a></h5>
					<p class="font-weight-bold text-dark">Muestra los datos referidos al auto con la patente ingresada.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-car-on"></i></h4>
					<h5><a href="./NuevoAuto.php" class="enlaces">Nuevo Auto</a></h5>
					<p class="font-weight-bold text-dark">
						Cargar un nuevo auto al sistema.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row p-2 my-1">
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-table"></i></h4>
					<h5><a href="./ListaPersonas.php" class="enlaces">Ver Personas</a></h5>
					<p class="font-weight-bold text-dark">
						Muestra un listado con las personas que est&aacute;n cargadas.
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-magnifying-glass-chart"></i></h4>
					<h5><a href="./BuscarPersona.php" class="enlaces">Buscar y Actualizar Persona</a></h5>
					<p class="font-weight-bold text-dark">
						Ingresa el numero de DNI de la persona a buscar y modificar.
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-person-circle-plus"></i></h4>
					<h5><a href="./NuevaPersona.php" class="enlaces">Nueva Persona</a></h5>
					<p class="font-weight-bold text-dark">
						Cargar una nueva persona al sistema.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row p-2 my-1">
		<div class="col-sm-6">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fas fa-people-arrows"></i></h4>
					<h5><a href="./CambioDuenio.php" class="enlaces">Cambiar Due&ntilde;o</a></h5>
					<p class="font-weight-bold text-dark">
						Se ingresa el numero de DNI del propietario y patente del auto a cambiar.
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card bg-secondary bg-gradient bg-opacity-25" style="height: 175px">
				<div class="card-body">
					<h4><i class="fa-solid fa-comments"></i></h4>
					<h5><a href="./Consulta.php" class="enlaces">Realizar una Consulta</a></h5>
					<p class="font-weight-bold text-dark">
						No dude en contactarnos a través de un formulario.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include_once("./estructura/pie.php"); ?>