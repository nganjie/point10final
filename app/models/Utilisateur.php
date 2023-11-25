<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
use Database\DBConnection;
use App\Models\Messages;

   class Utilisateur extends Model{
    protected $table='utilisateur';
    public $id;
    public $nom;
    public $numero;
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
        
        $id =$this->maxIdTable("utilisateur");
        //$mailt=$secu->securiser($mail);
        $pdo =$this->getDB()->getPDO();
        $req =$pdo->prepare("INSERT INTO utilisateur(nom,numero) VALUES(:nom,:numero)");
        $r= $req->execute(array(
          "nom"=>$nomt,
          "numero"=>$numbert
        ));
        return $id+1;
    }
    public function createMessage($post,bool $send)
    {
      $this->messages->create($post,$send);
    }
    public function TemplateMessage(int $id)
    {
      $a="          <div class='content'>
      <div class='contact-profile'>
        <img src='../media/images/Sans titre.jpeg' alt='' />
        <p>{$this->nom}</p>
      </div>
       {$this->messages->TemplateMessages($id)}
      <div class='message-input'>
        <div class='wrap'>
          <input type='text' placeholder='Write your message...' />
          <button class='submit'>envoyer</button>
        </div>
      </div>
    </div>";
    }
   }
 ?>