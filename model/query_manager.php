<?php
require_once('model/database.php');

abstract class QueryManager
{
  protected static $connection = NULL;

  public function __construct()
  {
    $filename = "./config/db.json";
    $database = new Database($filename);
    $this->user = $database->getUser();
    $this->host = $database->getHost();
    $this->password = $database->getPassword();
    $this->dbname = $database->getDbname();
    if (self::$connection == NULL){
      self::$connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', ''.$this->user.'', ''.$this->password.'');
    }
  }

  public function getConnection()
  {
    return self::$connection;
  }
}