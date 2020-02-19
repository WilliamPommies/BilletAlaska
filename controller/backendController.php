<?php
require_once('./model/login.php');

class backendController
{
    public function connection(){

        require_once('./view/back/adminlogin.php');
    }

    public function verification(){
        $userLogin = new Users();
        $user = $userLogin->getUsers("username");
        $userpswd = $userLogin->getUsers("password");

        require_once('./view/back/verify.php');
    }

    public function dashboard(){

        require_once('./view/back/dashboard.php');

    }
}