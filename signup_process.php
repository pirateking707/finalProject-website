<?php

    // CREATE TABLE ecommerce (
    //     Username VARCHAR(25),
    //     Password VARCHAR(25)
    // );

    session_start();
    $_SESSION["username"] = $username;
    header("Location: login_page.html");
?>

