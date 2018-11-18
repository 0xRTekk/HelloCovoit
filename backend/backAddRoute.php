<?php
session_start();

include '../db/dbCon.php';

if (isset($_POST['addRouteButton'])) {
    extract($_POST);
    $routeTable = "trajet";

    try {
//        $req = $db->query("CALL InsertAdvert('$asTable', '$departure', '$arrival', '$author', '$asDate', '$description') ");

        $reqAddRoute = $db->prepare("INSERT INTO " . $routeTable . " (mel_chauffeur, depart_ville, arrivee_ville, date, prix, places, precisions, heure_depart, step1, step2, step3) VALUES (:mel_chauffeur, :depart_ville, :arrivee_ville, :date, :prix, :places, :precisions, :heure_depart, :step1, :step2, :step3)");
        $reqAddRoute->execute(array(
            'mel_chauffeur' => $_SESSION['email'],
            'depart_ville' => $departure,
            'arrivee_ville' => $arrival,
            'date' => $date,
            'prix' => $price,
            'places' => $seats,
            'precisions' => $description,
            'heure_depart' => $departureTime,
            'step1' => $step1,
            'step2' => $step2,
            'step3' => $step3
            
        ));
        
        header('Location: ../index.php');
        
    } catch (Exception $ex) {
        echo "Cannot write on the database : <br/>"
        . $exc->getTraceAsString();
    }
}