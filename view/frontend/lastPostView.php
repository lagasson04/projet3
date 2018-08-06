<?php $title = 'Jean FORTEROCHE - Bienvenue sur mon blog'; ?>

<?php ob_start(); ?>

<p>Dernier chapitre publié :</p>
<?php 
while ($data = $post->fetch()) 
{
?>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>
						<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= strip_tags($data['title']) ?></a>
					</h3>
				</div>
				<div class="card-body">
					<p>
						<!-- On affiche le contenu du billet -->
						<p><?= nl2br(strip_tags($data['extractString'])) ?><a class="readmore" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><br>...Lire plus</a></p>
						<br />
						<a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><em><strong>le <?= $data['creation_date_fr'] ?></strong></em></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
$post->closeCursor(); 
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');