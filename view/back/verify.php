<?php

if($user == "William" && $userpswd == "JsWd1990"){
    header("location:./view/back/admindashboard.php");
    exit();
} else {
    header("location:/");
    exit();
};