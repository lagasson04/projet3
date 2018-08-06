<?php $title = 'AddPost'; ?>
<?php ob_start(); ?>
<h1>Ajouter un chapitre</h1>
<hr>
<p>
	<form id="formulaire" action="index.php?action=addPost" method="post">
		<div>
			<label for="title">Titre</label><br>
			<input type="text" id="title" name="title" required="required" />
		</div><br />
		<div>
			<label for="content">Contenu</label><br>
			<textarea id="mytextarea" name="content"></textarea>
		</div><br>
		<div class="add">
			<input class="btn btn-success" type="submit" value="Ajouter"/>
		</div>
	</form>
</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>