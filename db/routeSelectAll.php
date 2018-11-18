<?php

//Variables d'environnements. A mettre dans un autre fichier ?
$asTable = "trajet";
$asCols = '*';
$asColWhere ="";
$asValeurs ="";

include 'dbCon.php';

try {
    $req = $db->query("CALL selectDynam('$asTable', '$asCols', '$asColWhere', '$asValeurs') ");
    $adverts = $req->fetchAll();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>
