<?php

$con  = mysqli_connect("localhost","root","","covoiturage");
$count = "select * from membre where pseudo = '$pseudo'";
$resultat =  mysqli_query( $con, $count ) ;

$row = mysqli_fetch_array($resultat, MYSQLI_ASSOC) ;
if ( mysqli_num_rows($resultat) != 0 )
     {
     header("location:inscription.php?erreur=1");
     }

else {
    $req = "insert into membre
    values(null,'$pseudo','$password','$nom','$prenom','$mail','$telmobile','$datenaissance','$sexe','$voiture','$moteur','$type','$confort')";

    echo $req;
    $resultat = mysqli_query($con,$req);
    echo mysqli_error($con);

}