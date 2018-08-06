<?php $title = 'Error'; ?>
<?php ob_start(); ?>
<h1>Mauvais identifiant ou mot de passe !!</h1>
<p><a class="readmore" href="index.php?action=showConnectionView">Retour</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>