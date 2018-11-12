<?php

include '../db/dbCon.php';

if (isset($_POST['addAdvertButton'])) {
    extract($_POST);
    $asTable = "annonce";

    try {
//        $req = $db->query("CALL InsertAdvert('$asTable', '$departure', '$arrival', '$author', '$asDate', '$description') ");
        $req = $db->prepare("INSERT INTO " . $asTable . " (nom_ville_depart, nom_ville_arrive, autheur, date, description) VALUES (:nom_ville_depart, :nom_ville_arrive, :autheur, :date, :description)");
        $req->execute(array(
            'nom_ville_depart' => $departure,
            'nom_ville_arrive' => $arrival,
            'autheur' => $author,
            'date' => $date,
            'description' => $description
        ));
        header('Location: ../index.php');
        
    } catch (Exception $ex) {
        echo "Cannot write on the database : <br/>"
        . $exc->getTraceAsString();
    }
}