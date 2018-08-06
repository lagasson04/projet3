<?php $title = 'Error'; ?>
<?php ob_start(); ?>

<p>Mauvais identifiant ou mot de passe !!</p>
<a href="index.php?action=showConnectionView">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>