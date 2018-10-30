<?php

session_start();

include '../db/dbCon.php';


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

    if ($pass == $passConfirmation && is_numeric($tel_mobile) && [$sexe == "M." || $sexe == "Mme."] && [$fumeur == "Non fumeur" || $fumeur == "Fumeur"] && is_numeric($annee_naissance) && [$type == "Conducteur" || $type == "Passager"] && [$confort == "Basique" || $confort == "Normal" || $confort == "Confortable" || $confort == "Luxe"]) {
        if ($type == "Passager") {
            $voiture = "";
            $moteur = "";
            $confort = "";
        }

        try {
            $con->exec("insert into membres values('$mel','$pseudo','$pass','$nom','$prenom','$tel_mobile','$sexe','$fumeur','$voiture','$moteur','','$annee_naissance','','$type','$confort')");
            header("Location: ../index.php");
        } catch (Exception $exc) {
            echo "Cannot write on the database : <br/>"
            .$exc->getTraceAsString();
        }
    }
}