<?php
require_once('./model/chapter_manager.php');

Class ChapterController 
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

        require_once('./model/comment_manager.php');
        $commentManager = new Comments();
        
        if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'commentForm'){
        $commentManager->addComment($_POST['username'], $_POST["comment"], $_GET['id']);
        header("location: /chapitre?id=" . $_GET['id']);
        }
        $comments = $commentManager->getComments($_GET['id']);
        require_once('./view/front/displayArticle.php');
      }
    
      public function createArticle()
      {
          if($_SESSION && $_SESSION['statut']== 'admin'){
              require_once('./view/back/newArticle.php');
          } else {
              header('location:/');
          }
          
      }
  
      public function previewAndUpArticle()
      {
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new Articles();
              if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'newArticleForm'){
                  $newArticle = $articleShow->saveNewArticle($_POST['title'], $_POST["content"]);
              }
              
              require_once('./view/back/preview.php');
          } else {
              header('location:/');
          }
      }
  
      public function deleteArticle()
      {
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new Articles();
              $deleteArticle = $articleShow->deleteArticle($_GET['id']);
              
          } else {
              header('location:/');
          }
      }
  
      public function modifyArticle(){
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new Articles();
              $displayArticle = $articleShow->getArticle($_GET['id']);
  
              require_once("./view/back/updateArticle.php");
          } else {
              header('location:/');
          }
      }
  
      public function updateArticle()
      {
          if($_SESSION && $_SESSION['statut']== 'admin'){
              if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'updateForm'){
                  $articleShow = new Articles();
                  $articleId = $_GET['id'];
                  $title = $_POST['title'];
                  $article = $_POST["content"];
                  $articleShow->updateArticle($title, $article, $articleId);
                  header('location: /chapitre?id='. $_GET['id']);
              }
              
          } else {
              header('location:/');
          }
      }
}