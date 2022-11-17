<?php
// (A) PROCESS STATUS
$error = "";

// (B) VERIFY CAPTCHA
$secret = '6LebIHcaAAAAADhFt3hKUrjJ2xRnTaiUZC8sr5rh'; // CHANGE THIS TO YOUR OWN!
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));
if (!$verify->success) { $error = "Invalid captcha"; }

// (C) SEND MAIL
if ($error=="") {
  $mailTo = "uzydrt@gmail.com"; // ! CHANGE THIS TO YOUR OWN !
  $mailSubject = "Contact Form";
  $mailBody = "GOOD";
  foreach ($_POST as $k=>$v) { 
    if ($k!="g-recaptcha-response") { $mailBody .= "$k: $v\r\n"; }
  }
  if (!@mail($mailTo, $mailSubject, $mailBody)) { $error = "Failed to send mail"; }
}