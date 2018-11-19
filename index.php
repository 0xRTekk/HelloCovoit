<?php
include './include/header.php';
?>



<!-- Page content  -->
<header class="container-fluid">            
    <h1 class="text-center">Liste des co-voiturages</h1>
    <hr class="">
</header>

<section class="container content-wrapper">
    <a href="addRoute.php"><button type="button" class="btn btn-lg btn-outline-light btn-block">Proposer un co-voit'</button></a>

    <?php
    include 'db/routeSelectAll.php';
    
    foreach ($adverts as $advert) {
        ?>

        <div class="card advert-card">
            <div class="card-header">
                <h5 class="card-title text-center"><?= $advert['depart_ville'] ?> / <?= $advert['arrivee_ville'] ?></h5>
            </div>
            <div class="card-body">
                <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $advert['mel_chauffeur'] ?></h6></a>
                <p class="card-text"><?= $advert['precisions'] ?></p>
                <a href="advert.php?id=<?= $advert['num_trajet'] ?>" class="btn btn-outline-light card-btn center-block">Voir l'annonce</a>
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

