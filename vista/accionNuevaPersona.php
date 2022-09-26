<?php $Titulo = "Nueva Persona";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de personas:
$objAbmPersona = new AbmPersona();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
    // Realiza la operación y muestra el resultado:
    if ($objAbmPersona->alta($datosIng)) {
        $mensaje = "<div class='alert alert-info' role='alert'><i class='fas fa-check-circle mx-2'></i> Se cargó correctamente la persona.</div>";
    } else {
        $mensaje = "<div class='alert alert-danger' role='alert'><i class='fas fa-times-circle mx-2'></i> Hubo un error al cargar la persona.</div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'>No se recibieron datos.</div>";
} ?>
<div class="card p-2 shadow">
    <div class="p-2 m-auto">
        <h1 class="display-4">Ejercicio 6 del TP4: Resultado nueva persona</h1>
    </div>

    <hr>

    <div class="container p-2">
        <h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Resultado:</h4>
        <?= $mensaje ?>
        <hr>
        <a href="NuevaPersona.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>