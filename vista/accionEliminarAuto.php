<?php $Titulo = "Eliminar Auto";
include_once('./estructura/cabecera.php');

// LLama al objetos con metodos de manejo ABM auto
$objAbmAuto = new AbmAuto();
$datoIng = data_submitted();


if (!empty($datoIng)) {

    $objAuto = $objAbmAuto->buscar(array('Patente' => $datoIng['patente']));

    if (!empty($objAuto)) {
        if ($objAbmAuto->baja(array('Patente' => $datoIng['patente']))) {
            $mensaje = "<div class='alert alert-info' role='alert'>
            <i class='fa-solid fa-trash-check'></i> Se eliminó correctamente el auto con la patente " . $objAuto[0]->getPatente() . "</div>";
        } else {
            $mensaje = "<div class='alert alert-danger' role='alert'>
            <i class='fa-solid fa-trash-can-xmark'></i> Hubo un error al eliminar el auto.</div>";
        }
    } else {
        $mensaje =  "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-trash-clock'></i> No se recibieron datos para la eliminación</div>";
    }
} ?>

<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fas fa-pen mx-2"></i>Remoción del Auto:</h4>
    </div>
    <hr>

    <div class="container p-2" id=ejercicio>
        <?= $mensaje ?>
        <hr>
        <a href="ListaAutos.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>