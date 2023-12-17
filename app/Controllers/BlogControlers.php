<?php 

namespace App\Controllers;

use App\Models\Forfait;
use App\Models\SingleForfait;
use App\Models\Client;
use App\Models\CommandeForfait;
use App\Models\MessageContact;
use App\Models\Messages;
use App\Models\SingleCommande;
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
        //return $this->view("blog.se-connecter");
        return header("LOCATION: se-connecter");
        //return header("LOCATION: index.php");
        //return $this->view("blog.index");
        //return $this->view("blog.contacts",compact('valid'));
       }else{
       // return $this->view("blog.creer_compte");
        return header("LOCATION: creer-compte?result={$result}");
       }
    }
    public function messages_create()
    {
        //echo "je regarde admin";
        //$admin =new Admin($this->db,$id,1);
        $client = new Client($this->db,$_POST['id_rec']);
        $message =new Messages($this->db,$_POST['id_send']); //Messages($this->db,$id);
        $message->create($_POST,true);
        //var_dump($client);
        return $this->view("blog.client_message");
    }
    public function connexion_client()
    {
        $client =new Client($this->db,-1);
        $result = $client->connexion($_POST);
        
       //echo " on a : ".$result;
       $valid =0;
       if($result==1)
       {
        $valid =1;
        $this->dashbord_client();
        
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
    public function facture()
    {
        $facture =$_POST["facture"];
       return $this->view("blog.pdf",compact("facture"));
    }
    public function dashbord_client()
    {
       // $client =new Client($this->db,$_SESSION["id_utilisateur"]);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return $this->view("blog.dashbord_client");
    }
    public function deconnexion()
    {
       // $client =new Client($this->db,$_SESSION["id_utilisateur"]);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return $this->view("blog.deconnexion");
    }
    public function facture_client(int $id)
    {
      $pdo =$this->db->getPDO();
      //echo $id;
      $req =$pdo->prepare("SELECT c.id,c.nom,c.email,c.numero_benefice,c.numero_payement,c.operateur_payement,nom_entreprise,numero_whatsapp,c.numero_transaction,c.date_commande,c.date_cloture,c.idclient,c.forfait_id,cl.id as idc,cl.id_commande,cl.date_cloture,cl.decision,cl.id_admin FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id WHERE c.id=:idc");
      $req->execute(array(
        "idc"=>$id
      ));
      $data=$req->fetch();
      //echo $data->id;
      $forfait =new SingleForfait($this->db,$data->forfait_id);
      //var_dump($data);
        //$client =new Client($this->db,$id);
        $commande=new SingleCommande($data);
       return $this->view("blog.facture_client",compact("commande","forfait"));
    }
    public function client_message()
    {
      // $client =new Client($this->db,$id);
       // $client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
       return $this->view("blog.client_message");
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