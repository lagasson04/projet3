<?php
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BioManager.php');

function connectionTest($login, $pass) 
{
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

function showAddPostView() 
{
	require('view/backend/addPostView.php');
}

function addPost($title, $content) 
{
	$postManager = new PostManager();
	$addPost = $postManager->postPost($title, $content);
	if ($addPost === false) {
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
		header('Location: index.php?action=showModifPage');
	}
}

function showModifPage() 
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('view/backend/showModifPage.php');
}

function showModifPostView($idp) 
{
	$postManager = new PostManager();
	$post = $postManager->getPost($idp);
	require('view/backend/modifyPostView.php');
}

function modifiedPost($title, $content, $idp) 
{
	$postManager = new PostManager();
	$modifyPost = $postManager->modifyPost($title, $content, $idp);
	if ($modifyPost === false) {
		die('Impossible de modifier le chapitre !');
	}
	else {
		header('Location: index.php?action=showModifPage');
	}
}

function confirmDeletePostView()
{
	require('view/backend/confirmDeletePostView.php');
}

function deletePost($postId) 
{
	$postManager = new PostManager();
	$deletepost = $postManager->deletePost($postId);
	if ($deletepost === false) {
		die('Impossible de supprimer le chapitre !');
	}
	else {
		header('Location: index.php?action=showModifPage');
	}
}

function showReportedComment() 
{
	$commentManager = new CommentManager();
	$comments = $commentManager->getReportedComments();
	if ($comments === false) {
		throw new Exception('Impossible d\'afficher les commentaires signalés');
	}
	else {
		require('view/backend/commentAdminView.php');
	}
}

function modComment($idc) 
{
	$commentManager = new CommentManager();
	//$comments = $commentManager->getReportedComments();
	$affectedLines = $commentManager->moderateComment($idc);
	if ($affectedLines == false) {
		throw new Exception('Impossible de modérer les commentaires signalés');
	}
	else {
		header('Location: index.php?action=showReportedComment');
	}
}

function confirmDeleteCommentView()
{
	require('view/backend/confirmDeleteCommentView.php');
}