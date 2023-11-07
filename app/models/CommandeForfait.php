<?php
  
   namespace App\Models;
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class CommandeForfait extends Model{
    protected $table='commande_forfait';

    public function create($post):bool
    {
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
     // $nom =$secu->securiser($post['nom']);
      $number=$secu->securiser($post['phone_number']);
      $wnumber =$secu->securiser($post['whatsapp_number']);
      $operateur =$secu->securiser($post['methode']);
      $wnumber =$secu->securiser($post['']);
      //$ville =$secu->securiser($post['ville']);
      $mail=$secu->securiser($post['email']);
      //$password =password_hash($post['password'],PASSWORD_DEFAULT);
      //$utilisateur =new Utilisateur($this->db);
    //  $id =$utilisateur->create_uti($name,$number);
      
      //echo $id;
      $pdo =$this->getDB()->getPDO();

      $req =$pdo->prepare("INSERT INTO commande_forfait(name,email,numero_benefice,numero_payement,operateur_payement,date_commande,idclient,client_id,forfait_id) VALUES(:name,:email,:numero_b,:numero_p,:operateur_p,:date_commande,:idclient,:client_id,:forfait_id)");
      $r= $req->execute(array(
        "name"=>$name,
        "email"=>$mail,
        "numero_b"=>$number,
        "numero_p"=>$wnumber,
        "operateur_p"=>$operateur,
        "date_commande"=>$date,
        "idclient"=>1,
        "client_id"=>1,
        "forfait_id"=>1
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