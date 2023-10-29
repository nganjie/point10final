<!DOCTYPE html>
<?php
use Router\Router;
 require "../vendor/autoload.php";
 $router =new Router($_GET['url']);
 $router->get('/','App\Controllers\BlogController@index');
 $router->get('/posts/:id','App\Controllers\BlogController@show');
 

 $router->run();


 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>