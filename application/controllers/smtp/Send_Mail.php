<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "rifqimiru@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "rifqimiru@gmail.com";  // SMTP  username
$mail->Password   = "14oktober";  // SMTP password
$mail->SetFrom($from, 'ADMIN SISTEM');//set namanya    dari siapa
$mail->AddReplyTo($from,'ADMIN SISTEM');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
