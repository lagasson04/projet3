<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<h1>Liste des Chapitres</h1>
<hr>
<br>
<?php 
while ($data = $posts->fetch())
{
?>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>
						<?= strip_tags($data['title']) ?>
					</h3>
				</div>
				<div class="card-body">
					<p>
						<!-- On affiche le contenu du billet -->
						<p><?= nl2br(strip_tags($data['extractString'])) ?><a class="readmore" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><br>...Lire plus</a>
						</p>
						<em><strong>le <?= $data['creation_date_fr'] ?></strong></em>
					</p>
					<div class="action">
						<div class="row">
							<form action="index.php?action=modifyPost&amp;postId=<?= $data['id'] ?>" method="post">
								<input class="btn btn-primary" type="submit" value="Modifier">
							</form>
							<form action="index.php?action=confirmDeletePostView&amp;idp=<?= $data['id'] ?>" method="post">
								<input class="btn btn-danger" type="submit" value="Supprimer" name="delete">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
$posts->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>