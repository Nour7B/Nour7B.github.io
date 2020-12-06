<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['subject'])   ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Aucun argument Fourni!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'nour.92imene@gmail.com'; 
$email_subject = "contact du site:  $subject";
$email_body = "Vous avez reçu un nouveau message depuis votre formulaire de contact.\n\n"."Voici les détails:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@nour-el-imene.com\n"; 
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>