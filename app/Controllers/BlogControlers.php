<?php 

namespace App\Controllers;

use App\Models\Forfait;
use App\Models\SingleForfait;
use App\Models\Client;
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
    public function se_connecter(){
       // echo "oh je vois";
        return $this->view("blog.se_connecter");
    }
    public function creer_compte(){
        return $this->view("blog.creer_compte");
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
    public function creation_compte()
    {
        $client =new Client($this->db,-1);
        $result = $client->create($_POST);
       //echo " on a : ".$result;
       $valid =0;
       if($result)
       {
        $valid =1;
        return $this->view("blog.creer_compte");
        //return header("LOCATION: index.php");
        //return $this->view("blog.index");
        //return $this->view("blog.contacts",compact('valid'));
       }else{
        return $this->view("blog.creer_compte");
       // return header("LOCATION: creer-compte?result={$result}");
       }
    }
    public function connexion_client()
    {
        $client =new Client($this->db,-1);
        $result = $client->connexion($_POST);
       echo " on a : ".$result;
       $valid =0;
       if($result==1)
       {
        $valid =1;
        
        //return $this->view("blog.index");
        //return $this->view("blog.contacts",compact('valid'));
       }else{
        return header("LOCATION: se-connecter?result={$result}");
       }
    }
    public function forfait(){
        $forfait =new Forfait($this->db);
        return $this->view("blog.forfait",compact('forfait'));
    }
    public function validation_forfait(int $id){
        $f =new SingleForfait($this->db,$id);
        $forfait =$f;
       // var_dump($forfait);
        return $this->view("blog.validation_forfait",compact('forfait'));
    }
    public function details_forfait($id)
    {
        $forfait=new SingleForfait($this->db,$id);
       /* $fa=$f->getForfait(12);
       // print_r($f->getForfait(20));
        $a=$fa->description;
        $a =substr($a,0,strlen($a)-1);
        //echo($a);
        $element =explode(";",$a);
        echo count($element);
        print_r($element);
       
       for($i =0;$i<count($element);$i++)
       {
        $elt =explode(":",$element[$i]);

        print_r($elt);
        echo "<br>";
       }*/

        //echo $forfait->TemplateDetaille();
        return $this->view("blog.details_forfait",compact('forfait'));
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