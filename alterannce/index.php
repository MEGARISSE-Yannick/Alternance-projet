<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AstroCoffee!</title>
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
          Ajoute un utilisateur et defini son temps d'utilisation pour sa machine
        </p>
      </div>
      <br><br>
      <form action="" method="post">
        <div class="columns">
          <div class="column is-4"></div>
          <div class="column is-4">

            <div class="container has-text-centered">
              <label for="pseudo"> User </label>

              <div class="column ">
                <div name="pseudo" class="select ">
                  <select>
                    <?php

                    // On inclut la connexion à la base
                    require_once('config.php');

                    // On écrit notre requête
                    $sql = 'SELECT * FROM `utilisateur`';

                    // On prépare la requête
                    $query = $db->prepare($sql);

                    // On exécute la requête
                    $query->execute();

                    // On stocke le résultat dans un tableau associatif
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                    require_once('close.php');

                    foreach ($result as $utilisateur) {
                    ?>
                      <option value="<?= $utilisateur['id'] ?>"><?= $utilisateur['pseudo'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <label for="machine"> Machine </label>

                <div class="column ">
                  <div name="machine" class="select ">
                    <select>
                      <?php

                      // On inclut la connexion à la base
                      require_once('config.php');

                      // On écrit notre requête
                      $sql_machine = 'SELECT * FROM `machine`';

                      // On prépare la requête
                      $query_machine = $db->prepare($sql_machine);

                      // On exécute la requête
                      $query_machine->execute();

                      // On stocke le résultat dans un tableau associatif
                      $result_machine = $query_machine->fetchAll(PDO::FETCH_ASSOC);

                      require_once('close.php');

                      foreach ($result_machine as $machine) {
                      ?>
                        <option value="<?= $machine['id'] ?>"><?= $machine['nom_machine'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                </div>
                <div class="column">
                  <label for="pseudo"> Date de reservation </label>
                  <input class="input" type="date" placeholder="Date de reservation" name="date_reservation">
                </div>
                <div class="column">
                  <label for="pseudo"> Heure de debut de reservation </label>
                  <input class="input" namne="heure_debut" type="time">
                  <label for="pseudo"> Heure de fin de reservation </label>
                  <input class="input" namne="heure_fin" type="time">
                </div>

                <div class="column has-text-centered">
                  <a type="submit" name="reserver" class="button is-danger">
                    <i class="fas fa-user-plus"></i>
                    Reserver
                  </a>
                </div>
              </div>
              
      </form>


      <div class="column is-4"></div>

</body>

</html>