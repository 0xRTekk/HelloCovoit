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
            
            <div class="card login-card text-center">
                <div class="card-header">
                    <h3>Connecte toi l'ami</h3>
                </div>
                <div class="card-body login-card-body">
                    <form class="container">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entre ton email ici">
                            <small id="emailHelp" class="form-text text-muted">Nous ne transmetterons jamais ton email (sans ton accord)</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Rentre ton mdp ici">
                        </div>
                        
                        <button type="submit" class="btn btn-outline-light card-btn">Connection</button>
                        
                        <div><a href="inscription.php">Toujours pas de compte chez nous ?</a></div>
                        
                    </form>
                </div>
            </div>
        </section>

    </body>
</html>
