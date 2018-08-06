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

//---------> Ajout action vue 1 chapitre avec les commentaires      
		elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			}
			else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
//--------->FIN

//---------> Ajout action ajout de commentaire        
		elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
                    // Autre exception
					throw new Exception('Tous les champs ne sont pas remplis !');
				}
			}
			else {
                // Autre exception
				throw new Exception('Aucun identifiant de billet envoyé');
			}
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