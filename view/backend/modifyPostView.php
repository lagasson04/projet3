<?php $title = 'ModifyPost'; ?>
<?php ob_start(); ?>
<h1>Modifier un chapitre</h1>
<hr>
<div>
	<form action="index.php?action=modifiedPost&amp;postId=<?= $_GET['postId'] ?>" method="post">
		<label for="title">Titre</label><br>
		<input type="text" id="title" name="title" value="<?= $post['title'] ?>" required="required" />
		<p><label for="content">Contenu</label>
		<textarea id="mytextarea" name="content"><?= $post['content'] ?></textarea></p>
		<div class="modify">
			<input  class="btn btn-primary" type="submit" value="Modifier"/>
			<input  name="id" type="hidden" value="<?= $post['id'] ?>"/>
		</div>
	</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>