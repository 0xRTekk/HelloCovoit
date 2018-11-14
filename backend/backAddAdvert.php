<?php

include '../db/dbCon.php';

if (isset($_POST['addAdvertButton'])) {
    extract($_POST);
    $addvertTable = "annonce";
    $routeTable = "trajet";

    try {
//        $req = $db->query("CALL InsertAdvert('$asTable', '$departure', '$arrival', '$author', '$asDate', '$description') ");
        $reqAddAdvert = $db->prepare("INSERT INTO " . $addvertTable . " (nom_ville_depart, nom_ville_arrive, autheur, date, description) VALUES (:nom_ville_depart, :nom_ville_arrive, :autheur, :date, :description)");
        $reqAddAdvert->execute(array(
            'nom_ville_depart' => $departure,
            'nom_ville_arrive' => $arrival,
            'autheur' => $author,
            'date' => $date,
            'description' => $description
        ));
        
        $reqAddRoute = $db->prepare("INSERT INTO " . $routeTable . " (depart_ville, arrivee_ville, date, prix, places, precisions, heure_depart) VALUES (:depart_ville, :arrivee_ville, :date, :prix, :places, :precisions, :heure_depart)");
        $reqAddRoute->execute(array(
            'depart_ville' => $departure,
            'arrivee_ville' => $arrival,
            'date' => $date,
            'prix' => $price,
            'places' => $seats,
            'precisions' => $description,
            'heure_depart' => $departureTime
        ));
        
        header('Location: ../index.php');
        
    } catch (Exception $ex) {
        echo "Cannot write on the database : <br/>"
        . $exc->getTraceAsString();
    }
}