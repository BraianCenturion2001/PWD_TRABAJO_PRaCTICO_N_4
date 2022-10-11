<?php

$Titulo = 'Comentario';

require '../utiles/PHPMailer/Exception.php';
require '../utiles/PHPMailer/PHPMailer.php';
require '../utiles/PHPMailer/SMTP.php';

include_once('./estructura/cabecera.php');

$datosIng = data_submitted();


if (EnviarMail($datosIng)) {
    $mensaje = "<div class='alert alert-info' role='alert'><i class='fa-solid fa-check'></i> Su consulta fue enviada con éxito</div>";
} else {
    $mensaje = "<div class='alert alert-danger' role='alert'><i class='fa-solid fa-xmark'></i> Hubo un error al cargar su consulta</div>";

}
?>

<div class="container-sm p-4">
    <div class="container text-center">
        <h4><i class="fa-solid fa-clipboard-question"></i> Consultas</h4>
    </div>
    <hr>

    <div class="container p-2">
        <?= $mensaje ?>
        <hr>
        <a href="Consulta.php" class="btn btn-outline-dark"><i class="fas fa-arrow-left mx-2"></i>Volver a la página anterior.</a>
    </div>
</div>

<?php
include_once('./estructura/pie.php');
?>