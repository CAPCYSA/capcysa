<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
//Create a new PHPMailer instance
$nombre = $_POST['name'];
$correo = $_POST['email'];
$mensaje = $_POST['message']; 
$carta = "Servicio de Consultas de CAPCYSA <br>";
$carta .= "De: " . $nombre . " <br>";
$carta .= "Correo: " . $correo ." <br>";
$carta .= "mensaje: " . $mensaje;
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "capcysa@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "#Logeado12";
//Set who the message is to be sent from
$mail->setFrom('capcysa@gmail.com', 'CAPCYSA PAGE');
//Set an alternative reply-to address
//Set who the message is to be sent to
$mail->addAddress('capcysa@gmail.com');
//Set the subject line
$mail->Subject = 'Servicio de Consulta de CAPCYSA DE RL';
//Replace the plain text body with one created manually
$mail->AltBody = $carta;
$mail->Body = $carta;
header('Location: message-send.html');
//send the message, check for errors
/**if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}*/

?>
