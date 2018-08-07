<?php $title = 'ModifyBio'; ?>
<?php ob_start(); ?>
<h1>Modifier la Biographie</h1>
<hr>
<div>
	<form action="index.php?action=modifiedBio" method="post">
		<textarea id="mytextarea" name="biography"><?= $biography['bio'] ?></textarea><br>
		<div class="modify">
			<input class="btn btn-primary" type="submit" value="Modifier"/>
		</div>
	</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>