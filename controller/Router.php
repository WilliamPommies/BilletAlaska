<?php

$url = explode("?", $_SERVER['REQUEST_URI'])[0];
$router = json_decode(file_get_contents("./config/router.json"));

$routeFound = false;
foreach ($router as $routerAction => $targetFile)
{
    if ($routerAction === $url)
    {
        $routeFound = true;
        include_once($targetFile);
        break;
    }
}

if (!$routeFound)
{
    include_once("./View/404.php");
}
