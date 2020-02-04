<?php

class Database
{
  public function __construct($filename)
  {
    $fileContent = file_get_contents($filename);
    $dbConfig = json_decode($fileContent);
    $this->host = $dbConfig->host;
    $this->username = $dbConfig->username;
    $this->password = $dbConfig->password;
    $this->dbname = $dbConfig->dbname;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function getUsername()
  {
    return $this->username;
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
