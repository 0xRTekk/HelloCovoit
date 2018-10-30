<?php

session_start();

include '../db/dbCon.php';


if (isset($_POST["SignInButton"]) && empty($_SESSION['user'])) {
    $username = $_POST["SignInUsername"];
    $password = $_POST["SignInPassword"];
    
    //Vérification de l'existance de l'utilisateur
    $req = "select * from membres where pseudo = '$username' and pass ='$password'";
    $result = mysqli_query($con, $req);
    $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["user"] = $username;
        header("Location: ../index.php");
    } else {
        header("Location: ../SignIn.php");
    }
}
?>