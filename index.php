<?php
$request_url = $_SERVER["REQUEST_URI"];


$index = function(){
    echo "Go to index-page.";
};

$login = function(){
    echo "Go to login-page.";
};

$http_404 = function(){
    echo "404: Not found.";
};

$routes=[];

$routes['/']=$index;
$routes['login']=$login;

foreach($routes as $route => $action)
{
    $regex="~^$route/?$~i";
    echo $request_url." - ".$regex."<br>";
    if(!preg_match($regex, $request_url))
    {
        echo "Passt nicht.";
        continue;
    }
    if(!is_callable($action))
    {
        return call_user_func($http_404);
    }
    return call_user_func($action);
}
return call_user_func($http_404);

echo date();
?>