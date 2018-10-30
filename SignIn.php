<?php

include './include/header.php';
?>

<section class="container login-wrapper">

    <div class="card login-card text-center">
        <div class="card-header">
            <h3>Connecte toi l'ami</h3>
        </div>
        <div class="card-body login-card-body">
            <form class="container" action="./backend/BackSignIn.php" method="post">
                <div class="form-group">
                    <label for="SignInUsername">Pseudo</label>
                    <input type="text" class="form-control" id="SignInUsername" placeholder="Entre ton pseudo ici">
                </div>
                <div class="form-group">
                    <label for="SignInPassword">Mot de passe</label>
                    <input type="password" class="form-control" name="SignInPassword" id="SignInPassword" placeholder="Rentre ton mdp ici">
                </div>

                <input type="submit" type="button" name="SignInButton" class="btn btn-outline-light card-btn" value="Connexion">

                <div><a href="SignUp.php">Toujours pas de compte chez nous ?</a></div>

            </form>
        </div>
    </div>
</section>



<?php

include './include/footer.php';
?>