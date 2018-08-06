<?php
require('controller/frontend.php');
require('controller/backend.php');

try { // On essaie de faire des choses
	if (isset($_GET['action'])) {

//---------> Dernier chapitre affiché
		if ($_GET['action'] == 'lastPost') {
			lastPost();
		}
//--------->FIN

//---------> Ajout action liste des chapitres        
		elseif ($_GET['action'] == 'listPosts') {
			listPosts();
		}
//--------->FIN
	}
	else {
		lastPost();
	}   
}
catch(Exception $e) {
	$errorMessage = $e->getMessage();
	require('view/errorView.php');
}