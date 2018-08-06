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

function contactView()
{
    require('view/frontend/contactView.php');
}

function contactMe($nom, $prenom, $email, $message)
{
    // Check for empty fields
	if(empty($_POST['nom'])      ||
		empty($_POST['prenom'])   ||
		empty($_POST['email'])    ||
		empty($_POST['message'])  ||
		!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		?>
		<p><META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php?action=showContactView"><h1>Adresse email non valide, retour au formulaire de contact dans quelques secondes...</h1></META></p>
		<?php
		return false;
	}

	$name = strip_tags(htmlspecialchars($_POST['nom']));
	$firstName = strip_tags(htmlspecialchars($_POST['prenom']));
	$email_address = strip_tags(htmlspecialchars($_POST['email']));
	$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'mairie.saintecroix@raveld.fr'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@raveld.fr\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;
}