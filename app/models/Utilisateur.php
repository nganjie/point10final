<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
use Database\DBConnection;
use App\Models\Messages;

   class Utilisateur extends Model{
    protected $table='utilisateur';
    protected $id;
    protected $nom;
    protected $numero;
    protected $user;
    protected $messages;

    public function __construct(DBConnection $db,int $id)
    {
      $this->db=$db;
      if($id!=-1)
      {
        $this->id=$id;
      $pdo=$this->db->getPDO();
      $req= $pdo->prepare("SELECT * FROM utilisateur WHERE id=:id");
      $req->execute(array(
        "id"=>$id
      ));
      $data =$req->fetch();
      $this->nom =$data->nom;
      $this->numero =$data->numero;
      $this->messages=new Messages($this->db,$this->id);
      $this->user=$data;
      }
      
    }
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
    public function create_uti($nom,$number):int
    {
        $secu =new Securisation();
        $nomt=$secu->securiser($nom);
        $numbert=$secu->securiser($number);
        //$mailt=$secu->securiser($mail);
        $pdo =$this->getDB()->getPDO();
        $req =$pdo->prepare("INSERT INTO utilisateur(nom,numero) VALUES(:nom,:numero)");
        $r= $req->execute(array(
          "nom"=>$nomt,
          "numero"=>$numbert
        ));
        return $this->maxId();
    }
    public function createMessage($post)
    {
      $this->messages->create($post);
    }
   }
 ?>