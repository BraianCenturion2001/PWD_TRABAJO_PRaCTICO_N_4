<?php

// Archivo llamado por ../configuracion.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function data_submitted()
{
    // Función auxiliar para tomar los datos recibidos sin importar el método usado
    $_AAux= array();
    if (!empty($_POST)) {
        $_AAux =$_POST;
    } elseif (!empty($_GET)) {
        $_AAux =$_GET;
    }
    if (count($_AAux)) {
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="") {
                $_AAux[$indice] = 'null';
            }
        }
    }
    return $_AAux;
}

spl_autoload_register(function ($clase) {
    $directorys = array(
        $GLOBALS['ROOT'].'modelo/',
        $GLOBALS['ROOT'].'control/',
    );
    foreach ($directorys as $directory) {
        if (file_exists($directory.$clase.'.php')) {
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

function MsjBody($data, $motivo)
{
    switch ($motivo) {
        case 0:
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
                                    <h3 class='card-subtitle mb-2 text-muted'>Realizada por: {$data['nombre']} {$data['apellido']}</h3>
                                    <h3 class='card-subtitle mb-2 text-muted'>Con mail: {$data['email']}</h3>
                                    <p>{$data['comentario']}</p>
                            </body>
                        </html>
            ";
            break;
        case 1:
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
                                <h3 class='card-subtitle mb-2 text-muted'>{$data['nombre']}: Gracias por enviar tu consulta, la misma sera leida y respondida en breve!</h3>
                                
                        </body>
                    </html>
                ";
            break;
        case 2: {
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
                                <h1 class='card-title bg-success text-white'>Cambio de dueño</h1>
                                <h3 class='card-subtitle mb-2 text-muted'>El auto con patente {$data['Patente']}, fue cambiado de dueño a la persona con dni: {$data['DniDuenio']}</h3>
                                
                        </body>
                    </html>
                ";
        }
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


function EnviarMail($data)
{
    switch($data['motivo']) {
        case 'Consulta':{
            if (mailConsulta($data) && mailAdminConsulta($data)) {
                $exito= true;
            } else {
                $exito= false;
            }
        }
            break;
        case 'CambioDueño':{
            if (mailCambio($data)) {
                $exito = true;
            } else {
                $exito = false;
            }
        }
            break;
    }

    return $exito;
}



function mailAdminConsulta($data)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'autos.phpmailer@gmail.com';
        $mail->Password = 'pcilpoomhtuyoeel';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('Autos.phpmailer@gmail.com', 'Administrador');
        $mail->addAddress('Autos.phpmailer@gmail.com', 'Admin');
        //$mail->addCC('lunalaureanoluna@gmail.com');Autos.phpmailer@gmail.com

        $mail->isHTML(true);
        $mail->Subject = 'Consulta de autos';

        $mail->Body = MsjBody($data, 0);

        $mail->send();
        $exito = true;
    } catch (Exception $e) {
        $exito = false;
    }
    return $exito;
}

function mailConsulta($data)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0;

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
        $mail->Subject = 'Consulta de autos';

        $mail->Body = MsjBody($data, 1);

        $mail->send();
        $exito = true;
    } catch (Exception $e) {
        $exito = false;
    }
    return $exito;
}

function mailCambio($data)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'autos.phpmailer@gmail.com';
        $mail->Password = 'pcilpoomhtuyoeel';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('Autos.phpmailer@gmail.com', 'Administrador');
        $mail->addAddress('jeremiassappia@gmail.com', 'Jere');
        //$mail->addCC('lunalaureanoluna@gmail.com');Autos.phpmailer@gmail.com

        $mail->isHTML(true);
        $mail->Subject = 'Consulta de autos';

        $mail->Body = MsjBody($data, 2);

        $mail->send();
        $exito = true;
    } catch (Exception $e) {
        $exito = false;
    }
    return $exito;
}
