<?php

class Database
{
  public function __construct($filename)
  {
    $fileContent = file_get_contents($filename);
    $dbConfig = json_decode($fileContent);
    $this->host = $dbConfig->host;
    $this->user = $dbConfig->user;
    $this->password = $dbConfig->password;
    $this->dbname = $dbConfig->dbname;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getDbname()
  {
    return $this->dbname;
  }
}
