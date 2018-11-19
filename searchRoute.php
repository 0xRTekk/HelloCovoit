<?php
include './include/header.php';
?>



<!-- Page content  -->
<header class="container-fluid">            
    <h1 class="text-center">Résultat de la recherche</h1>
    <hr class="">
</header>

<section class="container content-wrapper">

    <?php
    include 'backend/backSearchRoute.php';
    
    
    foreach ($searchResults as $result) {
        ?>

        <div class="card advert-card">
            <div class="card-header">
                <h5 class="card-title text-center"><?= $result['depart'] ?> / <?= $result['arrivee'] ?></h5>
            </div>
            <div class="card-body">
                <a href="#"><h6 class="card-subtitle mb-2 text-muted"><?= $result['mel_chauffeur'] ?></h6></a>
                <p class="card-text"><?= $result['precisions'] ?></p>
                <a href="advert.php?id=<?= $result['num_trajet'] ?>" class="btn btn-outline-light card-btn center-block">Voir l'annonce</a>
            </div>
            <div class="card-footer text-muted">
                <?= $result['date'] ?>
            </div>
        </div>


        <?php
    }
    ?>
</section>


<?php
include './include/footer.php';
?>

