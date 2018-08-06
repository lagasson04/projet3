<?php
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BioManager.php');

function connectionTest($login, $pass) {
	//si la connexion marche, on envoi vers l'espace d'administration. Sinon on renvoi vers la vue de connexion
	$userManager = new UserManager();
	$isPasswordCorrect = $userManager->getConnection($_POST['login'], $_POST['pass']); 
	if ($isPasswordCorrect === false) {
		errorConnectionView(); 
	}

	else  {
		session_start();
		//$_SESSION['id'] = $result['id'];
		$_SESSION['login'] = $login;
		//$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$_SESSION['pass'] = $_POST['pass'];
		setcookie('login', $_POST['login'], time() + 365*24*3600, null, null, false, true);
		setcookie('pass', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
		//require('view/backend/trueConnectionView.php');
		header('Location: index.php?action=adminView');
	}
}

function showAdminPage() 
{
	require('view/backend/adminViewPage.php');
}

function log_Out()
{
	session_start();
	$_SESSION = array();
	session_destroy();
	setcookie('login', '');
	setcookie('pass_hache', '');
	header('Location: index.php?action=lastPost');
}