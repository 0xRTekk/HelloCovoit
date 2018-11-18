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
    $results = $req->fetch();
    
    if ($results > 0) {
        $_SESSION["user"] = $username;
        $_SESSION['email'] = $results['mel'];
        header("Location: ../index.php");
    } else {
        header("Location: ../signIn.php");
    }
}
?>