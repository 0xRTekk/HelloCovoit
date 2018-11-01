<?php

session_start();

include '../db/dbCon.php';


if (isset($_POST["SignInButton"]) && empty($_SESSION['user'])) {
    $username = $_POST["SignInUsername"];
    $password = $_POST["SignInPassword"];
    
    //Vérification de l'existance de l'utilisateur
    $req = $db->prepare("SELECT * FROM membres WHERE pseudo = :username AND pass = :password");
    $req->execute(array(
        'username' => $username,
        'password' => $password,
    ));
    $nbRows = $req->fetchAll();
    
    if ($nbRows > 0) {
        $_SESSION["user"] = $username;
        header("Location: ../index.php");
    } else {
        header("Location: ../SignIn.php");
    }
}
?>