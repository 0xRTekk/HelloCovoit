<?php

try {
    $req = $db->query('SELECT * FROM annonce');
    $adverts = $req->fetchAll();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}


?>
