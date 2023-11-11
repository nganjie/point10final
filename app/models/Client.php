<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";

use App\Controllers\Mail;
use App\Controllers\Securisation;
   class Client extends Model{
    protected $table='client';

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
      $utilisateur =new Utilisateur($this->db);
      $id =$utilisateur->create_uti($name,$number);
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
        $req=$pdo->prepare("SELECT * FROM client WHERE email=:mail");
        $req->bindValue("mail",$mail);
        $req->execute();
        $res=$req->fetch();
        var_dump($res);
        if($res)
        {
            if(password_verify($password,$res->password)){
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
       // $req->bindValue("password",$password);
    }
   }
 ?>