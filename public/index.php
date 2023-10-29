
<?php
use Router\Router;
 require "../vendor/autoload.php";
 $router =new Router($_GET['url']);
 define('VIEWS',dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);
 define("SCRIPTS",dirname($_SERVER['SCRIPT_NAME']).'/');
 
 $router->get('contacts','App\Controllers\BlogController@contact');
 $router->get('test','App\Controllers\BlogController@test');
 $router->get('Accueil','App\Controllers\BlogController@index');
 $router->get('/posts/:id','App\Controllers\BlogController@show');
 $router->get('/','App\Controllers\BlogController@index');

 

 $router->run();


 ?>
