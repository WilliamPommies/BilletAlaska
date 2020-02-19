<?php
require_once('./model/chapter_manager.php');

class FrontendController
{

  public function home() {

    $articleShow = new Articles();

    $lastArticle = $articleShow->getLastArticle();
    $articles = $articleShow->getArticles();
    

    require('./view/front/home.php');
  
  }

  public function getArticle(){
    $articleShow = new Articles();
    
    $displayArticle = $articleShow->getArticle($_GET['id']);

    require('./view/front/displayArticle.php');
  }
}