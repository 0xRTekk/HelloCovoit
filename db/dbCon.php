<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=covoiturage;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "Cannot connect to database :<br/> " . $e->getMessage() . "<br/>" . $e->getTraceAsString() . "<br/>";
}
