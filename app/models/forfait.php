<?php
  
   namespace App\Models;
  // namespace App\Models\SingleForfait;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class Forfait extends Model{
    protected $table='forfait';
    protected $forfait;

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
    public function forfait()
    {
      $query ="SELECT f.id as id,c.nom,t.symbole as taille,type,description,nb_go,prix FROM forfait f INNER JOIN taille t ON t.id=f.taille INNER JOIN categorie c ON c.id=f.id_nom ORDER BY f.id DESC";
      $req=$this->db->getPDO()->query($query);
      return $req->fetchAll();
     return $tab=$this->all();
    }
    public function getForfait(int $id)
    {
      $req=$this->db->getPDO()->prepare("SELECT f.id as id,c.nom,t.symbole as taille,type,description,nb_go,prix FROM forfait f INNER JOIN taille t ON t.id=f.taille INNER JOIN categorie c ON c.id=f.id_nom  WHERE f.id=:id");
      $req->bindValue("id",$id);
      $req->execute();
      $forfait =$req->fetch();
      return $forfait;
    }
    public function AllForfait()
    {
      $query ="SELECT id FROM forfait";
      $req=$this->db->getPDO()->query($query);
      $req=$req->fetchAll();
      $f="";
      for($i=0;$i<count($req);$i++)
      {
        $f.=(new SingleForfait($this->db,$req[$i]->id))->TemplateCarousel();
      }
     // echo $f;
      return $f;
    }
    public function AllCategorie()
    {
      $query ="SELECT nom FROM categorie";
      $req=$this->db->getPDO()->query($query);
      $req=$req->fetchAll();
      return $req;
    }
   }
 ?>