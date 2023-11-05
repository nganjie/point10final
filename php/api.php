<?php 
use Router\Router;
use App\Models\Forfait;
use Database\DBConnection;

require  '../vendor/autoload.php';

$post =$_POST;
if($post['query']=="forfait")
{
    $f =new Forfait(new DBConnection());
    $desc =$f->forfait();
    //echo $desc->description;
    //var_dump($f->forfait()[0]);
    print_r(json_encode($desc));
}
?>