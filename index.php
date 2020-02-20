<?php 

require('./controller/Router.php');

session_start();

require("./controller/frontendController.php");
require_once("./controller/backendController.php");

$frontendController = new FrontendController();
$backendController = new BackendController();

if (isset($_GET['action']))
{

    if ($_GET['action'] == 'addComment')
    {
        $frontendController->addComment($_POST['username'], $_POST['comment'], $_GET['id']);
        echo $_GET['id'];
        echo $_POST['comment'];
        echo $_POST['username'];
    } 
}