<?php $Titulo = "Resultado Buscar auto";
include_once("./estructura/cabecera.php");

// Llama al objeto con métodos para manejar ABM de autos:
$objAbmAuto = new AbmAuto();
// Lee los datos recibidos:
$datosIng = data_submitted();

if (!empty($datosIng)) {
    // Procede a buscar según la patente recibida:
    $paramBuscar = array('Patente' => $datosIng['Patente']);
    $autoBuscado = $objAbmAuto->buscar($paramBuscar);
    // Muestra los datos si fue encontrado, sino notifica error:
    if (!empty($autoBuscado)) {
        $objDuenio = $autoBuscado[0]->getObjDuenio();
        $mensaje = "<div class='alert alert-info' role='alert'>
        <h5>Datos del auto:</h5>
        <ul>
            <li><b>Patente:</b> <i>" . $autoBuscado[0]->getPatente() . "</i></li>
            <li><b>Marca:</b> " . $autoBuscado[0]->getMarca() . "</li>
            <li><b>Modelo:</b> " . $autoBuscado[0]->getModelo() . "</li>
            <li><b>Nombre y apellido del dueño:</b> " . $objDuenio->getNombre() . " " . $objDuenio->getApellido() . "</li>
        </ul>
        </div>";
    } else {
        $mensaje = "<div class='alert alert-info' role='alert'><i class='fas fa-times-circle mx-2'></i> No se encontró la patente " . $datosIng['Patente'] . "</div>";
    }
} else {
    // Muestra error si no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'>No se recibieron datos.</div>";
} ?>
<div class="container-sm p-4">
    <div class="container text-center">
        <h4 class="text-center mb-4"><i class="fa-solid fa-pen"></i> Resultado:</h4>
    </div>

    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="BuscarAuto.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>