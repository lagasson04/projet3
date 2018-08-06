<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/BioManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function lastPost()
{
    $postManager = new PostManager(); // Création d'un objet
    $post = $postManager->lastPost(); // Appel d'une fonction de cet objet

    require('view/frontend/lastPostView.php');
}

function post()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComment($postId, $author, $comment);

	if ($affectedLines === false) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function reportComment($idc, $idp)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->reportComment($idc);
	if ($affectedLines === false) {
		throw new Exception('Impossible de signaler le commentaire !!');
	}
	else {
		header('Location: index.php?action=post&id=' . $idp);
	}
}

function biography()
{
    $bioManager = new BioManager();
    $biography = $bioManager->getBio();

    if ($biography === false) {
        throw new Exception('Impossible d\'afficher la biographie !');
    }
    else {
        require('view/frontend/biography.php');
    }
}