<?php $Titulo = "Resultado Nuevo Auto";
include_once("./estructura/cabecera.php");

// Llama a los objetos con métodos para manejar ABM de personas y de autos:
$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
    // Busca si ya existen los datos del dueño:
    $objPersona = $objAbmPersona->buscar(array("NroDni" => $datosIng['DniDuenio']));
    $objAuto = $objAbmAuto->buscar(array("Patente" => $datosIng['Patente']));


    if (!empty($objPersona)) {
        if (empty($objAuto)) {
            // Realiza la carga del nuevo auto, y muestra el resultado:
            if ($objAbmAuto->alta($datosIng)) {
                $mensaje = "<div class='alert alert-info' role='alert'><i class='fa-solid fa-check'></i> Se cargó correctamente el auto.</div>";
            } else {
                $mensaje = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-xmark'></i> Hubo un error al cargar el auto.</div>";
            }
        }else{
            $mensaje = "<div class='alert alert-warning' role='alert'>
            <i class='fa-solid fa-exclamation'></i>
            Ya esta cargado un vehiculo con la patente ".$datosIng['Patente']."
            <button class='btn btn-outline-success ml-5'>
            <a href='accionBuscarAuto.php?Patente=".$datosIng['Patente']."' style='color:black;'>Ver Auto</a>
            </button>
            </div>";

        }
    } else {
        $mensaje = "<div class='alert alert-warning' role='alert'><i class='fa-solid fa-question'></i></i>  No existen datos de la persona con DNI " . $datosIng['DniDuenio']."</div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'><i class='fas fa-times-circle mx-2'></i>No se recibieron datos.</div>";
} ?>
<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fa-solid fa-pen"></i> Resultado:</h4>
    </div>

    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="NuevoAuto.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>