<?php $this->titre = 'Comptes Bancaires' ?>

<!-- Affiche la liste des comptes bancaires -->
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <th>Numéro de compte</th>
        <th>Plus de détails</th>
        </thead>


        <!-- Récupère les données stockées dans la BDD -->
        <?php foreach ($CB as $compte): ?>

            <tr>

                <td><?= $compte['num'] ?></td>
                <td><a href="index.php?action=GetOperations&amp;idCB=<?= $compte['id'] ?>">Détails...</a></td>

            </tr>

        <?php endforeach; ?>

    </table>
</div>
