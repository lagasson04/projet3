<?php $title = 'Confirmez supression du commentaire'; ?>
<?php ob_start(); ?>
<h1>Confirmez-vous la suppression du commentaire ?</h1><br />
<div class="confirmDelete">
	<div class="row">
		<form action="index.php?action=showReportedComment" method="post">
			<input class="btn btn-primary" type="submit" value="Annuler">
		</form>
		<form action="index.php?action=delComment&amp;idc=<?= $_GET['idc'] ?>" method="post">
			<input class="btn btn-danger" type="submit" value="Supprimer">
		</form>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>