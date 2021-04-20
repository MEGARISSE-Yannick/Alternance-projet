


<?php


    //Vérification des informations saisis par l'utilisateur et des informations de la table admin

    if (isset($_POST['login']) & !empty($_POST['pseudo']) & !empty($_POST['mot_de_passe'])) {
        //Récuperation de l'utilisateur via son pseudo
        $bdd = new PDO('mysql:host=localhost;dbname=astrocoffee;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM administrateur WHERE pseudo ="' . $_POST['pseudo'] . '"');
        while ($donnees = $reponse->fetch()) {
            $pseudo = $donnees['pseudo'];
            $mot_de_passe = $donnees['mot_de_passe'];
        }

        //Vérification du mot de passe

        //Si le mot de passe ne correspond pas afficher un message d'erreur
        $mot_de_passe_identique = password_verify($_POST['mot_de_passe'], $mot_de_passe);


        if ($mot_de_passe_identique) {
         echo $donnees['mot_de_passe'];
               echo 'Vous êtes connecté';
               //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur
               //puis le rediriger vers la page d'espace membre
        } else {
            echo '<span class="alerte_message">Vos identifiants ne correspondent pas!</span>';

            }
        }
    
    ?>