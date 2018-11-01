<?php
session_start();

//Déconnexion
if (isset($_GET["Disconnect"]) && !empty($_SESSION['user'])) {
    session_destroy();
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Belle Table Covoiturage</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        <link rel="stylesheet" href="./style/style.css"/>
    </head>
    <body>

        <nav class="navbar justify-content-between">
            <a class="navbar-brand" href="index.php">BelleTable Co-voit'</a>

            <form class="form-inline my-2 my-lg-0">
                <!-- Affichage bouttons Deco & Compte sur user connécté. Sinon affichage bouttons Connexion & inscription -->
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    ?>
                    <a href="userAccount.php" class="btn btn-primary">Ton compte</a>
                    <a href="index.php?Disconnect" class="btn btn-primary">Déconnexion</a>
                <?php } 
                else { ?>
                    <a class="btn btn-primary" href="signIn.php">Connexion</a>
                    <a class="btn btn-secondary" href="signUp.php">Inscription</a>
                <?php } ?>
            </form>
        </nav>