<?php
include './include/header.php';




if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { //Possibilité d'ajouter une annonce si déjà connecté
    ?>
    <header class="container-fluid">            
        <h1 class="text-center">Dépose ton annonce l'ami !</h1>
        <hr />
    </header>

    <section class="container content-wrapper">
        <div class="form-group text-center">
            <form action="backend/backAddRoute.php" method="post">
                
                <label for="departure">La ville de départ : <input type="text" name="departure" id="departure" required="" class="form-control"></label>
                
                <label for="arrival">La ville d'arrivée : <input type="text" name="arrival" id="arrival" required="" class="form-control"></label>
                <br>
                <br>

                <input type="text" name="author" value="<?= $_SESSION['user'] ?>" hidden="" >
                
                <input type="text" name="mel" value="<?= $_SESSION['email'] ?>" hidden="" >

                <label for="date">Quand : <input type="date" name="date" id="date" required="" class="form-control"></label>
                
                <label>A quelle heure : <input type="time" name="departureTime" class="form-control"></label>
                <br>
                <br>
                
                <label for="step1" >Etape 1 : <input type="text" name="step1" id="step1" class="form-control"></label>
                
                <label for="step2" >Etape 2 : <input type="text" name="step2" id="step2" class="form-control"></label>
                
                <label for="step3" >Etape 3 : <input type="text" name="step3" id="step3" class="form-control"></label>
                <br>
                <br>
                
                <label for="price" >Prix : <input type="number" name="price" id="price" class="form-control"></label>
                <br>
                <br>
                
                <label for="seats" >Nombre de places : <input type="number" name="seats" id="seats" class="form-control"></label>
                <br>
                <br>
                
                <label for="description">Description : </label>
                <textarea name="description" id="description" placeholder="Renseignez les indications supplémentaires comme un point de rendez-vous ou autres directives" required="" class="form-control"></textarea>
                <br>
                <br>

                <input type="submit" type="button" name="addRouteButton" class="btn btn-outline-light card-btn form-control" value="Déposer">
            </form>
        </div>
    </section>
    <?php
} else { //Sinon renvoie vers la page de connection 
    header('Location: signIn.php');
}
?>



<?php
include './include/footer.php';
?>

