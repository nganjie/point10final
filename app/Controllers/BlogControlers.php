<?php 

namespace App\Controllers;

Class BlogController{
    public function __construct()
    {
        
    }
    public function index(){
        echo "je suis la homepage ";
    }

    public function show(int $id)
    {
        echo "je suis le forfait : ".$id;
    }
}

?>