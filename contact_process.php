<?php

    $para = "sociedaddepsicologiaguaymas@gmail.com";
    $de = $_POST['email'];
    $nombre = $_POST['name'];
    $asunto = $_POST['subject']; 
    $mensaje = $_POST['message'];

    $headers = "De: $para";
	$headers = "De: " . $para . "\r\n";
	$headers .= "Responder a: ". $para . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $asunto = "Mensaje de Psicogénesis.";

    $logo = 'img/psicogenesis9.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Correo Express</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Nombre:</strong> {$nombre}</td>";
	$body .= "<td style='border:none;'><strong>Correo electrónico:</strong> {$de}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$asunto}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$mensaje}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($para, $asunto, $body, $headers);

?>