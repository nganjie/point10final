<?php

namespace App\Models;
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
    public function create($post){
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