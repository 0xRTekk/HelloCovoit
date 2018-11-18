<?php

//Variables d'environnements. A mettre dans un autre fichier ?
$table1 = "membres";
$field1 = "mel";
$table2 = "trajet";
$field2 = "mel_chauffeur";

include 'dbCon.php';

try {
    $reqPseudo = $db->query("SELECT pseudo FROM ".$table1." INNER JOIN ".$table2." ON ".$table1.".".$field1." = ".$table2.".".$field2."");
    $pseudoSelected = $reqPseudo->fetch();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
?>