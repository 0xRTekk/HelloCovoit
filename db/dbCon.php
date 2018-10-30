<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=covoiturage', 'root', 'root');
} catch (PDOException $e) {
    echo "Cannot connect to database :<br/> " . $e->getMessage() . "<br/>" . $e->getTraceAsString() . "<br/>";
}
