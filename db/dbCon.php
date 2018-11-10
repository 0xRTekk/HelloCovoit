<?php

//Variables d'environnements. A mettre dans un autre fichier ?
$hostName = "localhost";
$dbName = "covoiturage";
$mysqlUser = "root";
$mysqlPass ="";

try {
    $db = new PDO('mysql:host='.$hostName.';dbname='.$dbName.';charset=utf8', $mysqlUser, $mysqlPass);
} catch (PDOException $e) {
    echo "Cannot connect to database :<br/> " . $e->getMessage() . "<br/>" . $e->getTraceAsString() . "<br/>";
}
 ?>