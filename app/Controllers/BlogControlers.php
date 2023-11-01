<?php 

namespace App\Controllers;

use App\Models\Forfait;
use App\Models\MessageContact;
use Database\DBConnection;

Class BlogController extends Controller{

    public function index(){
        $forfait =new MessageContact($this->db);
        $result =$forfait->all();
        //var_dump($result);
        return $this->view("blog.index");
    }
   
    public function contact(){
        return $this->view("blog.contact");
    }
    public function test(){
        return $this->view("blog.test");
    }
    public function enregistrer_message_contact()
    {
        $message =new MessageContact($this->db);
        $result = $message->create($_POST);
       //echo " on a : ".$result;
       $valid =0;
       if($result)
       {
        $valid =1;
        return header("LOCATION: contacts?valid={$valid}");
        //return $this->view("blog.contacts",compact('valid'));
       }
    }

    public function show(int $id)
    {
       // var_dump($this->db->getPDO());
       $f=new Forfait($this->db);
       //echo $f->findById(1);
       //var_dump($f->findById(1));
        $post=$this->db->getPDO()->query("SELECT * FROM message_contact");
        $forfait=$post->fetchAll();
        //$d=78;
        /*foreach($forfait as $elt)
        {
            echo $elt->date;
        }*/
        return $this->view("blog.show",compact('forfait'));
    }
}

?>