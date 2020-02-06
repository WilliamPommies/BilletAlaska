<?php
require_once('./model/chapter_manager.php');

class FrontendController
{

  public function home() {
    $articleShow = new Articles();
    $article = $articleShow->getLastArticle();
    $articleTitle= $article['title'];
    $articleContent = $article['content'];
    require('./view/front/lastArticle.php');
  }
  public function showLastArticle()
  {
 
  }

  public function showAllArticles()
  {
    $articleShow = new Articles();
    $article = $articleShow->getArticles();
    $articleId = $article['id'];
    for ($i = 0; $i < count($articleId); $i++){
        $articleTitle= $i['title'];
        $articleContent = $i['content'];
    }
    require("./view/front/indexAllArticles.php");
  }
}