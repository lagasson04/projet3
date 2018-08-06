<?php $title = 'Confirmez supression du chapitre'; ?>
<?php ob_start(); ?>
<h1>Confirmez-vous la suppression du chapitre ?</h1><br />
<div class="confirmDelete">
	<div class="row">
		<form action="index.php?action=showModifPage" method="post">
			<input class="btn btn-primary" type="submit" value="Annuler">
		</form>
		<form action="index.php?action=deletePost&amp;idp=<?= $_GET['idp'] ?>" method="post">
			<input class="btn btn-danger" type="submit" value="Supprimer" name="delete">
		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>