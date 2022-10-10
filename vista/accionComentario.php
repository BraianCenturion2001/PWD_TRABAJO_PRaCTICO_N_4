<?php
$Titulo = 'Comentario';

require '../utiles/PhPMailer/PHPMailer/Exception.php';
require '../utiles/PhPMailer/PHPMailer/PHPMailer.php';
require '../utiles/PhPMailer/PHPMailer/SMTP.php';

include_once('./estructura/cabecera.php');

$datosIng = data_submitted();


echo EnviarMail($datosIng);


include_once('./estructura/pie.php');

?>