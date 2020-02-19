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

    public function addComment($username, $commentaire, $id_article)
    {
      $db = $this->getConnection();
      $req = $db->prepare("INSERT INTO comments(username, commentaire, id_article) VALUES(?,?,?");
      $req->execute(array($username, $commentaire, $id_article));
    }

}