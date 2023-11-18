<?php
  
   namespace App\Models;

use App\Controllers\AlertModification;
use App\Models\SingleCommande;

use App\Controllers\Mail;
use DateTime;
//require "SingleCommande.php";
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class CommandeForfait extends Model{
    protected $table='commande_forfait';
    public $commandes_encours=[];
    public $commandes=[];


    public function maxId():int
    {
      $pdo =$this->db->getPDO();
      $req=$pdo->query("SELECT MAX(id) as id FROM commande_forfait");
      $res =$req->fetch();
      return $res->id;
    }
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
      AlertModification::createModification($this->maxId()+1,"commande");
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
    public function allCommandeEnCours(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT * FROM commande_forfait WHERE id NOT IN(SELECT c.id_commande from cloturer_commande c)");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      foreach($data as $tab)
      {
        $this->commandes_encours[]=new SingleCommande($tab);
      }
     // var_dump($this->commandes_encours);
    }
    public function allCommande(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT c.id,c.nom,c.email,c.numero_benefice,c.numero_payement,c.operateur_payement,c.numero_transaction,c.date_commande,c.date_cloture,c.idclient,c.forfait_id,cl.id as idc,cl.id_commande,cl.date_cloture,cl.decision,cl.id_admin FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id;");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      //var_dump($data);
      foreach($data as $tab)
      {
       // echo "un bonsoir<br>";
        $this->commandes[]=new SingleCommande($tab);
      }
      //var_dump($this->commandes);
    }
    public function cloturer($post)
    {
      $pdo =$this->db->getPDO();
      $id =$post['id'];
      $motif =$post['motif'];
      $id_commande=(int)$post["id_commande"];
      $id_admin =(int) $post['id_admin'];
      $date = new DateTime();
      $req=$pdo->prepare("INSERT INTO cloturer_commande(id_commande,date_cloture,decision,id_admin) VALUES(:id_commande,:date_cloture,:decision,:id_admin)");
      $req->execute(array(
        "id_commande"=>$id_commande,
        "date_cloture"=>$date->format("Y-m-d H:i:s"),
        "decision"=>$motif,
        "id_admin"=>$id_admin
      ));
      AlertModification::modifierCommande($id_commande);
      
    }
    public function TemplateCommande(){
      $tab ='';
      $tab.="<!-- Responsive Table Header Section -->
      <thead class='responsive-table__head'>
        <tr class='responsive-table__row'>
          <th
            class='responsive-table__head__title responsive-table__head__title--name'
          >
            Nom du forfait
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            Email
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Trans
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Payeur
          </th>
          <th
            class='responsive-table__head__title responsive-table__head__title--update'
          >
            Date
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Status
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Action
          </th>
        </tr>
      </thead>
      <!-- Responsive Table Body Section -->";
      foreach($this->commandes as $cd)
      {
        //echo "un monde de fous";
        //echo $cd->Template();
        $tab.=$cd->Template();
      }
      $tab.="<tbody class='responsive-table__body'>";
      $tab.="</tbody>";
      //echo $tab;
      //echo "un monde de merde ici bas";
      
      return $tab;
    }
   }
   
 ?>