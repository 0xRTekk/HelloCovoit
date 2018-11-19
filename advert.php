<?php
include 'include/header.php';

//Requête pour selectionner l'annonce de l'id spécifié en GET
include 'db/routeSelectId.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title text-center"><?= $advertSelected['depart_ville'] ?>/<?= $advertSelected['arrivee_ville'] ?></h2>
    </div>
    <div class="card-body">
        <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $advertSelected['mel_chauffeur'] ?></h6></a>
        <p class="card-text">
            Précisions : <?= $advertSelected['precisions'] ?><br>
            Etape 1 : <?= $advertSelected['etape1'] ?><br>
            Etape 2 : <?= $advertSelected['etape2'] ?><br>
        </p>

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