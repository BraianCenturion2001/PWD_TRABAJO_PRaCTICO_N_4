<?php

$Titulo = 'Comentario';

require '../utiles/PHPMailer/Exception.php';
require '../utiles/PHPMailer/PHPMailer.php';
require '../utiles/PHPMailer/SMTP.php';

include_once('./estructura/cabecera.php');

$datosIng = data_submitted();


if (EnviarMail($datosIng)) {
    echo  "<div class='card shadow-lg p-3 mb-5 bg-white rounded'>
                <div class='card-body text-center'>
                    <h5 class='card-title bg-success text-white'>El mail fue enviado</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>Mensaje de Pueba</h6>
                    <p class='card-text'>Este es el primer mail de prueba fue enviado con <h3><b>Exito</b></h3></p>
                </div>
            </div>";
} else {
    echo "<div class='card shadow-lg p-3 mb-5 bg-white rounded'>
    <div class='card-body text-center'>
        <h5 class='card-title bg-success text-white'>PHPMailer</h5>
        <h6 class='card-subtitle mb-2 text-muted'>Hubo un error al enviar el mail</h6>
        
    </div>
</div>";
}


include_once('./estructura/pie.php');
