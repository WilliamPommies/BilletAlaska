<?php
require_once('./model/login.php');
require_once('./model/chapter_manager.php');
require_once('./model/comment_manager.php');

class backendController
{
    public function login(){
        $login = new Login();

        require_once('./view/back/adminlogin.php');

    }

    public function dashboard()
    { 
        if(isset($_POST['login_checker']) && $_POST['login_checker'] == 'loginForm'){
            $login = new Login();
            $getUser = $login->getUsers();

            $articleShow = new Articles();
            $articles = $articleShow->getArticles();

            $commentShow = new Comments();
            $modComments = $commentShow->getCommentsToModerate();
            

            require_once('./view/back/dashboard.php');
        } else {
            header("location:/login");
        }
    }

    public function allowComment()
    {
        $commentShow = new Comments();
        $allowComment = $commentShow->allowComment($_GET['id']);
    }

    public function deleteComment()
    {
        $commentShow = new Comments();
        $allowComment = $commentShow->deleteComment($_GET['id']);
    }

    public function createArticle(){
        require_once('./view/back/newArticle.php');
    }

    public function previewAndUpArticle(){

        $articleShow = new Articles();
        if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'newArticleForm'){
            $articleShow->saveNewArticle($_POST['title'], $_POST["content"]);
        }
        
        require_once('./view/back/preview.php');
    }
}