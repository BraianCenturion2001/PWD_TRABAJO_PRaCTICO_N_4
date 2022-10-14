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
        <i class='fa-solid fa-check'></i> Se cargaron correctamente los nuevos datos.</div>";
    } else {
        $mensaje = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-xmark'></i> Hubo un error al cargar los nuevos datos.</div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'>
    <i class='fa-solid fa-exclamation'></i> No se recibieron datos para realizar la modificación.</div>";
} ?>
<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fa-solid fa-file-pen"></i> Actualización de datos de la persona:</h4>
    </div>

    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="BuscarPersona.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>