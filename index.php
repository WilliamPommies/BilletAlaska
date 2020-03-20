<?php 


try{
    session_start();
    require('./controller/Router.php');
}
catch(Exception $e){
    print_r($e);
}