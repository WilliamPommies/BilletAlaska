  
<?php

require_once("./model/query_manager.php");

class Login extends QueryManager
{
  public function getUsers()
  {  
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM users WHERE username =?");
    $req->execute();
    $users = $req->fetch();
    $req->closeCursor();
    return $users;

  }
}