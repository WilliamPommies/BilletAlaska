<?php
require_once('./model/login_manager.php');

Class UserController{
    public function login(){
        $login = new Login();

        require_once('./view/back/adminlogin.php');

    }

    public function dashboard()
    { 
        require_once('./model/chapter_manager.php');
        require_once('./model/comment_manager.php');
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
}