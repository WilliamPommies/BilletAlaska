<?php
require_once('./model/login.php');
require_once('./model/chapter_manager.php');
require_once('./model/comment_manager.php');

class backendController
{
    public function dashboard()
    { 
        if (isset($_SESSION['statut'])){
            if ($_SESSION['statut'] == 'admin'){
                $articleShow = new Articles;
                $articles = $articleShow->getArticles();
                $articleShow = new Comments;
                $reportedComments = $articleShow->getCommentsToModerate();
    
                require('./view/back/dashboard.php');
            } else {
                require("./view/front/home.php");
            }
        }       
    }
}