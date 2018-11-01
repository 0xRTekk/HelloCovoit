<?php

include './../db/dbCon.php';

if (isset($_POST["SignUpButton"])) {
    
    $mel = $_POST["SignUpEmail"];
    $pseudo = $_POST["SignUpUsername"];
    $pass = $_POST["SignUpPassword"];
    $passConfirmation = $_POST["SignUpPasswordConfirmation"];
    $nom = $_POST["SignUpLastname"];
    $prenom = $_POST["SignUpFirstname"];
    $tel_mobile = $_POST["SignUpPhone"];
    $sexe = $_POST["SignUpGender"];
    $fumeur = $_POST["SignUpSmoking"];
    $voiture = $_POST["SignUpCar"];
    $moteur = $_POST["SignUpMotor"];
    $annee_naissance = $_POST["SignUpYearBorn"];
    $type = $_POST["SignUpType"];
    $confort = $_POST["SignUpComfort"];
    


    try {
        $req = $db->prepare("INSERT INTO membres (mel, pseudo, pass, nom, prenom, tel_mobile, sexe, fumeur, voiture, moteur, annee_naissance, type, confort) VALUES (:mel, :pseudo, :pass, :nom, :prenom, :tel_mobile, :sexe, :fumeur, :voiture, :moteur, :annee_naissance, :type, :confort)");
        $req->execute(array(
            'mel' => $mel,
            'pseudo' => $pseudo,
            'pass' => $pass,
            'nom' => $nom,
            'prenom' => $prenom,
            'tel_mobile' => $tel_mobile,
            'sexe' => $sexe,
            'fumeur' => $fumeur,
            'voiture' => $voiture,
            'moteur' => $moteur,
            'annee_naissance' => $annee_naissance,
            'type' => $type,
            'confort' => $confort
        ));
        header("Location: ../index.php");
    } catch (Exception $exc) {
        echo "Cannot write on the database : <br/>"
        . $exc->getTraceAsString();
    }
}