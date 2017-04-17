<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['company'])) && (strlen(trim($_POST['company'])) > 0)) {
  $company = stripslashes(strip_tags($_POST['company']));
} else {$company = 'No company entered';}
if ((isset($_POST['phone'])) && (strlen(trim($_POST['phone'])) > 0)) {
	$phone = stripslashes(strip_tags($_POST['phone']));
} else {$phone = 'No phone entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
  $message = nl2br($_POST['message']);
} else {$message = 'No message entered';}

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Chicago');

require_once('class.phpmailer.php');
include("class.smtp.php");

$mail             = new PHPMailer();

$body = "<body><h2 style='font-size:14px;'>From:</h2><p style='font-size:13px;'>".$name."<br />".$company."<br />".$email."<br />".$phone."</p>"."<h2 style='font-size:14px;'>Message:</h2><div style='font-size:13px;'>".$message."</div></body>";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.ryanplesko.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "ryan@ryanplesko.com";  // GMAIL username
$mail->Password   = "Upw@rd&0nw@rD";            // GMAIL password

$mail->SetFrom($email, $name);

// $mail->AddReplyTo("$email","$name");

$mail->Subject    = "Inquiry Via Web Form";

$mail->MsgHTML($body);

$mail->AddAddress("ryan@ryanplesko.com", "Ryan Plesko");

if(!$mail->Send()) {
  return false;
} else {
  return true;
}
?>
