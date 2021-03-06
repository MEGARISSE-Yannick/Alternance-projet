<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserCoffee!</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <section class="hero is-dark is-small">
        <div class="container has-text-centered">
                <img src="https://zupimages.net/up/21/15/9r1f.png" alt="" />

                <p class="title">
                    Tous les utilisateurs
                </p> <br>

                <p class="subtitle">
                    Creer un utilisateur ou lui assigner une machine
                </p>
                <form method="post">
                    <label for="pseudo"> User </label>
                    <input class="input" type="text" placeholder="Nom de l'utilisateur" name="pseudo">
                    <button type="submit" class="button is-black"><i class="fas fa-rocket"></i>Ajouter</button>
                    
                    <?php
                           include('config.php');

                    $reponse = $db->query('SELECT * FROM utilisateur');
                    if (isset($_POST['pseudo'])) {
                        $requete = 'INSERT INTO utilisateur VALUES(NULL, "' .$_POST['pseudo'] . '" )';
                        $resultat = $db->query($requete);
                    }
                    ?>
                </form>

<br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID client</th>
                    <th>Pseudo</th>
                    <th>Machine</th>
                    <th>Modification</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // On inclut la connexion ?? la base
                require_once('config.php');

                // On ??crit notre requ??te
                $sql = 'SELECT * FROM `utilisateur`';

                // On pr??pare la requ??te
                $query_ = $db->prepare($sql);

                // On ex??cute la requ??te
                $query_->execute();

                // On stocke le r??sultat dans un tableau associatif
                $result = $query_->fetchAll(PDO::FETCH_ASSOC);

                require_once('close.php');

                foreach ($result as $utilisateur) {
                ?>
                    <tr>
                        <td><?= $utilisateur['id'] ?></td>
                        <td><?= $utilisateur['pseudo'] ?></td>
                        <td><?= $utilisateur['machine_user'] ?></td>
                        <td><a class="button is-warning" href="modif_user.php?id=<?= $utilisateur['id'] ?>">
                                <i class="fas fa-user-edit"></i></a></td>
                        <td><a class="button is-danger" href="supprimer_user.php?id=<?= $utilisateur['id'] ?>">
                                <i class="fas fa-user-times"></i></a></td>

                    </tr>
                <?php
                }
                ?>
                <?php

                ?>


            </tbody>
        </table>
        </div>
      
    </section>
</body>

</html>