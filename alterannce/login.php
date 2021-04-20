<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LoginCoffee!</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />
                <p class="title">
                    Bienvenue sur AstroCoffee
                </p> <br>

                <p class="subtitle">
                    Connexion admin </p>
                <div class="columns is-4">
                    <div class="column is-4"> </div>
                    <div class="column is-4">
                        <form class="form-signin " action="verification.php" method="POST">
                            <div class="column">
                                <label for="pseudo"> Administrateur </label>
                                <input class="input" id="pseudo" type="text" name="pseudo">
                            </div>
                            <div class="column">
                                <label for="pseudo"> Mot de passe </label>
                                <input class="input" id="mot_de_passe" type="password" name="mot_de_passe">
                            </div>

                            <input class="button is-danger" type="submit" value="Se connecter" name="login">
                            <?php
                            if (isset($_GET['erreur'])) {
                                $err = $_GET['erreur'];
                                if ($err == 1 || $err == 2)
                                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                            }
                            ?>
                        </form>
                    </div>
                    <div class="column is-4"> </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>