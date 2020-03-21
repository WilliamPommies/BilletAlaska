<?php
require_once('./model/chapter_manager.php');
require_once('./model/comment_manager.php');

class FrontOfficeController
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
    if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'commentForm'){
      $commentManager->addComment($_POST['username'], $_POST["comment"], $_GET['id']);
      header("location: /chapitre?id=" . $_GET['id']);
    }
    $comments = $commentManager->getComments($_GET['id']);

    require_once('./view/front/displayArticle.php');
  }

  public function signalComment()
  {
    $commentManager = new Comments();
    $commentManager->signalComment($_GET['id']);
    
  }

}