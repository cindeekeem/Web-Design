<?php
$SenderName = stripslashes($_POST['SenderName']);
$SenderEmail = stripslashes($_POST['SenderEmail']);
$RecipientName = stripslashes($_POST['RecipientName']); 
$RecipientEmail = stripslashes($_POST['RecipientEmail']); 
$Message = stripslashes($_POST['Message']);
$Subject = stripslashes($_POST['Subject']);
$To = "$RecipientName <$RecipientEmail>";
$From = "From: $SenderName <$SenderEmail>";
$StoredMessage = "$From, Recipient: $To, Message: $Message \n";
//This will send the email
mail($To, $Subject, $Message, $From);
// This will append the contents of $Message to webmaildata.txt,
// a text-only database
$fp = fopen("webmaildata.txt", "a");
fwrite($fp, $StoredMessage);
fclose($fp);
?>
<!doctype html>
<html>
<head>
<title>Thank you for sending your email</title>
</head>
<body>
<h1>Your email was sent!</h1>
<p>Here's what you sent:</p>
<p><? echo("$From"); ?></p>
<p><? echo("Recipient: $To"); ?></p>
<p><? echo("Message: $Message"); ?></p>
</body>
</html>