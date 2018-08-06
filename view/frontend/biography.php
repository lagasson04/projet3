<?php $title = 'Biographie'; ?>
<?php ob_start(); ?>
<h1>Biographie</h1><br>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h3><img src="public/img/Jean-Forteroche.jpg" class="img-fluid" id="jean" alt="Jean-Forteroche"></h3>
		</div>
		<div class="card-body">
			<p><?= $biography['bio'] ?></p>
		</div>
	</div>
</div>
<?php 
if (isset($_COOKIE['login']) && isset($_COOKIE['pass'])) {
	?>
	<a class="modify" style="color: red" href="index.php?action=showModifyBioView">Modifier</a>
	<?php 
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>