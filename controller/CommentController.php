<?php
require_once('./model/comment_manager.php');

Class CommentController{

    //approve reported comment
    public function allowComment()
    {
        $commentShow = new Comments();
        $allowComment = $commentShow->allowComment($_GET['id']);
    }

    //delete reported comment
    public function deleteComment()
    {
        $commentShow = new Comments();
        $deleteComment = $commentShow->deleteComment($_GET['id']);
    }

    //report a comment
      public function signalComment()
    {
        $commentManager = new Comments();
        $commentManager->signalComment($_GET['id']);
    
    }  
}