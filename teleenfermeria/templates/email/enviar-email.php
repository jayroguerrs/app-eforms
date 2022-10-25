<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../assets/vendor/libs/PhpMailer/Exception.php';
require '../../assets/vendor/libs/PhpMailer/PHPMailer.php';
require '../../assets/vendor/libs/PhpMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.acrp.pe';                         //Set the SMTP server to send through
    $mail->SMTPAuth   = true;          
    $mail->Username   = 'julia.sistemas@acrp.pe';               //SMTP username
    $mail->Password   = '3rq59D8$c';                            //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;        //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('julia.sistemas@acrp.pe', 'SIRADE CRP | JULIA');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);   
    $mail->CharSet = 'UTF-8';                               //Set email format to HTML
    $mail->Subject = '[SIRADE] Restablecimiento de contraseña';
    $mail->Body    = $bodyHTLM;
    /*    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */
    $mail->send(); 
    ?>
    <?php
    //header('location: ../login.php');
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>