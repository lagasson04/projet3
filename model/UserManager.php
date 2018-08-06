<?php
require_once('model/Manager.php');

class UserManager extends Manager
{
	public function getConnection($login, $pass)
	{
	//on teste si le couple login/pass existe dans la bdd 
	//si oui on renvoi 1 si ça existe, sinon on renvoi 0
	//  Récupération de l'utilisateur et de son pass hashé
		$login = $_POST['login'];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, pass FROM users WHERE login = :login');
		$req->execute(array(
			'login' => $login));
		$result = $req->fetch();
		$isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

		return $isPasswordCorrect;
	}

}