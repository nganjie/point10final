<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class Forfait extends Model{
    protected $table='forfait';

    public function create($post):bool
    {
      $secu =new Securisation();
      $forfait= $secu->securiser($post['forfait']);
      $nom =$secu->securiser($post['nom']);
      $description=$secu->securiser($post['description']);
      $taille =$secu->securiser($post['taille']);
      $prix=$secu->securiser($post['prix']);
      $pdo =$this->getDB()->getPDO();
      $req =$pdo->prepare("INSERT INTO forfait(nom,type,taille,description,prix) VALUES(:nom,:type,:t,:d,:p)");
      $r= $req->execute(array(
        "nom"=>$nom,
        "type"=>$forfait,
        "t"=>$taille,
        "d"=>$description,
        "p"=>$prix
      ));
      //echo $r;
      return true;
      
    }
   }
 ?>