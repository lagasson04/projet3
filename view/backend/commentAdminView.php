<?php $title = 'Moderation'; ?>
<?php ob_start(); ?>
<h1>Gestion des commentaires</h1>
<hr>
<br/>
<?php
while ($comment = $comments->fetch())
{
?>
<div class="comment">
	<p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
	<p><?= nl2br($comment['comment']) ?></p>
	<p>
		<div class="modComment">
			<div class="row">
				<form action="index.php?action=modComment&amp;idc=<?= $comment['id'] ?>" method="post">
					<input class="btn btn-success" type="submit" value="Modérer">
				</form>

				<form action="index.php?action=confirmDeleteCommentView&amp;idc=<?= $comment['id'] ?>" method="post">
					<input class="btn btn-danger" type="submit" value="Supprimer" name="deleteCom">
				</form>
			</div>
		</div>
	</p>
<hr> 
</div>
<?php 
}
$comments->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>