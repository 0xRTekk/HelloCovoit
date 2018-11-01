<?php
include 'include/header.php';

//Requête pour selectionner l'annonce de l'id spécifié en GET
include 'db/advertSelectId.php';
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title text-center"><?= $advertSelected['nom_ville_depart'] ?>/<?= $advertSelected['nom_ville_arrive'] ?></h5>
    </div>
    <div class="card-body">
        <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $advertSelected['autheur'] ?></h6></a>
        <p class="card-text"><?= $advertSelected['description'] ?></p>
        <a href="index.php" class="btn btn-outline-light card-btn center-block">Retourner voir les annonces</a>
        <a href="reservation.php?id=<?= $advertSelected['id'] ?>" class="btn btn-outline-light card-btn center-block">Réserver ce trajet</a>
    </div>
    <div class="card-footer text-muted">
        <?= $advertSelected['date'] ?>
    </div>
</div>


<?php
include 'include/footer.php';
?>