<?php

require_once("model/QueryManager.php");

class LoginManager extends QueryManager
{
  public function connect ($username)
  {
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM users WHERE username =?");
    $req->execute(array($username));
    $identifiant = $req->fetch();
    return $identifiant;
  }

  public function getUsername($userId){
    $db = $this->getConnection();
    $req = $db->prepare("SELECT username FROM users WHERE id =?");
    $req->execute(array($userId));
    $username = $req->fetch();
    return $username;
  }

  public function createUser($username, $password){
    $db = $this->getConnection();
    $req = $db->prepare("INSERT INTO users(username, password) VALUES(?,?)");
    $req->execute(array($username, $password));
  }
}