<?php
    // check for empty fields 
    if (empty($_POST["username"])) {
        echo "Please enter a username.";
        exit();
    }

    if (empty($_POST["password"])) {
        echo "Please enter a password.";
        exit();
    }

    // put form info into php variables
    $username = $_POST["username"];
    $password = $_POST["password"];

    // open connection to database
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "mydatabase";
 
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT Username, Password FROM ecommerce WHERE Username = '".$username."' AND Password = '".$password."'";
    $result = $mysqli -> query($sql);
    if ($result -> num_rows > 0) {                      // check to see if there any results came back
        while ($row = $result -> fetch_assoc()) {
            // put the username and password from the database into php variables
            $check_username = $row["username"];
            $check_password = $row["password"];
        }
    }

    // close the connection to the database
    $mysqli -> close();

    // check to see if username and password match the ones in the database
    if ($username != $check_username || $password != $check_password) {     
        echo "Invalid username and/or password.";
        exit();
    }

    session_start();
    $_SESSION["username"] = $username;
    header("Location: home_page.html");
?>

