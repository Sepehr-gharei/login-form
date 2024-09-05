<?php
use PHPMailer\PHPMailer\PHPMailer;
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '42df2c913626a2';
$mail->Password = '11606043787f64';
$mail->setFrom('sepehr@ghare.com' , 'Sepehr GH arei');
$mail->isHTML(true);

