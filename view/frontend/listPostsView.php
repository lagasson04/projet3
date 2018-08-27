<?php $title = 'Jean FORTEROCHE - Bienvenue sur mon blog'; ?>

<?php ob_start(); ?>

<p>Liste des derniers chapitres :</p>
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
							<?= nl2br(strip_tags($data['extractString'])) ?><a class="readmore" href="index.php?action=post&amp;id=<?= $data['id'] ?>"><br>...Lire plus</a>
							<em><strong>le <?= $data['creation_date_fr'] ?></strong></em>
							<p><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em></p>
							<hr>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
$posts->closeCursor();
?> 
<?php $content = ob_get_clean(); ?>
<?php require('template.php');