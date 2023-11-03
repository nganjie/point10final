<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class Forfait extends Model{
    protected $table='forfait';

    public function create($post):bool
    {
      $secu =new Securisation();
      $categorie= $secu->securiser($post['categorie']);
     // $nom =$secu->securiser($post['nom']);
      $description=$secu->securiser($post['description']);
      $taille =$secu->securiser($post['taille']);
      $prix=$secu->securiser($post['prix']);
      $nb_go =$secu->securiser($post['nb_go']);
      $pdo =$this->getDB()->getPDO();
      $req =$pdo->prepare("INSERT INTO forfait(id_nom,type,taille,description,nb_go,prix) VALUES(:id_nom,:type,:taille,:description,:nb_go,:prix)");
      $r= $req->execute(array(
        "id_nom"=>$categorie,
        "type"=>'blue',
        "taille"=>$taille,
        "description"=>$description,
        "nb_go"=>$nb_go,
        "prix"=>$prix
      ));
      //echo $r;
      return true;
      
    }
   }
 ?>