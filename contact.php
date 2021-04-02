<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$gittiMesaji = " ";


if (isset($_POST["submit"])) {
	
	require("class.phpmailer.php");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mesaj = $_POST['message'];
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
    $mail->CharSet  ="utf-8";
	$mail->Host = "smtp.gmail.com";
	$mail->Username = "mertckrrr@gmail.com";
	$mail->Password = "Galatasaray63.";
	$mail->FromName ="$name";
	$mail->SetFrom("mertckrrr@gmail.com");
	$mail->AddAddress("mertckrrr@gmail.com");
	$mail->Subject = "SİTE MESAJI -> $name";
	$mail->Body = "$message"; 
	
	if(!$mail->Send()){
		
		echo "Hata: ".$mail->ErrorInfo;
	} else {
		
		$gittiMesaji = "<br><p class='bg-success'>Sayın $name, 
mesajınız gönderildi...</p>";
	}
}

?>
