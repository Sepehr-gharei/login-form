<?php
require "bootstrap/init.php";

$mail->addAddress('sepivarex@gmail.com','VAREX');
$mail->Subject = 'Test Mailtrap mail';
$mail->Body = '<h1>dorod o do sad dorod</h1>';
$mail->send(); 