<?php
// Archivo llamado por ../configuracion.php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


function data_submitted() {
    // Función auxiliar para tomar los datos recibidos sin importar el método usado
    $_AAux= array();
    if (!empty($_POST))
        $_AAux =$_POST;
    else if(!empty($_GET)) {
            $_AAux =$_GET;
    }
    if (count($_AAux)){
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="")
                $_AAux[$indice] = 'null';
        }
    }
    return $_AAux;
}

spl_autoload_register(function ($clase) {
    $directorys = array(
        $GLOBALS['ROOT'].'modelo/',
        $GLOBALS['ROOT'].'control/',
    );
    foreach($directorys as $directory){
        if(file_exists($directory.$clase.'.php')){
            require_once($directory.$clase.'.php');
            return;
        }
    }
});

//Funcion que contiene las estructuras del cuerpo de mails, retornado el cuerpo  armado del mail
/**
 * @param $data array
 * @return string
 */

function MsjBody($data){


    switch ($data['motivo']) {
        case 'Consulta':
            $body =
                "
                    <!DOCTYPE html>
                        <html lang='en'>
                            <head>
                            <meta charset='UTF-8'>
                            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <!-- CSS only -->
                                <style>
                                    *{
                                        text-align: center;
                                    }
                                    body{
                                        border-radius: 10px;
                                        border: solid 1px;
                                        padding: 0%;
                                        box-shadow: 5px 5px 15px 5px #000000;
                                    }
                                    h1{
                                        background-color: lightgreen;
                                        padding: 1em;  
                                    }

                                </style>

                                <title>Document</title>
                            </head>

                            <body>
                                    <h1 class='card-title bg-success text-white'>Consulta</h1>
                                    <h3 class='card-subtitle mb-2 text-muted'>{$data['nombre']}</h3>
                                    <p>{$data['comentario']}</p>
                            </body>
                        </html>
            ";
            break;
        case 'Sugerencia':
            $body = "
                <!DOCTYPE html>
                    <html lang='en'>
                        <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <!-- CSS only -->
                            <style>
                                *{
                                    text-align: center;
                                }
                                body{
                                    border-radius: 10px;
                                    border: solid 1px;
                                    padding: 0%;
                                    box-shadow: 5px 5px 15px 5px #000000;
                                }
                                h1{
                                    background-color: lightgreen;
                                    padding: 1em;  
                                }

                            </style>

                            <title>Document</title>
                        </head>

                        <body>
                                <h1 class='card-title bg-success text-white'>Consulta</h1>
                                <h3 class='card-subtitle mb-2 text-muted'>{$data['nombre']}</h3>
                                <p>{$data['comentario']}</p>
                        </body>
                    </html>
                ";
            break;
        default:
            $body = "Hola";
            break;
    }

    return $body;
}

/**
 * Funcion que contiene la estructura para realizar en envio de mail, tomando por parametro los datos del formulario para completar los datos de envio.
 * Retorna un mensaje Envio exitoso o no de ser asi.
 * @param $data array
 * @return string
 */


function EnviarMail($data){

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'autos.phpmailer@gmail.com';
        $mail->Password = 'pcilpoomhtuyoeel';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('Autos.phpmailer@gmail.com', 'Administrador');
        $mail->addAddress($data['email'], $data['nombre']);
        //$mail->addCC('lunalaureanoluna@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Este es un mail de prueba';
        
        $mail->Body = MsjBody($data);

        $mail->send();
        $msj =  " <div class='card shadow-lg p-3 mb-5 bg-white rounded'>
                <div class='card-body text-center'>
                    <h5 class='card-title bg-success text-white'>El mail fue enviado</h5>
                     <h6 class='card-subtitle mb-2 text-muted'>Mensaje de Pueba</h6>
                    <p class='card-text'>Este es el primer mail de prueba fue enviado con <h3><b>Exito</b></h3></p>
                </div>
            </div> ";
    } catch (Exception $e) {

        $msj =
            "
        <div class='card shadow-lg p-3 mb-5 bg-white rounded'>
            <div class='card-body text-center'>
                <h5 class='card-title bg-success text-white'>PHPMailer</h5>
                <h6 class='card-subtitle mb-2 text-muted'>Mensaje de Pueba no se pudo enviar</h6>
                <p class='card-text'>Este es el primer mail de prueba no enviado enviado desde <b>{$mail->ErrorInfo}</b></p>
            </div>
        </div>      
    ";
    }

    return $msj;
}

?>