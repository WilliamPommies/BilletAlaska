  
<?php

require_once("./model/query_manager.php");

class Login extends QueryManager
{
  public function verifyLogin($userIds)
  {
    $usernameLogin = $userIds['username'];
    $passwordLogin = md5($userIds['password']);
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM users WHERE username =?");
    $req->execute(array($usernameLogin));
    $identifiant = $req->fetch();
    if ($passwordLogin == $identifiant[2]) {
      $_SESSION['statut'] = 'admin';
    }
  }
}