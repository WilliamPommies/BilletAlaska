<?php

require_once("model/query_manager.php");

class Comments extends QueryManager
{
    public function getComments($id)
    {
      $db = $this->getConnection();
      $req = $db->prepare("SELECT * FROM commentaires WHERE id_article = ? ORDER BY id DESC");
      $req->execute(array($id));
      return $req;
    }

    public function addComment($username, $comment, $id_article)
    {
      $db = $this->getConnection();
      $req = $db->prepare("INSERT INTO commentaires (username, comment, id_article, reported) VALUES(?,?,?,0)");
      $req->execute(array($username, $comment, $id_article));
    }

    public function signalComment($commentId){
      $db = $this->getConnection();
      $req = $db->prepare("UPDATE commentaires SET reported = '1' WHERE id = ? ");
      $req->execute(array($commentId));
    }

    public function deleteComment($commentId){
      $db = $this->getConnection();
      $req = $db->prepare("DELETE FROM commentaires WHERE id = ?");
      $req->execute(array($commentId));
    }

    public function deleteArticleComment($articleId){
      $db = $this->getConnection();
      $req = $db->prepare("DELETE FROM commentaires where id_article=?");
      $req->execute(array($articleId));
    }

    public function getCommentsToModerate(){
      $db = $this->getConnection();
      $req = $db->prepare("SELECT * FROM commentaires WHERE reported = 1");
      $req->execute();
      return $req;
    }

    public function allowComment($commentId){
      $db = $this->getConnection();
      $req = $db->prepare("UPDATE commentaires SET reported = '0' WHERE id = ?");
      $req->execute(array($commentId));
    }

}