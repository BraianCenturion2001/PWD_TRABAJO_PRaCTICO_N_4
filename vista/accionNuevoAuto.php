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

    if (!empty($objPersona)) {
        // Realiza la carga del nuevo auto, y muestra el resultado:
        if ($objAbmAuto->alta($datosIng)) {
            $mensaje = "<div class='alert alert-info' role='alert'><i class='fas fa-check-circle mx-2'></i> Se cargó correctamente el auto.</div>";
        } else {
            $mensaje = "<div class='alert alert-danger' role='alert'<i class='fas fa-times-circle mx-2'></i> Hubo un error al cargar el auto.</div>";
        }
    } else {
        $mensaje = "<div class='alert alert-warning' role='alert'><i class='fas fa-question-circle mx-2'></i> No existen datos de la persona con DNI " . $datosIng['DniDuenio']
            . ". <a href='NuevaPersona.php?dni=" . $datosIng['DniDuenio'] . "'> Cargar nueva persona</a></div>";
    }
} else {
    // Muestra error si directamente no hay datos recibidos:
    $mensaje =  "<div class='alert alert-danger' role='alert'><i class='fas fa-times-circle mx-2'></i>No se recibieron datos.</div>";
} ?>
<div class="card p-2 shadow">
    <div class="p-2 m-auto">
        <h1 class="display-4">Ejercicio 7 del TP4: Resultado nuevo auto</h1>
    </div>

    <hr>

    <div class="container p-2">
        <h4 class="text-center mb-4"><i class="fas fa-search mx-2"></i>Resultado:</h4>
        <?= $mensaje ?>
        <hr>
        <a href="NuevoAuto.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php include_once("./estructura/pie.php"); ?>