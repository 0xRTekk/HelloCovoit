<?php
include 'include/header.php';

include 'db/dbCon.php';

//Fichier fait à la dernière minute. Il faut mettre la requete dans un autre fichier
$req = $db->query("SELECT * FROM membres WHERE pseudo = '" . $_SESSION['user'] . "'");
$user = $req->fetch();
?>

<section class = "container login-wrapper">

    <div class = "card login-card">
        <div class = "card-header text-center">
            <h3>Information du compte</h3>
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
            <p>Pseudo : <?= $user['pseudo'] ?></p><br>
            <p>MDP : ***** </p><br>
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
