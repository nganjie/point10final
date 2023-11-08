<?php
namespace App\Controllers;

use Database\DBConnection;

abstract class Controller{
    protected $db;
    public function __construct(DBConnection $db)
    {
        //echo "tous un monde de fous";
        //var_dump($db);
        $this->db=$db;
    }
    protected function view(string $path,array $params=null){
        ob_start();
        $path=str_replace('.',DIRECTORY_SEPARATOR,$path);
       // echo VIEWS.$path;
        require VIEWS.$path.'.php';
        if($params)
        {
            $params=extract($params);
        }
        $content=ob_get_clean();
        require VIEWS.'layout.php';
    }
    protected function getDB()
    {
        return $this->db;
    }
}
?>