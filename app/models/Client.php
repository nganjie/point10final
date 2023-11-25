<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";

use App\Controllers\Mail;
use App\Controllers\Securisation;
use App\Models\Utilisateur;
   class Client extends Utilisateur{
    protected $table='client';
    public $ville;
    public $id_client;
    public $email;
    public $commandes;
    public $commandes_art;
    public $commande_r;
    public $commandeForfait;

    public function setInfo($id,$ville,$email)
    {
      $this->id_client=$id;
      $this->ville=$ville;
      $this->email=$email;
      $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT COUNT(id) as nombre FROM commande_forfait WHERE idclient=:idc AND id not in(SELECT id_commande FROM cloturer_commande)");
        $req->bindValue('idc',$id);
        $req->execute();
        $res=$req->fetch();
        $this->commandes_art=$res->nombre;
        $req=$pdo->prepare("SELECT COUNT(id) as nombre FROM commande_forfait WHERE idclient=$id");
        $req->bindValue('idc',$id);
        $req->execute();
        $res=$req->fetch();
        $this->commandes=$res->nombre;
        $req=$pdo->prepare("SELECT COUNT(id) as nombre FROM commande_forfait WHERE idclient=$id AND id in(SELECT id_commande FROM cloturer_commande)");
        $req->bindValue('idc',$id);
        $req->execute();
        $res=$req->fetch();
        $this->commande_r=$res->nombre;
        $this->commandeForfait =new CommandeForfait($this->db);
        $this->commandeForfait->allCommandeUser($this->id_client);


    }

    public function create($post):bool
    {
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
     // $nom =$secu->securiser($post['nom']);
      $number=$secu->securiser($post['number']);
      $ville =$secu->securiser($post['ville']);
      $mail=$secu->securiser($post['mail']);
      $password =password_hash($post['password'],PASSWORD_DEFAULT);
      
      
      //echo $id;
      $pdo =$this->getDB()->getPDO();
      $verif=$pdo->prepare('SELECT * FROM client WHERE email=:mail');
      $verif->bindValue('mail',$mail);
      //var_dump($verif);
      //$res =$verif->execute(array(
      //  "mail"=>$mail
      //));
     $verif->execute();
     $res =$verif->fetch();
      //var_dump($res);
    
      if($verif->fetch())
      {
        var_dump($verif);
        return false;
      }
      //$utilisateur =new Utilisateur($this->db,-1);
      $id =$this->create_uti($name,$number);
      $req =$pdo->prepare("INSERT INTO client(id_utilisateur,ville,email,password) VALUES(:id_utilisateur,:ville,:email,:password)");
      $r= $req->execute(array(
        "id_utilisateur"=>$id,
        "ville"=>$ville,
        "email"=>$mail,
        "password"=>$password
      ));
      //echo $id;
      $maile =new Mail("nouveau compte client");
      $content ="<h4 style='color:blue'>NOUVEAU CLIENT ENREGISTRER</h4>
      <p>id: <strong>{$id}</strong> </p>
      <p>nom: <strong>{$name}</strong> </p>
      <p>ville: <strong>{$ville}</strong> </p>
      <p>numero: <strong>{$number}</strong> </p>
      <p>mail: <strong>{$mail}</strong> </p>
      ";
      $maile->systemEmail();
      $maile->htmlEmail($content);
      $maile->send();
      return true;
      
    }
    public function connexion($post):int
    {
        $secu =new Securisation();
        $mail=$secu->securiser($post['mail']);
        $password=$secu->securiser($post['password']);
        $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT c.id as id,id_utilisateur,ville,email,password,nom,numero FROM client c INNER JOIN utilisateur u ON u.id=c.id_utilisateur WHERE email=:mail");
        $req->bindValue("mail",$mail);
        $req->execute();
        $res=$req->fetch();
        //var_dump($res);
        if($res)
        {
            if(password_verify($password,$res->password)){
              session_start();
              $_SESSION["id"] = $res->id;
              $_SESSION["nom"] = $res->nom;
              $_SESSION["password"] = $res->password;
              $_SESSION["ville"] = $res->ville;
              $_SESSION["id_utilisateur"] = $res->id_utilisateur;
              $_SESSION["email"] =$res->email;
              $_SESSION["numero"] =$res->numero;
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
    public function commandes()
    {
      $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT u.id,id_utilisateur,ville,email,password,nom,numero FROM client c INNER JOIN utilisateur u ON u.id=c.id_utilisateur WHERE email=:mail");
        $req->bindValue("mail",'');
        $req->execute();
        $res=$req->fetch();
    }
    public function sendMessage($post,bool $send)
    {
      $id =$post['id'];
      $ms =new Messages($this->db,$id);
      $ms->create($post,$send);
    }
    public function TemplateUsers()
    {
      $a="<li class='contact'>
      <div class='wrap'>
        <img src='/point10final/public/../media/images/Sans titre.jpeg' alt='' />
        <div class='meta'>
         <a href='/point10final/admin/messages/{$this->id}'> <p class='name'>{$this->nom}</p></a>
        </div>
      </div>
    </li>";
    return $a;
    }
   }
 ?>