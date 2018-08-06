<?php

// Chargement des classes
require_once('model/PostManager.php');
//require_once('model/CommentManager.php');
//require_once('model/BioManager.php');

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