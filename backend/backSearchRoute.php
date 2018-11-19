<?php

include 'db/dbCon.php';

if (isset($_POST['searchButton'])) {
    extract($_POST);
    $routeTable = "trajet";
    $townTable = "ville";

    try {
        $req = $db->prepare("SELECT * FROM ".$routeTable.", ".$townTable." "
                . "WHERE ville.depart = :searchDeparture "
                . "AND ville.arrivee = :searchArrival "
                . "AND ville.num_trajet = trajet.num_trajet");
        $req->execute(array(
            'searchDeparture' => $searchDeparture,
            'searchArrival' => $searchArrival
        ));

        $searchResults = $req->fetchAll();

    } catch (Exception $ex) {
        die($exc->getTraceAsString());
    }
}