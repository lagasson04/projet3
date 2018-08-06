<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<h1>Connexion</h1><br>
<div class="connectionView">
	<form action="index.php?action=connectTest" method="post">
		<!-- on envoi vers l'action de test de la connexion du routeur -->
		<div class="form-group">
			<label for="pseudo">Pseudo*</label>
			<input type="text" class="form-control" name="login" id="login" required="required" placeholder="Votre pseudo">
		</div>
		<div class="form-group">
			<label for="pass">Mot de passe*</label>
			<input type="password" class="form-control" name="pass" id="pass" required="required" placeholder="Mot de passe">
		</div>
		<div class="send">
			<button type="submit" class="btn btn-danger" name="envoyer">Envoyer</button>
		</div>
	</form>
</div>		
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
