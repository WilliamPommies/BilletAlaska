<?php

require_once("model/query_manager.php");

class Users extends QueryManager
{
  public function getUsers()
  {
    $db = $this->getConnection();
    $req = $db->prepare('SELECT * FROM users ORDER BY id');
    $req->execute();
    return $req;
  }

  public function getUser($userId)
  {
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM articles WHERE id =?");
    $req->execute(array($userId));
    $user = $req->fetch();
    return $user;
  }
}