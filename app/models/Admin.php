<?php
   namespace App\Models;
   //require "../Controllers/Securisation.php";

use App\Controllers\Mail;
use App\Controllers\Securisation;
use App\Models\Utilisateur;
use Database\DBConnection;
use DateTime;

   class Admin extends Utilisateur{
    protected $table='admin';
    public $id_admin;
    public $email;
    public $users=[];

    public function __construct(DBConnection $db,int $id,int $ida)
    {
        parent::__construct($db,$id);
        $this->id_admin=$ida;
        $pdo=$this->db->getPDO();
      $req= $pdo->prepare("SELECT * FROM admin WHERE id=:id");
      $req->execute(array(
        "id"=>$ida
      ));
      $data =$req->fetch();
      $this->email=$data->email;
    }
    public function cloturer($post)
    {
      $pdo =$this->db->getPDO();
      $id =$post['id_commande'];
      $motif =$post['motif'];
      $pdo =$this->db->getPDO();
      $date =new DateTime();
      $req =$pdo->prepare("INSERT INTO cloturer_commande(id_commande,date_cloture,decision,id_admin) VALUES(:id,:date_cloture,:decision,:id_admin)");
      $req->execute(array(
        "id"=>$id,
        "date_cloture"=>$date->format("Y-m-d H:i:s"),
        "decision"=>$motif,
        "id_admin"=>$this->id_admin
      ));
      
    }
    public function connexion($post):int
    {
        $secu =new Securisation();
        //var_dump($post);
        $mail=$secu->securiser($post['mail']);
        $password=$secu->securiser($post['password']);
        $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT c.id as id,id_utilisateur,email,password,nom,numero FROM admin c INNER JOIN utilisateur u ON u.id=c.id_utilisateur WHERE email=:mail");
        $req->bindValue("mail",$mail);
        $req->execute();
        $res=$req->fetch();
        //var_dump($res);
        if($res)
        {
            if($password==$res->password){
              session_start();
              $_SESSION["adm-id"] = $res->id;
              $_SESSION["adm-nom"] = $res->nom;
              $_SESSION["adm-password"] = $res->password;
              //$_SESSION["adm-ville"] = $res->ville;
              $_SESSION["adm-id_utilisateur"] = $res->id_utilisateur;
              $_SESSION["adm-email"] =$res->email;
              $_SESSION["adm-numero"] =$res->numero;
              $_SESSION["connecter"]=true;
              //echo "$res->id  et on a encore $res->id_utilisateur";
             
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
       // $req->bindValue("password",$password);
    }
    public function allUsers()
    {
      $pdo =$this->db->getPDO();
      $req=$pdo->prepare("SELECT id FROM utilisateur WHERE id in (SELECT id_utilisateur FROM client)");
      $req->execute();
      $data=$req->fetchAll();
      foreach($data as $us)
      {
        $this->users[]=new Client($this->db,$us->id);
      }
      
    }
    public function TemplateUsers()
    {
      $a="<ul>";
      foreach($this->users as $us)
      {
        $a.=$us->TemplateUsers();
      }
      $a.="</ul>";
      return $a;
    }
   }

?>