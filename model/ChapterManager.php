<?php

require_once("model/QueryManager.php");

class ChapterManager extends QueryManager
{
  public function getArticles()
  {
    $db = $this->getConnection();
    $req = $db->prepare('SELECT * FROM articles ORDER BY id');
    $req->execute();
    return $req;
  }

  public function getArticle($articleId)
  {
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM articles WHERE id =?");
    $req->execute(array($articleId));
    $article = $req->fetch();
    return $article;
  }

  public function getLastArticle()
  {
    $db = $this->getConnection();
    $req = $db->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 1");
    $req->execute();
    $article = $req->fetch();
    $req->closeCursor();
    return $article;
  }

  public function saveNewArticle($title,$article)
  {
    $db = $this->getConnection();
    $req = $db->prepare("INSERT INTO articles(title,content) VALUES(?,?)");
    $req->execute(array($title,$article));
  }

  public function updateArticle($title, $article, $articleId)
  {
    $db = $this->getConnection();
    $req = $db->prepare("UPDATE articles SET title =?, content = ? WHERE id=?");
    $req->execute(array($title, $article, $articleId));
  }

  public function deleteArticle($articleId)
  {
    $db = $this->getConnection();
    $req = $db->prepare("DELETE FROM articles WHERE id=?");
    $req->execute(array($articleId));
  }
}