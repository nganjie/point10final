<?php
  
   namespace App\Models;
   use App\Controllers\Securisation;
   use DateTime;
   use App\Models\SingleMessageContact;
   class MessageContact extends Model{
    protected $table='message_contact';
    public $messages;
    public function create($post):bool
    {
      $date = new DateTime();
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
      $number =$secu->securiser($post['number']);
      $email=$secu->securiser($post['email']);
      $message =$secu->securiser($post['message']);
      $pdo =$this->getDB()->getPDO();
      $req =$pdo->prepare("INSERT INTO message_contact(nom,numero,email,content,date) VALUES(:nom,:numero,:email,:content,:date)");
      $r= $req->execute(array(
        "nom"=>$name,
        "numero"=>$number,
        "email"=>$email,
        "content"=>$message,
        "date"=>$date->format("Y-m-d H:i:s")
      ));
      //echo $r;
      return true;
    }
    public function allMessageContact(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT * FROM message_contact ");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      foreach($data as $tab)
      {
        $this->messages[]=new SingleMessageContact($tab);
      }
      var_dump($this->messages);
    }
   }
 ?>