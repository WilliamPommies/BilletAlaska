<?php
require_once('./model/LoginManager.php');

Class UserController{
    
    //Display login page
    public function login(){
        $login = new LoginManager();

        require_once('./view/back/adminlogin.php');

    }

    public function dashboard()
    { 
        require_once('./model/ChapterManager.php');
        require_once('./model/CommentManager.php');

        //verify login information
        if(isset($_POST['login_checker']) && $_POST['login_checker'] == 'loginForm'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $getUsers = new LoginManager();
            $identifiant = $getUsers->connect($username);
            //if password match gives user an admin statut and show dashboard
            if (md5($password) == $identifiant[2]) {
                $_SESSION['statut'] = 'admin';

                $articleShow = new ChapterManager();
                $articles = $articleShow->getArticles();
    
                $commentShow = new CommentManager();
                $modComments = $commentShow->getCommentsToModerate();
                
    
                require_once('./view/back/dashboard.php');
            } 
            // if password doesn't match refresh the login page
            elseif (md5($password) != $identifiant[2]) {
                  header("location:/login");
            }
        } 
        // if user already an admin, show the dashboard
        elseif($_SESSION && $_SESSION['statut'] == 'admin') {
            $articleShow = new ChapterManager();
            $articles = $articleShow->getArticles();

            $commentShow = new CommentManager();
            $modComments = $commentShow->getCommentsToModerate();
        
            require_once('./view/back/dashboard.php');
        } 
        
        //if user isn't admin and tries to reach dashboard using url -> redirect to home
        else {
            header('Location: /');
            exit();
        }
    } 

    public function newUser(){
        //if user is an admin allow him to reach the create user page
        if($_SESSION && $_SESSION['statut']== 'admin'){
            require_once('./view/back/newUserForm.php');
        } else {
            // if user not redirect to home
            header('location:/');
        }
        
    }

    public function createUser(){
        // if user and form complete insert new user into table
        if($_SESSION && $_SESSION['statut']== 'admin'){
            $userShow = new LoginManager();
            if(isset($_POST['form_checker']) && $_POST['form_checker'] == 'newUserForm'){
                $username = $_POST['username'];
                //insert a md5 hashed password
                $password = md5($_POST['password']);
                $newUser = $userShow->createUser($username, $password);
            } 
            header("location:/dashboard");
        } else {
          // if not redirect to home
          header('location:/');
        }
    }

    //allow admin to disconnect, redirect to home
    public function disconnect(){
        session_destroy();
        header('Location: /');
        exit();
    }
}