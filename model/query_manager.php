<?php
require_once('model/database.php');

class QueryManager
{
  public function __construct()
  {
    $filename = "config/dbconfig.json";
    $database = new Database($filename);
    $this->username = $database->getUsername();
    $this->host = $database->getHost();
    $this->password = $database->getPassword();
    $this->dbname = $database->getDbname();
  }

  public function dbConnect()
  {
    $db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', $this->username, $this->password);
    return $db;
  }
}