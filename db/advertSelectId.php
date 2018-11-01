<?php

include 'dbCon.php';

try {
    $req = $db->query('SELECT * FROM annonce WHERE id = '.$_GET['id']);
    $advertSelected = $req->fetch();
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>