<?php
session_start();

include '../db/dbCon.php';

if (isset($_POST['addRouteButton'])) {
    extract($_POST);
    $routeTable = "trajet";

    try {
//        $req = $db->query("CALL InsertAdvert('$asTable', '$departure', '$arrival', '$author', '$asDate', '$description') ");

        $reqAddRoute = $db->prepare("INSERT INTO " . $routeTable . " (mel_chauffeur, depart_ville, arrivee_ville, date, prix, places, precisions, heure_depart, etape1, etape2) VALUES (:mel_chauffeur, :depart_ville, :arrivee_ville, :date, :prix, :places, :precisions, :heure_depart, :etape1, :etape2)");
        $reqAddRoute->execute(array(
            'mel_chauffeur' => $_SESSION['email'],
            'depart_ville' => $departure,
            'arrivee_ville' => $arrival,
            'date' => $date,
            'prix' => $price,
            'places' => $seats,
            'precisions' => $description,
            'heure_depart' => $departureTime,
            'etape1' => $step1,
            'etape2' => $step2
        ));
        
        header('Location: ../index.php');
        
    } catch (Exception $ex) {
        echo "Cannot write on the database : <br/>"
        . $exc->getTraceAsString();
    }
}