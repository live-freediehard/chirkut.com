<?php

require_once('class.phpgmailer.php');
$mail = new PHPGMailer();
$mail->Username = 'temp@gmail.com'; 
$mail->Password = 'password';
$mail->From = 'user@domain.com'; 
$mail->FromName = 'User Name';
$mail->Subject = 'Subject';
$mail->AddAddress('myfriend@domain.com');
$mail->Body = 'Hey buddy, here's an email!';
$mail->Send();

?>

