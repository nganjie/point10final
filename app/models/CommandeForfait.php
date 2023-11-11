<?php
  
   namespace App\Models;

use App\Controllers\Mail;
use DateTime;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class CommandeForfait extends Model{
    protected $table='commande_forfait';

    public function create($post):bool
    {
      $date = new DateTime();
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
     // $nom =$secu->securiser($post['nom']);
      $number=(int)$secu->securiser($post['phone_number']);
      $pay_number =(int)$secu->securiser($post['pay_number']);
      $operateur =$secu->securiser($post['methode']);
      $whatsap_number =(int)$secu->securiser($post['whatsap-number']);
      $transaction_number=(int)$secu->securiser($post['transaction_number']);
      //$ville =$secu->securiser($post['ville']);
      $mail=$secu->securiser($post['email']);
      $id_forfait =(int)$secu->securiser($post['id_forfait']);
      $id_client =(int)$secu->securiser($post['id_client']);
      //$password =password_hash($post['password'],PASSWORD_DEFAULT);
      //$utilisateur =new Utilisateur($this->db);
    //  $id =$utilisateur->create_uti($name,$number);
      
      //echo $id;
      $pdo =$this->getDB()->getPDO();
      //var_dump($post);

      $req =$pdo->prepare("INSERT INTO commande_forfait(nom,email,numero_benefice,numero_payement,operateur_payement,numero_transaction,date_commande,idclient,forfait_id) VALUES(:nom,:email,:numero_b,:numero_p,:operateur_p,:numero_transaction,:date_commande,:idclient,:forfait_id)");
      $r= $req->execute(array(
        "nom"=>$name,
        "email"=>$mail,
        "numero_b"=>$number,
        "numero_p"=>$pay_number,
        "operateur_p"=>$operateur,
        "numero_transaction"=>$transaction_number,
        "date_commande"=>$date->format("Y-m-d H:i:s"),
        "idclient"=>$id_client,
        "forfait_id"=>$id_forfait
      ));
      //echo $id;
      $f =new SingleForfait($this->db,$id_forfait);
      $maile =new Mail("nouvelle commande de forfait");
      $content ="<h4 style='color:blue'>NOUVELLE COMMANDE DE FORFAIT ENREGISTRER</h4>
      <p>nom: <strong>{$name}</strong> </p>
      <p>numero de paiement : <strong>{$pay_number}</strong> </p>
      <p>numero à rechager : <strong>{$number}</strong> </p>
      <p>numero whatsapp du client : <strong>{$whatsap_number}</strong> </p>
      <p>numero de transaction : <strong>{$transaction_number}</strong> </p>
      <p>operateur : <strong>{$operateur}</strong> </p>
      <p>mail: <strong>{$mail}</strong> </p>
      <p>nom du forfait : <strong>{$f->nom}</strong> </p>
      <p>taille : <strong>{$f->taille}</strong> </p>
      <p>prix : <strong>{$f->prix}</strong> </p>
      ";
      $maile->systemEmail();
      $maile->htmlEmail($content);
      $maile->send();
      $maile_client =new Mail("point10recharge : commande en cour de traitement");
      $content ="<h4 style='color:blue'>commande en cour de traitement</h4>
      <p>Monsieur <strong>{$name}</strong> ,veiller patienté, Votre commande est en cour de traitement</p>
      <h5 style='color:aqua'>INFORMATION SUR LA COMMANDE</h5>
      <p>numero de paiement : <strong>{$pay_number}</strong> </p>
      <p>numero à rechager : <strong>{$number}</strong> </p>
      <p>numero whatsapp du client : <strong>{$whatsap_number}</strong> </p>
      <p>numero de transaction : <strong>{$transaction_number}</strong> </p>
      <p>operateur : <strong>{$operateur}</strong> </p>
      <p>nom du forfait : <strong>{$f->nom}</strong> </p>
      <p>taille : <strong>{$f->taille}</strong> </p>
      <p>prix : <strong>{$f->prix}</strong> </p>
      
      ";
      $maile_client->externalEmail($mail);
      $maile_client->htmlEmail($content);
      $maile_client->send();
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