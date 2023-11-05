<?php
//require dirname(__DIR__).'/views/blog/contact.php';
use Router\Router;


require  '../vendor/autoload.php';
$router = new Router($_GET['url']);
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define("SCRIPTS", dirname($_SERVER['SCRIPT_NAME']) . '/');

$password ="toto";
$hash=password_hash($password,PASSWORD_DEFAULT);

//echo $desc->description;
//var_dump($f->forfait()[0]);
//print_r(json_encode($desc));
//var_dump($hash);

$router->get('contacts', 'App\Controllers\BlogController@contact');
$router->get('admin/', 'App\Controllers\Admin\PostController@admin');
$router->get('admin/ajouter_forfait', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->get('admin/ajouter_forfait:valid', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->post('admin/enregistrer_forfait', 'App\Controllers\Admin\PostController@enregistrer_forfait'); 
$router->post('enregistrer_message_contact', 'App\Controllers\BlogController@enregistrer_message_contact');

$router->post('creation_compte', 'App\Controllers\BlogController@creation_compte');
$router->post('connexion_client', 'App\Controllers\BlogController@connexion_client');
$router->get('se-connecter', 'App\Controllers\BlogController@se_connecter');
$router->get('se-connecter:result', 'App\Controllers\BlogController@se_connecter');
$router->get('creer-compte', 'App\Controllers\BlogController@creer_compte');
$router->get('Accueil', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/', 'App\Controllers\BlogController@index');
$router->get('index.php', 'App\Controllers\BlogController@index');
$router->get('forfait', 'App\Controllers\BlogController@forfait');



try{
    $router->run();
}catch(NotFoundExecption $e)
{
   return $e->error404();
}


?>