<?php $Titulo = "Resultado Actualizar Datos Persona";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de personas:
$objAbmPersona = new AbmPersona();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
    // Realiza la operación y muestra el resultado:
    if ($objAbmPersona->modificacion($datosIng)) {
        $mensaje = "<div class='alert alert-info' role='alert'>
            <i class='fas fa-check-circle mx-2'></i> Se cargaron correctamente los nuevos datos.</div>";
    } else {
        $mensaje = "<div class='alert alert-danger' role='alert'>
            <i class='fas fa-times-circle mx-2'></i> Hubo un error al cargar los nuevos datos.</div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'>No se recibieron datos para realizar la modificación.</div>";
} ?>
<div class="card p-2 shadow">
    <div class="p-2 m-auto">
        <h1 class="display-4">Ejercicio 9 del TP4: Resultado actualizar datos persona</h1>
    </div>

    <hr>

    <div class="container p-2">
        <h4 class="text-center mb-4"><i class="fas fa-pen mx-2"></i>Actualización de datos de la persona:</h4>
        <?= $mensaje ?>
        <hr>
        <a href="BuscarPersona.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>