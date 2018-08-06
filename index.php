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


//---------> Ajout action signalement commentaire
		elseif ($_GET['action'] == 'reportCom'){
			if (isset($_GET['idc'])) {
				reportComment($_GET['idc'], $_GET['idp']);

			}
			else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
				throw new Exception('Aucun signalement de commentaire envoyé');
			}
		}
//--------->FIN 

//---------> Ajout de l'action vue biographie
		elseif ($_GET['action'] == 'biography') {
			biography();
		}
//--------->FIN

//---------> Ajout action page contact
		elseif ($_GET['action'] == 'showContactView') {
			contactView();
		}
//--------->FIN

//---------> Ajout action message envoyé
		elseif ($_GET['action'] == 'contactMe') {
			if (isset($_POST['nom']) || isset($_POST['prenom']) || isset($_POST['email']) || isset($_POST['message'])) {
				contactMe($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['message']);
			}
		}
//--------->FIN

//---------> Ajout action vue page de connexion
		elseif ($_GET['action'] == 'showConnectionView') {
			connectionView();
		}
//--------->FIN

//---------> Ajout de l'action pour tester la connexion
		elseif ($_GET['action'] == 'connectTest'){
			if (isset($_POST['login']) && isset($_POST['pass'])) {
				connectionTest($_POST['login'], $_POST['pass']);
			}
			else {
				throw new Exception('Identifiant ou mot de passe incorrect!!!');
			}   
		}   
//--------->FIN 

//---------> Ajout de l'action pour la vue admin
		elseif ($_GET['action'] == 'adminView'){
			if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
				showAdminPage();
			}
			else {
				session_destroy();
				zozor();
			}
		}    
//--------->FIN

//---------> Ajout de l'action deconnexion
		elseif ($_GET['action'] == 'log_Out') {
			log_Out();
		}
//--------->FIN

//-------> Ajout de l'action pour la vue de l'ajout de chapitre
		elseif ($_GET['action'] == 'showAddPostView'){
			if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
				showAddPostView();
			}
			else {
				session_destroy();
				zozor();
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