<?php

$Name = "Da Duder"; //senders name
$email = "email@adress.com"; //senders e-mail adress
$recipient = "mohitprakash@zoho.com"; //recipient
$mail_body = "The text for the mail..."; //mail body
$subject = "Subject for reviever"; //subject
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields

ini_set('sendmail_from', 'abos@yahoo.com'); //Suggested by "Some Guy"

mail($recipient, $subject, $mail_body, $header); //mail command :)

echo "send"
?>