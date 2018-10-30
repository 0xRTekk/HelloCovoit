<?php
session_start();

include_once '../db/dbCon.php';

//Disconnect
if (isset($_GET["Disconnect"]) && !empty($_SESSION['user'])) {
    session_destroy();
    header("Location: ../index.php");
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

        <link rel="stylesheet" href="../style/style.css"/>
    </head>
    <body>

        <nav class="navbar justify-content-between">
            <a class="navbar-brand" href="index.php">BelleTable Co-voit'</a>
            <!--            
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Trouver un co-voit'" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
            -->

            <form class="form-inline my-2 my-lg-0">
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    ?>
                    <a href="UserPage.php" class="btn btn-primary"> User only</a>
                <?php } ?>

                <!-- Show disconnect button if a user session exist -->
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    ?>
                    <a href="home.php?Disconnect" class="btn btn-primary"> Disconnect</a>

                    <!-- Show signin and signup button if no user session exist -->
                    <?php
                } else {
                    ?>
                    <a class="btn btn-primary" href="./SignIn.php">Connexion</a>
                    <a class="btn btn-secondary" href="./SignUp.php">Inscription</a>
                <?php } ?>
            </form>
        </nav>