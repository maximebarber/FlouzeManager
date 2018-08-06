<?php require 'Controller/verificationsMontants.php' ?>

<?php $this->titre = 'Opérations' ?>

<?php //$numCompte   = $operations->fetch(); ?>
<h5>Solde Courant : <?= $solde; ?> € du compte <?php //$numCompte['numero_compte_bancaire'] ?></h5><br>

<a class="waves-effect waves-light btn">Recettes</a>
<a class="waves-effect waves-light btn">Dépenses</a>

<!-- Affiche le récapitulaif des opérations -->
<div class="table-responsive">
    <table class="table table-hover">
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

                    <td>- <?= deuxDecimales($operation['montant_operation']) ?> €</td>
                    <td></td>

                <?php } else { ?>

                    <td></td>
                    <td>+ <?= deuxDecimales($operation['montant_operation']) ?> €</td>

                <?php } ?>

            </tr>

        <?php endforeach; ?>
        <?php //$operations->closeCursor(); ?>

    </table>
</div>

<?php foreach ($credits as $credit): ?>

    <?= $credit['montant_operation']; ?>

<?php endforeach; ?>

