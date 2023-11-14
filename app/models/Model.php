<?php
  namespace App\Models;

use Database\DBConnection;

 abstract class Model{
    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db=$db;
    }
    public function getDB()
    {
      return $this->db;
    }
    public function all()
    {
        $req=$this->db->getPDO()->query("SELECT * FROM ".$this->table." ORDER BY id DESC");
        return $req->fetchAll();
    }
    public function findById($id)
    {
      $req=$this->db->getPDO()->prepare("SELECT * FROM ".$this->table." WHERE id=?");
      $req->execute();
      return $req->fetch();
    }
    public function maxId():int
    {
      $req=$this->db->getPDO()->prepare("SELECT MAX(id) as id FROM ".$this->table);
      $req->execute();
      $id= $req->fetch();
      
      //$id=(int)$id;
      //echo $id;
      //var_dump($id);
    
      return $id->id;
    }
  }
?>