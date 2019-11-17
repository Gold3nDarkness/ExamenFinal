<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailHandler{

    public $mail;

    function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    function SendEmail($entity){

        
try {
    //Server settings
    $this->mail->SMTPDebug = 0;                      // Enable verbose debug output
    $this->mail->isSMTP();                                            // Send using SMTP
    $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $this->mail->Username   = 'probandophpmailer123@gmail.com';                     // SMTP username
    $this->mail->Password   = 'estoesunaprueba123';                               // SMTP password
    $this->mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $this->mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $this->mail->setFrom('probandophpmailer123@gmail.com', 'Jose Jorge');
    $this->mail->addAddress($entity->correo);
    // Add a recipient

    // Content
    $this->mail->isHTML(true);                                  // Set email format to HTML
    $this->mail->Subject = 'Activar Cuenta';
    $this->mail->Body    = "Gracias por unirse a esta comunidad. Acepte este link para activar su cuenta. http://localhost/ExamenFinal/administrador/Usuario/activar.php?id=".$entity->user;

    $this->mail->send();
} catch (Exception $e) {
    echo "Hubo un error: {$this->mail->ErrorInfo}";
}

    }

    




}



?>