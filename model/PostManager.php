<?php
require_once('model/Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content,SUBSTRING(content, 1, 300) AS extractString, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        return $req;
    }

    public function lastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, SUBSTRING(content, 1, 600) AS extractString, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postPost($title, $content)
    {
        $db = $this->dbConnect();
        $adPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
        $affectedLines = $adPost->execute(array($title, $content));
        return $affectedLines;
    }

    public function modifyPost($title, $content, $postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $req->execute(array($title, $content, $postId)); 
    }

    public function deletePost($idp) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $isDeleted = $req->execute(array($idp));
        return $isDeleted;
    }
}