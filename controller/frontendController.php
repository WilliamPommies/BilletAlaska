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
    

    require_once('./view/front/home.php');
  
  }

  public function getArticle(){
    $articleShow = new Articles();
    
    $displayArticle = $articleShow->getArticle($_GET['id']);

    $commentManager = new Comments();

    $comments = $commentManager->getComments($_GET['id']);

    require_once('./view/front/displayArticle.php');
  }

  public function addComment($username, $comment, $id_article)
  {
    $commentManager = new Comments();
    $commentManager->addComment($username, $comment, $id_article);
  }


}