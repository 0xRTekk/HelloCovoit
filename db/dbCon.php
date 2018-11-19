<?php

//Variables d'environnements. A mettre dans un autre fichier ? 
$hostName = "localhost"; //="mariadb"(nom du container) si utilisation de docker. ="localhost" si utilisation de WAMP
$dbName = "covoiturage";
$mysqlUser = "root";
$mysqlPass ="";

try {
    $db = new PDO('mysql:host='.$hostName.';dbname='.$dbName.';charset=utf8', $mysqlUser, $mysqlPass);
} catch (PDOException $e) {
    echo "Cannot connect to database :<br/> " . $e->getMessage() . "<br/>" . $e->getTraceAsString() . "<br/>";
}
 ?>