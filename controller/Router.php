<?php
// récupère l'URL sans ce qu'il y a après le "?"
    $url = explode("?", $_SERVER['REQUEST_URI'])[0];
    $router = json_decode(file_get_contents("./config/router.json"));
    
    $routeFound = false;
    foreach ($router as $route => $target)
    {
        if ($route === $url)
        {
            $routeFound = true;
            $action = explode("::", $target);
            include_once($action[0]);
            $exploded = explode(":", $action[1]);
            $controller = new $exploded[0]();
            [$controller,$exploded[1]]();
            break;
        }
    }
    
    if (!$routeFound)
    {
        include_once("./view/404.php");
    }


