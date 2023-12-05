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
   echo ($c->maxId());
   
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
if($post['query']=="modalvue")
{
    $id =(int)($_POST['id']);
    //echo "un autre monde ici ";
    $t="SELECT
    c.id,c.nom,ca.nom as nom_categorie,email,numero_benefice,numero_payement,operateur_payement,numero_transaction,date_commande,date_cloture,idclient,forfait_id,f.id as id_f,id_nom,type,t.symbole as taille,description,prix,nb_go FROM commande_forfait c INNER JOIN forfait f ON f.id=c.forfait_id INNER JOIN taille t ON t.id=f.taille INNER JOIN categorie ca ON ca.id=f.id_nom  WHERE c.id=:id";
    $pdo=(new DBConnection())->getPDO();
    $req =$pdo->prepare($t);
    $req->execute(array(
        "id"=>$id
    ));
    $data =$req->fetch();
    print_r(json_encode($data));
}

if($post['query']=="validercommande")
{
    $id =(int)($_POST['id']);
    //echo "un autre monde ici ";
    $cd =new CommandeForfait(new DBConnection());
    $cd->cloturer($post);
    $tab =array(
        "etat"=>1
    );
    print_r(json_encode($tab));
}
if($post['query']=="messagecontact")
{
    $id =(int)($_POST['id']);
    //echo "un autre monde ici "
    $db =new DBConnection();
    $pdo =$db->getPDO();
    $req =$pdo->prepare("SELECT * FROM message_contact WHERE id=:id");
    $req->execute(array(
        "id"=>$id
    ));
    $data=$req->fetch();
    print_r(json_encode($data));
}
if($post['query']=="notification")
{
    $nb =AlertModification::checkNewCommande();
    $data=array(
        "nb_commande"=>$nb
    );
    print_r(json_encode($data));
}

?>