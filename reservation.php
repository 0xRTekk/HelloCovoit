<?php

include 'include/header.php';

//Verification si user connecté
if (empty($_SESSION["user"])) {
    header("Location: signIn.php");
}else{
    echo'Reservation effectué. Nous vous enverrons un mail contenant les démarches à suivre pour compléter votre réservation';?><br>
<a href="index.php" >Retour à l'acceuil</a>
<?php
}