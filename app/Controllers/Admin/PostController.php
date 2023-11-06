<?php
 namespace App\Controllers\Admin;
use App\Controllers\Controller;
//require "../../Models/Forfait.php";
//spl_autoload_call('Forfait.php');
use App\Models\Forfait;
 class PostController extends Controller{

    public function index()
    {
        $forfait  =(new Forfait($this->getDB()))->all();
        return $this->view("admin.forfait.index",compact("forfait"));
    }
    public function admin()
    {
        //echo "je regarde admin";
        return $this->view("admin.admin");
    }
    public function commandes()
    {
        //echo "je regarde admin";
        return $this->view("admin.commandes");
    }
    public function ajouter_forfait()
    {
       // echo 'je vois bien';
       $pdo =$this->getDB()->getPDO();
       $req=$pdo->query("SELECT * FROM categorie");
       $categorie=$req->fetchAll();
       $reqx=$pdo->query("SELECT * FROM taille");
       $taille=$reqx->fetchAll();
        return $this->view("admin.ajouter_forfait",compact("categorie","taille"));
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