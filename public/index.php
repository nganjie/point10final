<?php
//require dirname(__DIR__).'/views/blog/contact.php';

use App\Controllers\Mail;
use Router\Router;


require  '../vendor/autoload.php';
$router = new Router($_GET['url']);
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define("SCRIPTS", dirname($_SERVER['SCRIPT_NAME']) . '/');

$password ="toto";
$hash=password_hash($password,PASSWORD_DEFAULT);
/*$maile =new Mail("nouveau compte client");
$content ="<h1 style='color:blue'>NOUVEAU CLIENT ENREGISTRER</h1>
<p>nom: <strong>{name}</strong> </p>
<p>ville: <strong>{ville}</strong> </p>
<p>numero: <strong>{number}</strong> </p>
<p>mail: <strong>{mail}</strong> </p>
";
$maile->systemEmail();
$maile->htmlEmail($content);
$maile->send();*/
/*ob_start();
 require "../php/template_facture.php";
 $content=ob_get_clean();
$mail =new Mail("nganjienzatsi@gmail.com"," html test App ");
//$mail->htmlEmail($content);
$mail->simpleEmail("un autre message de bienvenue");
$res =$mail->send();
$info =$res?" message envoyer ":"message non envoyer";*/
//echo $info;


//echo $desc->description;
//var_dump($f->forfait()[0]);
//print_r(json_encode($desc));
//var_dump($hash);

$router->get('contacts', 'App\Controllers\BlogController@contact');
$router->get('admin/dashbord', 'App\Controllers\Admin\PostController@admin');
$router->get('admin/commandes', 'App\Controllers\Admin\PostController@commandes');
$router->get('admin/ajouter_forfait', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->get('admin/ajouter_forfait:valid', 'App\Controllers\Admin\PostController@ajouter_forfait'); 
$router->get('admin/messages', 'App\Controllers\Admin\PostController@messages');
$router->get('admin/messages/:id', 'App\Controllers\Admin\PostController@messages_id'); 
$router->post('admin/enregistrer_forfait', 'App\Controllers\Admin\PostController@enregistrer_forfait'); 
$router->post('enregistrer_message_contact', 'App\Controllers\BlogController@enregistrer_message_contact');
$router->post('admin/messages/:id', 'App\Controllers\Admin\PostController@messages_create'); 

$router->post('creation_compte', 'App\Controllers\BlogController@creation_compte');
$router->post('connexion_client', 'App\Controllers\BlogController@connexion_client');
$router->post('facture', 'App\Controllers\BlogController@facture');
$router->get('se-connecter', 'App\Controllers\BlogController@se_connecter');
$router->get('se-connecter:result', 'App\Controllers\BlogController@se_connecter');
$router->get('creer-compte', 'App\Controllers\BlogController@creer_compte');
$router->get('Accueil', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->get('/', 'App\Controllers\BlogController@index');
$router->get('index.php', 'App\Controllers\BlogController@index');
$router->get('/show/:id', 'App\Controllers\BlogController@show');
$router->get('forfait', 'App\Controllers\BlogController@forfait');
$router->get('/details-forfait/:id', 'App\Controllers\BlogController@details_forfait');
$router->get('/validation-forfait/:id', 'App\Controllers\BlogController@validation_forfait');






$router->run();



?>