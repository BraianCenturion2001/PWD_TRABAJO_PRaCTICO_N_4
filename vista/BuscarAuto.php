<?php $Titulo = "Buscar auto";
include_once("./estructura/cabecera.php") ?>

<div class="card p-2 shadow-lg">
	<div class="p-2 m-auto">
		<h1 class="display-4">Ejercicio 4 del TP4: Buscar auto</h1>
	</div>

	<hr>

	<div class="container p-2">
		<h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Búsqueda del auto:</h4>

		<form name=buscarAuto id=buscarAuto method=post action="accionBuscarAuto.php" autocomplete=off novalidate>
			<div class="form-group row">
				<label for=Patente class="col-md-2 col-form-label font-weight-bold">Patente:</label>
				<div class="col-md-4">
					<input class="form-control" name=Patente id=Patente type=text maxlength=7 placeholder="AAA 111">
				</div>
				<div class="col-md-2">
					<input name=buscar id=buscar type=submit value="Buscar" class="btn btn-info">
				</div>
			</div>
		</form>
	</div>
</div>

<?php include_once("./estructura/pie.php"); ?>