<?php
  
   namespace App\Models;
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
        "numero_p"=>$whatsap_number,
        "operateur_p"=>$operateur,
        "numero_transaction"=>$transaction_number,
        "date_commande"=>$date->format("Y-m-d H:i:s"),
        "idclient"=>$id_client,
        "forfait_id"=>$id_forfait
      ));
      //echo $id;
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