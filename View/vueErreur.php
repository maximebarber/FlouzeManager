<?php $titre = 'Erreur'; ?>

<?php ob_start() ?>

<!-- Affichage d'une page d'erreur -->

<p>Une erreur est survenue : <?= $msgErreur ?></p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'View/template.php'; ?>
