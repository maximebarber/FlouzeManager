<?php $this->titre = 'Ajout opération' ?>

<div class="alert alert-danger" role="alert">
    <?= 'lol' ?>
</div>

<!-- Formulaire d'ajout d'une opération -->
<form method="POST" id="addOperation"></form>

<div class="form">

    <!-- Champ date -->
    <div class="form-group">
        <input type="date" class="form-control" name="date" form="addOperation">
    </div>

    <!-- Champ libellé -->
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Libellé de l'opération" name="libelle" form="addOperation">
    </div>

    <!-- Champ montant -->
    <div class="form-group input-group">
        <input type="number"class="form-control" placeholder="Montant de l'opération" name="montant" form="addOperation">
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">€</span>
        </div>
    </div>

    <!-- Liste déroulante types -->
    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="id_type" form="addOperation">

            <!-- Récupère les données de chaque TYPE sous forme d'une liste déroulante -->
            <?php foreach ($types as $type): ?>
                <option value="<?= $type["id_type_operation"] ?>"><?= $type["nom_type_operation"] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <!-- Affichage formulaire ajouter un type -->
    <?php require 'vueAddType.php' ?>

    <!-- Liste déroulante catégories -->
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="form-control" id="categorie" name="id_categorie" form="addOperation">

            <!-- Récupère les données de chaque CATEGORIE sous forme d'une liste déroulante -->
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie["id_categorie_operation"] ?>"><?= $categorie["nom_categorie_operation"] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <!-- Affichage formulaire ajouter une catégorie -->
    <?php require 'vueAddCategorie.php' ?>

    <!-- Liste déroulante comptes bancaires -->
    <div class="form-group">
        <label for="categorie">Compte Bancaire</label>
        <select class="form-control" id="categorie" name="id_compte_bancaire" form="addOperation">

            <!-- Récupère les données de chaque COMPTE BANCAIRE sous forme d'une liste déroulante -->
            <?php foreach ($comptes as $compte): ?>
                <option value="<?= $compte["id_compte_bancaire"] ?>"><?= $compte["numero_compte_bancaire"] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <!-- Boutons radio Crédit ou Débit -->
    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nature" id="credit" value="C" form="addOperation">
            <label class="form-check-label" for="credit">Crédit</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nature" id="debit" value="D" checked form="addOperation">
            <label class="form-check-label" for="debit">Débit</label>
        </div>
    </div>

    <!-- Checkbox dépense fixe -->
    <div class="form-group form-check">
        <input type="hidden" value="0" name="fixe" form="addOperation">
        <input type="checkbox" class="form-check-input" id="fixe" name="fixe" value="1" form="addOperation">
        <label class="form-check-label" for="fixe">Dépense fixe</label>
    </div>

    <button type="submit" class="btn btn-primary" form="addOperation">Valider</button>

</div>