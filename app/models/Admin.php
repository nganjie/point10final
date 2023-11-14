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
   }

?>