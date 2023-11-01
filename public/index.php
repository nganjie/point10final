<?php
//require dirname(__DIR__).'/views/blog/contact.php';
use Router\Router;
require  '../vendor/autoload.php';
$router = new Router($_GET['url']);
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define("SCRIPTS", dirname($_SERVER['SCRIPT_NAME']) . '/');

$router->get('contacts', 'App\Controllers\BlogController@contact');
$router->get('admin/', 'App\Controllers\Admin\PostController@admin');
$router->get('admin/ajouter_forfait', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->get('admin/ajouter_forfait:valid', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->post('admin/enregistrer_forfait', 'App\Controllers\Admin\PostController@enregistrer_forfait'); 
$router->post('enregistrer_message_contact', 'App\Controllers\BlogController@enregistrer_message_contact'); 
$router->get('Accueil', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/', 'App\Controllers\BlogController@index');



try{
    $router->run();
}catch(NotFoundExecption $e)
{
   return $e->error404();
}


?>