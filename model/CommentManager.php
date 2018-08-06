<?php
require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, post_id, author, comment,report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function reportComment($idc)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
		$affectedLines = $req->execute(array($idc));
		return $affectedLines;
	}

	public function getReportedComments() 
	{
		$db = $this->dbConnect();
		$comments = $db->query('SELECT id, post_id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh %imin %ss\') AS comment_date_fr FROM comments WHERE report = 1 ORDER BY comment_date DESC ');

		return $comments;
	}

	public function moderateComment($idc)
	{
		$db = $this->dbconnect();
		$req = $db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
		$affectedLines = $req->execute(array($idc));

		return $affectedLines;
	}
}