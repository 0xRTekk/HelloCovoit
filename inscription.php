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

        <section class="container login-wrapper">

            <div class="card login-card">
                <div class="card-header text-center">
                    <h3>Inscris toi l'ami</h3>
                </div>
                <div class="card-body">
                    <form class="container" action="addUser.php" method="post">

                        <div class="form-group" id="RegistrationFieldAccount">
                            <h4 class="text-center">Informations de compte</h4>
                            <label><input type="email" class="form-control" name="EmailRegistration" placeholder="Entre ton email ici" required=""></label>
                            <label><input type="password" class="form-control" name="PassRegistration" placeholder="Et ton mot de passe ici" required=""></label>
                            <label><input type="password" class="form-control" name="PassRegistrationConfirm" placeholder="Puis confirme le" required=""></label>
                        </div>

                        <hr>

                        <div class="form-group" id="RegistrationFieldPersonnal">
                            <h4 class="text-center">Informations perso</h4>
                            <label><input type="radio" name="type" value="" checked>Conducteur</label>
                            <label><input type="radio" name="type" value="">Passager</label><br>
                            <label>
                                <select class="form-control" name="sexe">
                                    <option value="">Mme.</option>
                                    <option value="">M.</option>
                                </select>
                            </label>
                            <label><input type="text" class="form-control" name="NameRegistration" placeholder="Ecris ton nom"></label>
                            <label><input type="text" class="form-control" id="InputName" name="FirstNameRegistration" name="FirstNameRegistration" placeholder="Ton prénom"></label>
                            <label>
                                <select class="form-control" name="BirthYearRegistration">
                                    <?php for ($i = Date('Y'); $i >= 1905; $i--) { ?>
                                        <option value=""><?= $i ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </label><br>
                            <label><input type="tel" class="form-control" name="TelRegistration" placeholder="Ton 06 (ou 07)" ></label><br>
                            <label>Et montre nous ta belle frimousse<input type="file" class="form-control-file border" name="PicRegistration" accept="image/png, image/jpeg"></label>
                        </div>

                        <hr>

                        <div class="form-group" id="RegistrationFieldVehicle">
                            <h4 class="text-center">Informations du véhicule</h4>
                            <label><input type="text" class="form-control" name="vehicleRegistration" placeholder="Quel est ton véhicule ?"></label>
                            <label>
                                <select class="form-control" name="ConfortRegistration">
                                    <option selected disabled hidden>Type de confort</option>
                                    <option value="">Basique</option>
                                    <option value="">Normal</option>
                                    <option value="">Confortable</option>
                                    <option value="">Luxe</option>
                                </select>
                            </label>
                            <label>
                                <select class="form-control" name="SmokerRegistration">
                                    <option selected disabled hidden>Fumeur ?</option>
                                    <option value="">Fumeur</option>
                                    <option value="">Non fumeur</option>
                                </select>
                            </label>
                        </div>
                        
                        <hr>
                        
                        <div class="text-center"><button type="submit" class="btn btn-outline-light card-btn">Inscription</button></div>
                    </form>
                </div>
            </div>
        </section>

    </body>
</html>
