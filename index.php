<?php
include './include/header.php';
?>



<!-- Page content  -->
<header class="container-fluid">            
    <h1 class="text-center">Liste des co-voiturages</h1>
    <hr class="">
</header>

<section class="container content-wrapper">
    <a href="addAdvert.php"><button type="button" class="btn btn-lg btn-outline-light btn-block">Proposer un co-voit'</button></a>

    <?php
    include 'db/advertSelectAll.php';

    foreach ($adverts as $advert) {
        ?>

        <div class="card advert-card">
            <div class="card-header">
                <h5 class="card-title text-center"><?= $advert['nom_ville_depart'] ?>/<?= $advert['nom_ville_arrive'] ?></h5>
            </div>
            <div class="card-body">
                <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $advert['autheur'] ?></h6></a>
                <p class="card-text"><?= $advert['description'] ?></p>
                <a href="advert.php?id=<?= $advert['id'] ?>" class="btn btn-outline-light card-btn center-block">Voir l'annonce</a>
            </div>
            <div class="card-footer text-muted">
                <?= $advert['date'] ?>
            </div>
        </div>


        <?php
    }
    ?>





</section>


<?php
include './include/footer.php';
?>

