<?php

   // CREATE TABLE ecommerce (
   //     Username VARCHAR(25),
   //     Password VARCHAR(25)
   // );

   // check for empty fields
   if(empty($_POST["username"])) {
      echo "Please enter a username.";
      exit();
   }

   if(empty($_POST["username"])) {
      echo "Please enter a username.";
      exit();
   }

   // put form info into php variables
   $new_username = $_POST["username"];
   $new_password = $_POST["password"];

   // open connection to database
   $servername = "localhost";
   $username = "root";
   $password = "password";
   $dbname = "mydatabase";

   $mysqli = new mysqli($servername, $username, $password, $dbname);

   // Check database for existing username
   $sql = "SELECT Username FROM ecommerce";
   $result = $mysqli -> query($sql);
   if($result -> num_rows > 0){
      while($row = $result -> fetch_assoc()){
         $existing_username = $row["username"];
         if($existing_username == $new_username){
            echo "This username already exists, please choose another username.";
            $mysqli -> close();
            exit();
         }
      }
   }

   // if username does not already exist
   $sql = "INSERT INTO ecommerce(Username, Password)
      VALUES($new_username, $new_password)";

   // close the connection to the database
   $mysqli -> close();
    
   session_start();
   $_SESSION["username"] = $username;
   header("Location: login_page.html");
?>
