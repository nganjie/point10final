<?php

namespace Database;
use PDO;
class DBConnection{
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;
   // $db_name='point10final_db',$db_user='root',$db_pass='root',$db_host='localhost'
    public function __construct($dbname='point10final_db',$host='localhost',$username='root',$password="")
    {
        $this->dbname=$dbname;
        $this->host=$host;
        $this->username=$username;
        $this->password=$password;
    }
    public function getPDO()
    {
        if($this->pdo===null){
            
          //$pdo = new PDO('mysql:dbname=point10final_db;host=localhost',"root","");
           // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           $pdo = new PDO("mysql:dbname={$this->dbname};host={$this->host}",$this->username,"{$this->password}",[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND=>'SET CHARACTER SET UTF8'
           ]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;

        }
       
        return $this->pdo;
    }
}
?>