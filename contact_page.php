<?php
   error_reporting(0);

   /* Check for empty first...*/
   if(empty($_POST['name'])){
      echo 'You left name field blank!';
      exit();
   }

   if(empty($_POST['reciever'])){
      echo 'You left name field blank!';
      exit();
   }

   /* Retrieve form data into PHP variables */
   $name = $_POST['name'];
   $email = $_POST['reciever'];
   $message = $_POST['message'];
   $name = test_input($name);
   $email = test_input($email);
   $message = test_input($message);

   /* Validate e-mail...*/
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      echo 'Invalid email format.';
      exit();
   }

   /* Validate message...*/
   if(strlen($message) < 10){
      echo 'Message must be at least 10 characters long.';
      exit();
   }

   /* Set up and send email to our web server...*/
   $subject = 'Contact Us';
   $recipient = 'ouremail@domain.com'; /* Replace with our own email */
   $msg = sprintf('Retrun address: %s \n\nMessage: %s', $email, $message);
   if(mail($recipient, $subject, $msg)){
      echo 'Mail successfully sent!';
      exit();
   }else{
      echo 'Error sending email.';
      exit();
   }

   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
?>
