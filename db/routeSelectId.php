<?php

//Variables d'environnements. A mettre dans un autre fichier ?
$asTable = "trajet";
$asCols = '*';
$asColWhere = "num_trajet";
$asValeurs = $_GET['id'];

include 'dbCon.php';

try {
    $req = $db->query("CALL selectDynam('$asTable', '$asCols', '$asColWhere', '$asValeurs') ");
    $advertSelected = $req->fetch();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
?>