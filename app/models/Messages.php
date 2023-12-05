<?php

namespace App\Models;

use App\Controllers\Mail;
use Database\DBConnection;
use App\Models\SingleMessage;
use DateTime;
class Messages extends Model{
    protected $table="message";
    public $messages=[];
    public $id;
    public function __construct(DBConnection $db,int $id)
    {
        $this->db=$db;
        $this->id=(int)$id;
    }
    public function create($post,bool $send){
        $content =$post['message'];
        $id_rec=(int)$post['id_rec'];
        $date =new DateTime();
        $pdo =$this->db->getPDO();
        //echo "on voit un peu $this->id et $id_rec";
        $req =$pdo->prepare("INSERT INTO message(contents,date_emis,etat,Rec_id,Env_id) VALUES(:contents,:date_emis,:etat,:Rec_id,:env)");
        $req->execute(array(
            "contents"=>$content,
            "date_emis"=>$date->format("Y-m-d H:i:s"),
            ":etat"=>0,
            ":Rec_id"=>$id_rec,
            ":env"=>$this->id
        ));
        if($send)
        {
          //$mail =new Mail("");
          $maile =new Mail("Nouveau Message D'un client");
      $content ="<h4 style='color:blue'>NOUVEAU Message D'un CLIENT De point10recharge</h4>
      <p>nom: <strong>{$post['nom']}</strong> </p>
      <p>ville: <strong>{$post['ville']}</strong> </p>
      <p>numero: <strong>{$post['numero']}</strong> </p>
      <p>mail: <strong>{$post['mail']}</strong> </p>
      <p>message :</p>
      <p>{$post['message']}</p>
      ";
      $maile->systemEmail();
      $maile->htmlEmail($content);
      $maile->send();
        }
        
    }
    static function nbMessage(){
       $db=new DBConnection();
       $pdo=$db->getPDO();
      $req =$pdo->prepare("SELECT COUNT(id) as nb FROM message");
      $req->execute();
    $data=$req->fetch();
    return  $data->nb;
    }
    static function nbDiscussion(){
      $db=new DBConnection();
       $pdo=$db->getPDO();
      $req =$pdo->prepare("SELECT COUNT(c.id) as nb FROM client c WHERE id_utilisateur in (SELECT Env_id FROM message)");
      $req->execute();
    $data=$req->fetch();
    return  $data->nb;
    }

    public function allMessages(){
        $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT *
      FROM message  WHERE Env_id=:id OR Rec_id=:id ORDER BY date_emis asc");
      //$req->bindValue
     
      $req->execute(array(
        "id"=>$this->id
      ));
      $data=$req->fetchAll();
      //var_dump($data);
      foreach($data as $tab)
      {
        $this->messages[]=new SingleMessage($tab);
      }
      //var_dump($this->messages);
    }
    public function TemplateMessages(int $id)
    {
      $this->allMessages();
      $a="";
      //echo "de la merde et : $this->id";
      foreach($this->messages as $ms)
      {
        //var_dump($ms);
        //echo $a;
        $a.=$ms->TemplateMessage($id);
      }
      $a.="";
      echo $a;
    }
    
}

?>