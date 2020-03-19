<?php
require_once('./model/login_manager.php');
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
            $username = $_POST['username'];
            $password = $_POST['password'];
            $getUsers = new Login();
            $identifiant = $getUsers->connect($username);
            if (md5($password) == $identifiant[2]) {
                $_SESSION['statut'] = 'admin';

                $articleShow = new Articles();
                $articles = $articleShow->getArticles();
    
                $commentShow = new Comments();
                $modComments = $commentShow->getCommentsToModerate();
                
    
                require_once('./view/back/dashboard.php');
            } elseif (md5($password) != $identifiant[2]) {
                  header("location:/login");
            }
        } elseif($_SESSION && $_SESSION['statut'] == 'admin') {
            $articleShow = new Articles();
            $articles = $articleShow->getArticles();

            $commentShow = new Comments();
            $modComments = $commentShow->getCommentsToModerate();
            

            require_once('./view/back/dashboard.php');
        } else {
            header('Location: /');
            exit();
        }
    } 

    public function disconnect(){
        session_destroy();
        header('Location: /');
        exit();
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
            // $commentShow = new Comments();
            // $deleteComments = $commentShow->deleteArticleComment($_GET['id']);
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