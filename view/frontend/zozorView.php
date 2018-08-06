<?php $title = 'zozor'; ?>
<?php ob_start(); ?>
<h3>Veuillez-vous connecter pour accéder à l'espace Administration...</h3>
<p><img src="public/img/zozor4.jpg" class="img-fluid" id="zozor" alt="zozor"></p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>