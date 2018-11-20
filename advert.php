<?php
include 'include/header.php';

//Requête pour selectionner l'annonce de l'id spécifié en GET
include 'db/routeSelectId.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title text-center"><?= $advertSelected['depart_ville'] ?>/<?= $advertSelected['arrivee_ville'] ?></h2>
    </div>
    <div class="card-body container">
        <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $advertSelected['mel_chauffeur'] ?></h6></a>
        <p>Départ : <?= $advertSelected['depart_ville'] ?></p>
        <p>Arrivée : <?= $advertSelected['arrivee_ville'] ?></p>
        <p>Etape 1 : <?= $advertSelected['etape1'] ?></p>
        <p>Etape 2 : <?= $advertSelected['etape2'] ?></p>
        <p>Précisions : <?= $advertSelected['precisions'] ?></p>
        <p>Nombre de places : <?= $advertSelected['places'] ?></p>
        <a href="index.php" class="btn btn-outline-light card-btn center-block">Retourner voir les annonces</a>
        <a href="reservation.php?id=<?= $advertSelected['num_trajet'] ?>" class="btn btn-outline-light card-btn center-block">Réserver ce trajet</a>
    </div>
    <div class="card-footer text-muted">
        <?= $advertSelected['date'] ?>
    </div>
</div>


<?php
include 'include/footer.php';
?>