<?php
require_once('./model/ChapterManager.php');

Class ChapterController 
{
    //Display Homepage
    public function home() {

        $articleShow = new ChapterManager();
    
        $lastArticle = $articleShow->getLastArticle();
        $articles = $articleShow->getArticles();
        $lastArticleId = $lastArticle['id'];
        
    
        require_once('./view/front/home.php');
      
      }

      //Display each article and related comments
      public function getArticle(){

        //fetch article
        $articleShow = new ChapterManager();
        $displayArticle = $articleShow->getArticle($_GET['id']);

        require_once('./model/CommentManager.php');
        $commentManager = new CommentManager();
       
        
        //create comment linked to Article
        if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'commentForm'){
        $commentManager->addComment($_POST['username'], $_POST["comment"], $_GET['id']);
        header("location: /chapitre?id=" . $_GET['id']);
        }
        //fetch related comments
        $comments = $commentManager->getComments($_GET['id']);

        require_once('./model/LoginManager.php');
        $userShow = new LoginManager();
        $authorUsername = $userShow->getUsername($displayArticle[3]);

        require_once('./view/front/displayArticle.php');
      }
    
      public function createArticle()
      {
          //if user is an admin, allow to reach the page to create an article
          if($_SESSION && $_SESSION['statut']== 'admin'){
              require_once('./view/back/newArticle.php');
          } else {
              // if user not redirect to home
              header('location:/');
          }
          
      }
  
      public function previewAndUpArticle()
      {
          // if user is an admin allow to preview and insert article into table
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new ChapterManager();
              if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'newArticleForm'){
                  $newArticle = $articleShow->saveNewArticle($_POST['title'], $_POST["content"]);
              } 
              require_once('./view/back/preview.php');
          } else {
            // if not redirect to home
            header('location:/');
          }
      }
  
      public function deleteArticle()
      {
          //If user is an admin, allow to delete article from table
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new ChapterManager();
              $deleteArticle = $articleShow->deleteArticle($_GET['id']);
              
          } else {
              //if not redirect to home
              header('location:/');
          }
      }
  
      public function modifyArticle(){
          //if user is an admin, allow to reach the article update page
          if($_SESSION && $_SESSION['statut']== 'admin'){
              $articleShow = new ChapterManager();
              $displayArticle = $articleShow->getArticle($_GET['id']);
  
              require_once("./view/back/updateArticle.php");
          } else {
              //if not redirect to home
              header('location:/');
          }
      }
  
      public function updateArticle()
      { 
          //if user is an admin allow to update an article
          if($_SESSION && $_SESSION['statut']== 'admin'){
              if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'updateForm'){
                  $articleShow = new ChapterManager();
                  $articleId = $_GET['id'];
                  $title = $_POST['title'];
                  $article = $_POST["content"];
                  $articleShow->updateArticle($title, $article, $articleId);
                  header('location: /chapitre?id='. $_GET['id']);
              }
          } else {
              //if not redirect to home
              header('location:/');
          }
      }
}