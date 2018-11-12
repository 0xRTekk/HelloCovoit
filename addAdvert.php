<?php
include './include/header.php';



// Page content  


if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { //Possibilité d'ajouter une annonce si déjà connecté
    ?>
    <header class="container-fluid">            
        <h1 class="text-center">Dépose ton annonce l'ami !</h1>
        <hr />
    </header>

    <section class="container content-wrapper">

        <div class="form-group">
            <form action="backend/backAddAdvert.php" method="post">
                <label for="departure">La ville de départ : </label>
                <input type="text" name="departure" id="departure" required="" class="form-control">

                <label for="arrival">La ville d'arrivée : </label>
                <input type="text" name="arrival" id="arrival" required="" class="form-control">

                <input type="text" name="author" id="author" value="<?= $_SESSION['user'] ?>" hidden="" >

                <label for="date">Quand : </label>
                <input type="date" name="date" id="date" required="" class="form-control">

                <label for="description">Description : </label>
                <textarea name="description" id="description" required="" class="form-control"></textarea>

                <input type="submit" type="button" name="addAdvertButton" class="btn btn-outline-light card-btn form-control" value="Déposer">
            </form>
        </div>


    </section>
    <?php
} else { //Sinon renvoie vers la page de connection 
    header('Location: ../signIn.php');
}
?>



<?php
include './include/footer.php';
?>

