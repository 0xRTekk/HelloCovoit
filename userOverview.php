<?php
session_start();

//Fichier fait à la dernière minute. Il faut mettre la requete dans un autre fichier

include 'db/dbCon.php';

$req = $db->query("SELECT * FROM membres WHERE mel = '" . $_GET['mel'] . "'");
$user = $req->fetch();

include 'include/header.php';
?>

<section class = "container login-wrapper">

    <div class = "card login-card">
        <div class = "card-header text-center">
            <h3>Information sur le conducteur</h3>
        </div>
        <div class="card-body">

            <img src="<?= $user['photo'] ?>">
            <p>Sexe : <?= $user['sexe'] ?></p><br>
            <p>Nom : <?= $user['nom'] ?></p><br>
            <p>Prenom : <?= $user['prenom'] ?></p><br>
            <p>Année de naissance : <?= $user['annee_naissance'] ?></p><br>
            <p>Email : <?= $user['mel'] ?></p><br>
            <p>Telephone : <?= $user['tel_mobile'] ?></p><br>
            <p>Conducteur / Passager : <?= $user['type'] ?></p><br>
            <hr>
            <p>Véhicule : <?= $user['voiture'] ?></p><br>
            <p>Moteur : <?= $user['moteur'] ?></p><br>
            <p>Confort du véhicule : <?= $user['confort'] ?></p><br>
            <p>Fumeur / Non-fumeur : <?= $user['fumeur'] ?></p><br>

        </div>
    </div>
</section>

<?php
include 'include/footer.php';
