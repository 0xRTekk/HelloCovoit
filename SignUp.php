<?php

include './include/header.php';
?>


<section class="container login-wrapper">

    <div class="card login-card">
        <div class="card-header text-center">
            <h3>Inscris toi l'ami</h3>
        </div>
        <div class="card-body">
            <form class="container" action="./backend/BackSignUp.php" method="post">

                <div class="form-group" id="RegistrationFieldAccount">
                    <h4 class="text-center">Informations de compte</h4>
                    <label><input type="text" class="form-control" name="SignUpUsername" placeholder="Entre ton pseudo ici" required=""></label>
                    <label><input type="password" class="form-control" name="SignUpPassword" placeholder="Et ton mot de passe ici" required=""></label>
                    <label><input type="password" class="form-control" name="SignUpPasswordConfirmation" placeholder="Puis confirme le" required=""></label>
                    <input type="email" class="form-control" name="SignUpEmail" placeholder="Ton email pour finir" required="">
                </div>

                <hr>

                <div class="form-group" id="RegistrationFieldPersonnal">
                    <h4 class="text-center">Informations perso</h4>
                    <label><input type="radio" name="SignUpType" value="Conducteur" checked>Conducteur</label>
                    <label><input type="radio" name="SignUpType" value="Passager">Passager</label><br>
                    <label>
                        <select class="form-control" name="SignUpGender">
                            <option value="Mme">Mme.</option>
                            <option value="M">M.</option>
                        </select>
                    </label>
                    <label><input type="text" class="form-control" name="SignUpLastname" placeholder="Ecris ton nom"></label>
                    <label><input type="text" class="form-control" name="SignUpFirstname" placeholder="Ton prénom"></label>
                    <label>
                        <select class="form-control" name="SignUpYearBorn">
                            <?php for ($i = Date('Y'); $i >= 1980; $i--) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </label><br>
                    <label><input type="tel" class="form-control" name="SignUpPhone" placeholder="Ton 06 (ou 07)" ></label><br>
                    <label>Et montre nous ta belle frimousse<input type="file" class="form-control-file border" name="SignUpAvatar" accept="image/png, image/jpeg"></label>
                </div>

                <hr>

                <div class="form-group" id="RegistrationFieldVehicle">
                    <h4 class="text-center">Informations du véhicule</h4>
                    <label><input type="text" class="form-control" name="SignUpCar" placeholder="Quel est ton véhicule ?"></label>
                    <label><input type="text" class="form-control" name="SignUpMotor" placeholder="Son moteur ?"></label>
                    <label>
                        <select class="form-control" name="SignUpComfort">
                            <option selected disabled hidden>Type de confort</option>
                            <option value="Basique">Basique</option>
                            <option value="Normal">Normal</option>
                            <option value="Confortable">Confortable</option>
                            <option value="Luxe">Luxe</option>
                        </select>
                    </label>
                    <label>
                        <select class="form-control" name="SignUpSmoking">
                            <option selected disabled hidden>Fumeur ?</option>
                            <option value="Fumeur">Fumeur</option>
                            <option value="Non fumeur">Non fumeur</option>
                        </select>
                    </label>
                </div>

                <hr>

                <div class="text-center">
                    <input type="submit" type="button" name="SignUpButton" class="btn btn-outline-light card-btn" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</section>



<?php

include './include/footer.php';
?>