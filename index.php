<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Belle Table Covoiturage</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        <link rel="stylesheet" href="./style/style.css"/>
    </head>
    <body>

        <nav class="navbar justify-content-between">
            <a class="navbar-brand" href="index.php">BelleTable Co-voit'</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Trouver un co-voit'" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </nav>

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

            
            
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=covoiturage', 'root', '');
            ?>
            
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

    </body>
</html>
