<?php $this->titre = 'Opérations' ?>

<?php //ob_start(); ?>

<!-- Affiche le solde courant -->

<h3>Solde Courant : <?= $solde; ?> €</h3>

<!-- Affiche le récapitulaif des opérations -->

<table border="1">
    <thead>
        <th>Date</th>
        <th>Libellé</th>
        <th>Type</th>
        <th>Catégorie</th>
        <th>Débit</th>
        <th>Crédit</th>
    </thead>

    <!-- Récupère les données stockées dans la BDD -->
    <?php foreach ($operations as $operation): ?>

        <tr>

            <td><?= $operation['date_operation'] ?></td>
            <td><?= $operation['libelle_operation'] ?></td>
            <td><?= $operation['nom_type_operation'] ?></td>
            <td><?= $operation['nom_categorie_operation'] ?></td>

            <!-- Affichage du montant de l'opération dans crédit ou débit -->
            <?php if ($operation['nature_operation'] === 'D') { ?>

                <td>- <?= $operation['montant_operation'] ?> €</td>
                <td></td>

            <?php } else { ?>

                <td></td>
                <td>+ <?= $operation['montant_operation'] ?> €</td>

            <?php } ?>

        </tr>

    <?php endforeach; ?>

</table>

<?php //$contenu = ob_get_clean(); ?>

<?php //require 'View/template.php'; ?>
