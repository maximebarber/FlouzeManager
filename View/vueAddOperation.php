<?php $titre = 'Ajout opération' ?>

<?php ob_start(); ?>

<!-- Formulaire d'ajout d'une opération -->
<form>

    <div class="form-group">
        <input type="date" class="form-control" name="date">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Libellé de l'opération" name="libelle">
    </div>

    <div class="form-group">
        <input type="number" step="any" class="form-control" placeholder="Montant de l'opération" name="montant">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="id_type">

            <!-- Récupère les données de chaque TYPE sous forme d'une liste déroulante -->
            <?php foreach ($types as $type): ?>
                <option value="<?= $type["id_type_operation"] ?>"><?= $type["nom_type_operation"] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="form-control" id="categorie" name="id_categorie">

            <!-- Récupère les données de chaque CATEGORIE sous forme d'une liste déroulante -->
            <?php foreach ($categories as $categorie): ?>
            <option value="<?= $categorie["id_categorie_operation"] ?>"><?= $categorie["nom_categorie_operation"] ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="form-group">
        <label for="categorie">Compte Bancaire</label>
        <select class="form-control" id="categorie" name="id_compte_bancaire">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>

    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nature" id="credit" value="C">
            <label class="form-check-label" for="credit">Crédit</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nature" id="debit" value="D" checked>
            <label class="form-check-label" for="debit">Débit</label>
        </div>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="fixe" name="fixe">
        <label class="form-check-label" for="fixe">Dépense fixe</label>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>

</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>

