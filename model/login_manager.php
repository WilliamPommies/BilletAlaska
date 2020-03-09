<?php

require_once("model/query_manager.php");

class Login extends QueryManager
{
  public function connect ($username)
  {
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM users WHERE username =?");
    $req->execute(array($username));
    $identifiant = $req->fetch();
    return $identifiant;
  }
}