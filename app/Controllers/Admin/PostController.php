<?php
 namespace App\Controllers\Admin;
use App\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\CommandeForfait;
//require "../../Models/Forfait.php";
//spl_autoload_call('Forfait.php');
use App\Models\Forfait;
use App\Models\MessageContact;
use App\Models\Messages;

 class PostController extends Controller{

    public function index()
    {
        $forfait  =(new Forfait($this->getDB()))->all();
        return $this->view("admin.forfait.index",compact("forfait"));
    }
    public function admin()
    {
        //echo "je regarde admin";
        $commande=new CommandeForfait($this->db);

        return $this->view("admin.admin",compact('commande'));
    }
    public function messages()
    {
        //echo "je regarde admin";
        $admin =new Admin($this->db,14,1);
        return $this->view("admin.messages",compact('admin'));
    }
    public function messages_id(int $id)
    {
        //echo "je regarde admin";
        $admin =new Admin($this->db,14,1);
        $client = new Client($this->db,$id);
        
        //var_dump($client);
        return $this->view("admin.messages",compact('admin','client'));
    }
    public function messages_create(int $id)
    {
        //echo "je regarde admin";
        $admin =new Admin($this->db,$id,1);
        $client = new Client($this->db,$_POST['id_rec']);
        $message =new Messages($this->db,$id);
        $message->create($_POST,false);
        //var_dump($client);
        return $this->view("admin.messages",compact('admin','client'));
    }
    public function messages_contact()
    {
        //echo "je regarde admin";
       /* $admin =new Admin($this->db,$id,1);
        $client = new Client($this->db,$_POST['id_rec']);
        $message =new Messages($this->db,$id);
        $message->create($_POST,false);*/
        //var_dump($client);
        $messageContact= new MessageContact($this->db);
        $messageContact->allMessageContact();
        return $this->view("admin.messages_contact");
    }
    public function commandes()
    {
        $commande=new CommandeForfait($this->db);
        //echo "je regarde admin";
        return $this->view("admin.commandes",compact('commande'));
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
    public function connexion()
    {
        return $this->view("admin.connexion_admin");
    }
    public function connexion_admin()
    {
        $admin =new Admin($this->db,-1,1);
        $result = $admin->connexion($_POST);
        
       //echo " on a : ".$result;
       $valid =0;
       if($result==1)
       {
        $valid =1;
        $this->admin();
        
        //return $this->view("blog.index");
        //return $this->view("blog.contacts",compact('valid'));
       }else{
        return header("LOCATION: se-connecter?result={$result}");
       }
    }
 }

 ?>