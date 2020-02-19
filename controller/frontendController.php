<?php
require_once('./model/chapter_manager.php');
require_once('./model/comment_manager.php');

class FrontendController
{

  public function home() {

    $articleShow = new Articles();

    $lastArticle = $articleShow->getLastArticle();
    $articles = $articleShow->getArticles();
    $lastArticleId = $lastArticle['id'];
    

    require('./view/front/home.php');
  
  }

  public function getArticle(){
    $articleShow = new Articles();
    
    $displayArticle = $articleShow->getArticle($_GET['id']);

    $commentManager = new Comments();

    $comments = $commentManager->getComments($_GET['id']);

    require('./view/front/displayArticle.php');
  }

  public function addComment($username, $commentaire, $id_article)
  {
    $commentManager = new Comments();
    $commentManager->addComment($username, $commentaire, $id_article);
  }

}