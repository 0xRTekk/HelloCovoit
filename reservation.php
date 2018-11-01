<?php

include 'include/header.php';

//Verification si user connecté
if (empty($_SESSION["user"])) {
    header("Location: index.php");
}else{
    echo'Reservation effectué. Nous vous enverrons un mail contenant les démarches à suivre pour compléter votre réservation';
}