<?php
require_once('./model/comment_manager.php');

Class CommentController{

    public function getComments(){

        $commentManager = new Comments();

        if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'commentForm'){
        $commentManager->addComment($_POST['username'], $_POST["comment"], $_GET['id']);
        header("location: /chapitre?id=" . $_GET['id']);
        }
        $comments = $commentManager->getComments($_GET['id']);

        require_once('./view/front/displayArticle.php');
    }
    public function allowComment()
    {
        $commentShow = new Comments();
        $allowComment = $commentShow->allowComment($_GET['id']);
    }

    public function deleteComment()
    {
        $commentShow = new Comments();
        $deleteComment = $commentShow->deleteComment($_GET['id']);
    }

      public function signalComment()
    {
        $commentManager = new Comments();
        $commentManager->signalComment($_GET['id']);
    
    }  
}