<div class="container has-text-centered">

    <p class="title">
        Toutes les machines
    </p> <br>

    <p class="subtitle">
        Modifier une machine ou annuler une reservation
    </p>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom machine</th>
                <th>Logo</th>
                <th>nom user</th>
                <th>Statut</th>
                <th>Modification</th>
                <th>Suppression</th>
                <th>Annulation</th>


            </tr>
        </thead>
        <tbody>
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

            foreach ($result_machine as $machine)
            # code...
            {
            ?>
                <tr>
                    <td><?= $machine['id'] ?></td>
                    <td><?= $machine['nom_machine'] ?></td>
                    <td>
                        <figure class="image is-1by1">
                            <img src="<?= $machine['logo'] ?>" alt="" />
                        </figure>
                    </td>
                    <td><?= $machine['nom_user'] ?></td>
                    <td><?= $machine['statut'] ?></td>
                    <td><a class="button is-warning" href="modif_machine.php?id=<?= $machine['id'] ?>">
                            <i class="fas fa-user-edit"></i></a></td>
                    <td><a class="button is-danger" href="supprimer_machine.php?id=<?= $machine['id'] ?>">
                            <i class="fas fa-user-times"></i></a></td>
                    <td><a class="button is-success" href="annulation.php?id=<?= $machine['id'] ?>">
                            <i class="fas fa-user-minus"></i></a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</section>