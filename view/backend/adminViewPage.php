<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<h1>Tableau de bord</h1>
<div class="container">
	<hr>
	<form action="index.php?action=showAddPostView" method="post">
		<input class="btn btn-success col-lg-12 col-xs-12" type="submit" value="Ajouter un chapitre">
	</form>
	<hr>
	<form action="index.php?action=showModifPage" method="post">
		<input class="btn btn-warning col-lg-12 col-xs-12" type="submit" value="Modifier ou supprimer un chapitre">
	</form>
	<hr>
	<form action="index.php?action=showReportedComment" method="post">
		<input class="btn btn-danger col-lg-12 col-xs-12" type="submit" value="Modérer les commentaires">
	</form>
	<hr>
	<form action="index.php?action=showModifyBioView" method="post">
		<input class="btn btn-primary col-lg-12 col-xs-12" type="submit" value="Modifier la biographie">
	</form>
	<hr>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>