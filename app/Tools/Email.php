<?php
namespace App\Tools;

/**
 * Autor: Luis Gustavo Avila B.
 * Email: gustavoavilabar@hotmail.com
 * Fecha: 2020-05
 * Nombre del sistemas Agrored
 * Mensaje: Tarde o temprano la disciplina vence a la inteligencia
 */

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
  private static function setting($addAddress,
                               $Subject,
                               $msgHTML,
                               $debug = 0,
                               $files = null)
  {
    date_default_timezone_set('America/Bogota');
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->SetLanguage('es','phpmailer/phpmailer/language/');

    //permite modo debug para ver mensajes de las cosas que van ocurriendo
    $mail->SMTPDebug = $debug;


    if(settingEmail('smtp_secure') != 'none')
      $mail->SMTPSecure = settingEmail('smtp_secure');

    $mail->Host = settingEmail('host');
    if(settingEmail('port')) $mail->Port = settingEmail('port');

    //indico un usuario / clave de usuario de gmail
    if(settingEmail('authenticate')) {
      //Debo de hacer autenticación SMTP
      $mail->SMTPAuth = true;
      //indico a la clase que use SMTP
      $mail->IsSMTP();
      $mail->Username = settingEmail('username');
      $mail->Password = settingEmail('password');
    }

    if(!empty(sistema('from'))){
      //$mail->From = sistema('from');
      //$mail->setFrom(sistema('from'), sistema('nombre'));
      $mail->setFrom('gustavoavilabar@gmail.com', sistema('nombre'));
    } else {
      $mail->setFrom('gustavoavilabar@gmail.com', sistema('nombre'));
    }

    //$mail->FromName = sistema('nombre');
    //Set the subject line
    $mail->Subject = sistema('nombre') . ' » ' . $Subject;
    //destinatario

    if($files && is_array($files))  {
      foreach ($files as $file) {
        $mail->AddAttachment($file);
      }
    } else if ($files){
      $mail->AddAttachment($files);
    }


    $arraysend = explode(';', str_replace(' ', ';', str_replace(',', ';', $addAddress)));
    foreach ($arraysend as $address) {
      if (trim($address) != '')
        $mail->AddAddress(trim($address));
    }

    //Replace the plain text body with one created manually
    $mail->isHTML(true);
    $mail->msgHTML($msgHTML);

    return $mail->send();
  }

  public  static  function  send($mensaje = [], $log = 0) {
    $html = view('emails.messages', compact('mensaje'))->render();
    return self::setting($mensaje["para"],
      $mensaje["asunto"],
      $html,
      $log
    );
  }


}