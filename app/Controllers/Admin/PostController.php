<?php
 namespace App\Controllers\Admin;
use App\Controllers\Controller;
//require "../../Models/Forfait.php";
//spl_autoload_call('Forfait.php');
use App\Models\Forfait;
 class PostController extends Controller{

    public function index()
    {
        $forfait  =(new Forfait($this->getDb()))->all();
        return $this->view("admin.forfait.index",compact("forfait"));
    }
    public function admin()
    {
        //echo "je regarde admin";
        return $this->view("admin.admin");
    }
    public function ajouter_forfait()
    {
       // echo 'je vois bien';
        return $this->view("admin.ajouter_forfait");
    }
   
    public function enregistrer_forfait()
    {
       $forfait =new Forfait($this->getDB());
       $result = $forfait->create($_POST);
       //echo " on a : ".$result;
       $valid=0;
       if($result)
       {
        $valid=1;
        return header("LOCATION: ajouter_forfait?valid={$valid}");
        //return $this->view("admin.ajouter_forfait");
       }
        //return $this->view("admin.ajouter_forfait");
    }
 }

 ?>