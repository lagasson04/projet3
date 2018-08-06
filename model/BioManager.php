<?php
require_once('model/Manager.php');

class BioManager extends Manager
{
	public function getBio() {
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, bio FROM biography');
		$biography = $req->fetch();
		return $biography;
	}

	public function modifyBio($bio)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE biography SET bio = ? WHERE id = 1');
		$req->execute(array($bio)); 
	}
}