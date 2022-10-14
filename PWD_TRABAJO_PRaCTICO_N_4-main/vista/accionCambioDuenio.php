<?php $Titulo = "Resultado Cambio de Dueño";
require '../utiles/PHPMailer/Exception.php';
require '../utiles/PHPMailer/PHPMailer.php';
require '../utiles/PHPMailer/SMTP.php';

include_once("./estructura/cabecera.php");

// Llama a los objetos con métodos para manejar ABM de personas y de autos:
$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng) && EnviarMail($datosIng)) {
    // Busca si se encuentra la persona según DNI:
    $objPersona = $objAbmPersona->buscar(array("NroDni" => $datosIng['DniDuenio']));

    // Busca si se encuentra el auto según patente:
    $objAuto = $objAbmAuto->buscar(array("Patente" => $datosIng['Patente']));

    // Realiza la operación si se encuentran tanto el auto como la persona en la BD:
    if (!empty($objPersona)) {
        if (!empty($objAuto)) {
            // Realiza la carga del nuevo auto, y muestra el resultado:            

            if ($objAbmAuto->modificacion(array("DniDuenio" => $datosIng['DniDuenio'], "Patente" => $datosIng['Patente']))) { //array("DniDuenio" => $datosIng['DniDuenio']
                $mensaje = "<div class='alert alert-info' role='alert'>
                <i class='fa-solid fa-check'></i> Se registró que ahora "
                    . $objPersona[0]->getNombre() . " " . $objPersona[0]->getApellido()
                    . " es el propietario del " . $objAuto[0]->getMarca() . ".</div>";
            } else {
                $mensaje = "<div class='alert alert-danger' role='alert'>
                <i class='fa-solid fa-xmark'></i> Hubo un error al modificar el dueño del auto.</div>";
            } // Fin if modificacion
        } else {
            $mensaje = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-exclamation'></i> No existe un vehículo registrado con patente "
                . $datosIng['Patente'] . ".</div>";
        } // Fin if empty objAuto
    } else {
        $mensaje = "<div class='alert alert-danger' role='alert'>
        <i class='fa-solid fa-exclamation'></i> No existe una persona registrada con DNI "
            . $datosIng['DniDuenio'] . ".</div>";
    } // Fin if empty objPersona
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-xmark'></i> No se recibieron datos.</div>";
}?>
<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Resultado:</h4>
    </div>
    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="CambioDuenio.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>