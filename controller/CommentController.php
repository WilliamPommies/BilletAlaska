<?php
require_once('./model/CommentManager.php');

Class CommentController{

    //approve reported comment
    public function allowComment()
    {
        $commentShow = new CommentManager();
        $allowComment = $commentShow->allowComment($_GET['id']);
    }

    //delete reported comment
    public function deleteComment()
    {
        $commentShow = new CommentManager();
        $deleteComment = $commentShow->deleteComment($_GET['id']);
    }

    //report a comment
      public function signalComment()
    {
        $commentManager = new CommentManager();
        $commentManager->signalComment($_GET['id']);
    
    }  
}