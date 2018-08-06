<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>
<h3><?= $errorMessage ?></h3>
<p><a  class="readmore" href="index.php?action=lastPost">Retour</a></p>
<?php $content = ob_get_clean(); ?>
<?php require('frontend/template.php'); ?>
