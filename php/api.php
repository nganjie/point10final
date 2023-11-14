<?php

use App\Controllers\AlertModification;
use Router\Router;
use App\Models\Forfait;
use App\Models\CommandeForfait;
use Database\DBConnection;

require  '../vendor/autoload.php';
//echo  "un monde de fous";
$post =$_POST;
if($post['query']=="forfait")
{
    $f =new Forfait(new DBConnection());
    $desc =$f->forfait();
    //echo $desc->description;
    //var_dump($f->forfait()[0]);
    print_r(json_encode($desc));
}
if($post['query']=="commande_forfait")
{
   
   $c =new CommandeForfait(new DBConnection());
   $desc =$c->create($post);
   //AlertModification::createModification()
   echo ($c->maxId()-1);
   
    //echo $desc->description;
    //var_dump($f->forfait()[0]);
    
}
if($post['query']=="verifie_valid_commande")
{
    $c =new CommandeForfait(new DBConnection());
    $q="SELECT id FROM commande_forfait WHERE forfait_id=40 AND numero_benefice=54555 ORDER BY id desc LIMIT 1
    ";
    $id=(int)$post['id_commande'];
    //echo $id;
    echo AlertModification::numeroModif($id);
}
?>