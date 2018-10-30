<?php
include './include/header.php';
?>



<!-- Page content  -->
<header class="container-fluid">            
    <h1 class="text-center">Liste des co-voiturages</h1>
    <hr class="">
</header>

<section class="container content-wrapper">
    <a href="#"><button type="button" class="btn btn-lg btn-outline-light btn-block">Proposer un co-voit'</button></a>

    <p>Affichage des dernières annonces de co-voiturages<br>
        Lors du clic sur un des liens de co-voiturage : afficher l'annonce complète<br>
        Sur l'annonce complète, possibilité de résérver le trajet.<br>
        Au moment de réserver, vérifier si utilisateur est co. Si non, envoyer sur la page d'inscritpion. La page d'inscription contient un lien "Déjà inscrit ?" qui envoi sur la page de connection
    </p>




    <div class="card advert-card">
        <div class="card-header">
            <h5 class="card-title text-center">Départ/Déstination</h5>
        </div>
        <div class="card-body">
            <a href="#"><h6 class="card-subtitle mb-2 text-muted">Autheur</h6></a>
            <p class="card-text">Déscription : villes étapes, type de voiture etc...</p>
            <a href="#" class="btn btn-outline-light card-btn center-block">Voir l'annonce</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>



</section>


<?php
include './include/footer.php';
?>

