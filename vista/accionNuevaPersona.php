<?php $Titulo = "Nueva Persona";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de personas:
$objAbmPersona = new AbmPersona();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
    $pers = $objAbmPersona->buscar(array("NroDni" => $datosIng['NroDni']));
    // Realiza la operación y muestra el resultado:
    if (empty($pers)) {
        if ($objAbmPersona->alta($datosIng)) {
            $mensaje = "<div class='alert alert-info' role='alert'><i class='fa-solid fa-check'></i> Se cargó correctamente la persona.</div>";
        } else {
            $mensaje = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-xmark'></i> Hubo un error al cargar la persona.</div>";
        }
    }else{
        $mensaje = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-exclamation'></i> Ya hay una persona cargada con el <b>numero dni ".$datosIng['NroDni']."</b><button class='btn btn-outline-success ml-4'><a href='accionBuscarPersona.php?dni=".$datosIng['NroDni']."' style='color:black'>Ver Persona</a></button></div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'>No se recibieron datos.</div>";
} ?>
<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Resultado:</h4>
    </div>

    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="NuevaPersona.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>