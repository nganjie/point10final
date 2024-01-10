<?php
  
   namespace App\Models;

use App\Controllers\AlertModification;
use App\Models\SingleCommande;

use App\Controllers\Mail;
use DateTime;
//require "SingleCommande.php";
   //require "../Controllers/Securisation.php";
   use App\Controllers\Securisation;
   class CommandeForfait extends Model{
    protected $table='commande_forfait';
    public $commandes_encours=[];
    public $commandes=[];
    public $commandes_user=[];
    public $nb_commande_enc;
    public $nb_commande;
    public $nb_commande_cloturer;


    public function maxId():int
    {
      $pdo =$this->db->getPDO();
      $req=$pdo->query("SELECT MAX(id) as id FROM commande_forfait");
      $res =$req->fetch();
     /* if(!$res->id)
      {
        return 0;
      }*/
      return $res->id;
    }
    public function create($post):bool
    {
      $date = new DateTime();
      $secu =new Securisation();
      $name= $secu->securiser($post['name']);
      $nom_entreprise=$secu->securiser($post['nom-entreprise']);
     // $nom =$secu->securiser($post['nom']);
      $number=(int)$secu->securiser($post['phone_number']);
      $pay_number =(int)$secu->securiser($post['pay_number']);
      $operateur =$secu->securiser($post['methode']);
      $whatsap_number =(int)$secu->securiser($post['whatsap-number']);
      $transaction_number=(int)$secu->securiser($post['transaction_number']);
      //$ville =$secu->securiser($post['ville']);
      $mail=$secu->securiser($post['email']);
      $id_forfait =(int)$secu->securiser($post['id_forfait']);
      $id_client =(int)$secu->securiser($post['id_client']);
      
      //$password =password_hash($post['password'],PASSWORD_DEFAULT);
      //$utilisateur =new Utilisateur($this->db);
    // $id =$utilisateur->create_uti($name,$number);
      
      //echo $id;
      $pdo =$this->getDB()->getPDO();
      //var_dump($post);

      $req =$pdo->prepare("INSERT INTO commande_forfait(nom,email,numero_benefice,numero_payement,nom_entreprise,numero_whatsapp,operateur_payement,numero_transaction,date_commande,idclient,forfait_id) VALUES(:nom,:email,:numero_b,:numero_p,:nom_entreprise,:numero_whatsapp,:operateur_p,:numero_transaction,:date_commande,:idclient,:forfait_id)");
      $r= $req->execute(array(
        "nom"=>$name,
        "email"=>$mail,
        "numero_b"=>$number,
        "numero_p"=>$pay_number,
        "nom_entreprise"=>$nom_entreprise,
        "numero_whatsapp"=>$whatsap_number,
        "operateur_p"=>$operateur,
        "numero_transaction"=>$transaction_number,
        "date_commande"=>$date->format("Y-m-d H:i:s"),
        "idclient"=>$id_client,
        "forfait_id"=>$id_forfait
      ));
      //echo $id;
      AlertModification::createModification($this->maxId(),"commande");
      $f =new SingleForfait($this->db,$id_forfait);
     /*$maile =new Mail("nouvelle commande de forfait");
      $content ="<h4 style='color:blue'>NOUVELLE COMMANDE DE FORFAIT ENREGISTRER</h4>
      <p>nom: <strong>{$name}</strong> </p>
      <p>numero de paiement : <strong>{$pay_number}</strong> </p>
      <p>numero à rechager : <strong>{$number}</strong> </p>
      <p>numero whatsapp du client : <strong>{$whatsap_number}</strong> </p>
      <p>numero de transaction : <strong>{$transaction_number}</strong> </p>
      <p>operateur : <strong>{$operateur}</strong> </p>
      <p>mail: <strong>{$mail}</strong> </p>
      <p>nom du forfait : <strong>{$f->nom}</strong> </p>
      <p>taille : <strong>{$f->taille}</strong> </p>
      <p>prix : <strong>{$f->prix}</strong> </p>
      ";
      $maile->systemEmail();
      $maile->htmlEmail($content);
      $maile->send();
      $maile_client =new Mail("point10recharge : commande en cour de traitement");
      $content ="<h4 style='color:blue'>commande en cour de traitement</h4>
      <p>Monsieur <strong>{$name}</strong> ,veiller patienté, Votre commande est en cour de traitement</p>
      <h5 style='color:aqua'>INFORMATION SUR LA COMMANDE</h5>
      <p>numero de paiement : <strong>{$pay_number}</strong> </p>
      <p>numero à rechager : <strong>{$number}</strong> </p>
      <p>numero whatsapp du client : <strong>{$whatsap_number}</strong> </p>
      <p>numero de transaction : <strong>{$transaction_number}</strong> </p>
      <p>operateur : <strong>{$operateur}</strong> </p>
      <p>nom du forfait : <strong>{$f->nom}</strong> </p>
      <p>taille : <strong>{$f->taille}</strong> </p>
      <p>prix : <strong>{$f->prix}</strong> </p>
      
      ";
      $maile_client->externalEmail($mail);
      $maile_client->htmlEmail($content);
      $maile_client->send();*/
      return true;
      
    }
    public function nb_commande()
    {
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT COUNT(c.id) as nb FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id ORDER BY c.id desc;");
      $req->execute();
      $data=$req->fetch();
      //var_dump($data);
      $this->nb_commande=$data->nb;
      return $data->nb;
    }
    public function allStatsCommande()
    {
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT COUNT(c.id) as nb FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id ORDER BY c.id desc;");
      $req->execute();
      $data=$req->fetch();
      //var_dump($data);
      $this->nb_commande=$data->nb;
      $req =$pdo->prepare("SELECT COUNT(c.id) as nb FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id WHERE cl.decision='cloturer' ORDER BY c.id desc;");
      $req->execute();
      $data=$req->fetch();
      $this->nb_commande_cloturer=$data->nb;
      //return $data->nb;
    }
    public function connexion($post):int
    {
        $secu =new Securisation();
        $mail=$secu->securiser($post['mail']);
        $password=$secu->securiser($post['password']);
        $pdo =$this->getDB()->getPDO();
        $req=$pdo->prepare("SELECT * FROM client WHERE email=:mail");
        $req->bindValue("mail",$mail);
        $req->execute();
        $res=$req->fetch();
        var_dump($res);
        if($res)
        {
            if(password_verify($password,$res->password)){
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
       // $req->bindValue("password",$password);
    }
    public function allCommandeUser(int $id)
    {
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT * FROM commande_forfait WHERE id AND idclient=:idc");
      $req->bindValue("idc",$id);
      $req->execute();
      $data=$req->fetchAll();
      //echo $id;
     //var_dump($data);
      foreach($data as $tab)
      {
        $this->commandes_user[]=new SingleCommande($tab);
      }
    }
    public function allCommandeEnCours(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT * FROM commande_forfait WHERE id NOT IN(SELECT c.id_commande from cloturer_commande c ORDER BY id desc) ORDER BY id desc");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      
      foreach($data as $tab)
      {
        $this->nb_commande_enc+=1;
        $this->commandes_encours[]=new SingleCommande($tab);
      }
      $this->nb_commande();
     // var_dump($this->commandes_encours);
    }
    public function allCommande(){
      $pdo =$this->db->getPDO();
      $req =$pdo->prepare("SELECT c.id,c.nom,c.email,c.numero_benefice,c.numero_payement,c.operateur_payement,c.numero_transaction,c.date_commande,c.date_cloture,c.idclient,c.forfait_id,cl.id as idc,cl.id_commande,cl.date_cloture,cl.decision,cl.id_admin FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id ORDER BY c.id desc;");
      $req->execute();
      $data=$req->fetchAll();
      //var_dump($data);
      //var_dump($data);
      foreach($data as $tab)
      {
       // echo "un bonsoir<br>";
        $this->commandes[]=new SingleCommande($tab);
      }
      //var_dump($this->commandes);
    }
    public function cloturer($post)
    {
      $pdo =$this->db->getPDO();
      $id =$post['id'];
      $motif =$post['motif'];
      $id_commande=(int)$post["id_commande"];
      $id_admin =(int) $post['id_admin'];
      $date = new DateTime();
      $req=$pdo->prepare("INSERT INTO cloturer_commande(id_commande,date_cloture,decision,id_admin) VALUES(:id_commande,:date_cloture,:decision,:id_admin)");
      $req->execute(array(
        "id_commande"=>$id_commande,
        "date_cloture"=>$date->format("Y-m-d H:i:s"),
        "decision"=>$motif,
        "id_admin"=>$id_admin
      ));
      $etat=2;
      if($motif=="cloturer")
      {
        $etat=3;
      }
      AlertModification::modifierCommande($id_commande,$etat);
      $req=$pdo->prepare("SELECT c.id,c.nom,c.email,c.numero_benefice,c.numero_payement,c.operateur_payement,c.numero_transaction,c.date_commande,c.date_cloture,c.idclient,c.forfait_id,ca.nom as nom_forfait,t.symbole as taille,f.prix,f.nb_go,cl.id as idc,cl.id_commande,cl.date_cloture,cl.decision,cl.id_admin FROM commande_forfait c INNER JOIN cloturer_commande cl ON cl.id_commande=c.id INNER JOIN forfait f ON f.id=c.forfait_id INNER JOIN categorie ca ON ca.id =f.id_nom INNER JOIN taille t ON t.id=f.taille WHERE c.id=:id_commande");
      $req->execute(array(
        "id_commande"=>$id_commande
      ));
      
      $data =$req->fetch();
      $requpdate=$pdo->prepare("UPDATE commande_forfait SET date_cloture=:datec WHERE id=:idm");
      $requpdate->execute(array(
        "idm"=>$id_commande,
        "datec"=>$date->format("Y-m-d H:i:s"),
      ));
      //$commande = new SingleCommande($data);
     // var_dump($data);
      $fact =$this->facture($data);
      /*$maile =new Mail("nouveau compte client");
      $content ="<h4 style='color:blue'>Facture client </h4>
      $fact
      ";
      $maile->externalEmail($data->email);
      $maile->htmlEmail($content);
      $maile->send();*/
      
      
    }
    public function TemplateCommandeEncour()
    {
      $tab ='';
      $tab.="<!-- Responsive Table Header Section -->
      <thead class='responsive-table__head'>
        <tr class='responsive-table__row'>
          <th
            class='responsive-table__head__title responsive-table__head__title--name'
          >
            Nom du forfait
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            Email
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Trans
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Payeur
          </th>
          <th
            class='responsive-table__head__title responsive-table__head__title--update'
          >
            Date
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Status
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Action
          </th>
        </tr>
      </thead>
      <!-- Responsive Table Body Section -->";
      $tab.="<tbody class='responsive-table__body'>";
      foreach($this->commandes_encours as $cd)
      {
        //echo "un monde de fous";
        //echo $cd->Template();
        $tab.=$cd->TemplateEncour();
      }
      
      $tab.="</tbody>";
      //echo $tab;
      //echo "un monde de merde ici bas";
      
      return $tab;
    }
    public function TemplateCommande(){
      $tab ='';
      $tab.="<!-- Responsive Table Header Section -->
      <thead class='responsive-table__head'>
        <tr class='responsive-table__row'>
          <th
            class='responsive-table__head__title responsive-table__head__title--name'
          >
            Nom du forfait
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            Email
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Trans
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Payeur
          </th>
          <th
            class='responsive-table__head__title responsive-table__head__title--update'
          >
            Date
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Status
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Action
          </th>
        </tr>
      </thead>
      <!-- Responsive Table Body Section -->";
      $tab.="<tbody class='responsive-table__body'>";
      foreach($this->commandes as $cd)
      {
        //echo "un monde de fous";
        //echo $cd->Template();
        $tab.=$cd->Template();
      }
      
      $tab.="</tbody>";
      //echo $tab;
      //echo "un monde de merde ici bas";
      
      return $tab;
    }
    public function TemplateCommandeUser()
    {
      $tab ='';
      $tab.="<!-- Responsive Table Header Section -->
      <thead class='responsive-table__head'>
        <tr class='responsive-table__row'>
          <th
            class='responsive-table__head__title responsive-table__head__title--name'
          >
            Nom du forfait
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            Email
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Trans
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--types'
          >
            N°-Payeur
          </th>
          <th
            class='responsive-table__head__title responsive-table__head__title--update'
          >
            Date
          </th>

          <th
            class='responsive-table__head__title responsive-table__head__title--status'
          >
            Status
          </th>

          <th
               class='responsive-table__head__title responsive-table__head__title--status'
             >
                  Télécharger la facture
                </th>
        </tr>
      </thead>
      <!-- Responsive Table Body Section -->";
      $tab.="<tbody class='responsive-table__body'>";
      foreach($this->commandes_user as $cd)
      {
        //echo "un monde de fous";
        //echo $cd->Template();
       // var_dump($cd);
        $tab.=$cd->TemplateCommandeUser();
      }
      
      $tab.="</tbody>";
      //echo $tab;
      //echo "un monde de merde ici bas";
      
      return $tab;
    }
    private function facture($commande):string
    {
      
      $facture="  <main class='wrapper'>
      <div id='previe'>
            <div class='wrappe'>
              <section class='bill_head'>
                <div>
                  <img src='<?= SCRIPTS ?>../media/logo-point10final.png' alt='' />
                </div>
                <div>Reçu Client</div>
              </section>
              <div class='background_pre'>point10recharge</div>
              <!-- user details -->
              <section class='user_bill_details'>
                <!-- right -->
                <div>
                  <p>Point10recharge</p>
                  <p>Plateforme de vente en ligne de forfait</p>
                  <p>
                    <a href='issahnfonsouen@point10recharge'
                      >E-mail : issahnfonsouen@point10recharge</a
                    >
                  </p>
                  <strong>$commande->date_commande </strong>
                </div>
  
                <!-- left -->
                <div>
                  <p>Recu à</p>
                  <strong id='name-client'> ........</strong>
                  <p>Douala</p>
                  <p id='number-client'>+237 $commande->numero_payement</p>
                  <p id='email-client'>$commande->email</p>
                  <p>Cameroun</p>
                </div>
              </section>
  
              <!--  -->
              <div>
                <p>Désignation</p>
                <strong >$commande->nom</strong>
              </div>
              <div class='main_content_section'>
                <div>
                  <div>
                    <span>numero bénéficiare</span>
                    <strong id='number-recharge'>$commande->numero_benefice</strong>
                  </div>
  
                  <div>
                    <span>Référence</span>
                    <strong id='reference'>$commande->numero_transaction</strong>
                  </div>
                  <div>
                    <span>Mode de paiement</span>
                    <strong id='mode-paiemant'>$commande->operateur_payement</strong>
                  </div>
                </div>
  
                <!-- table details -->
                <div class='bill_section_table'>
                  <div class='bill_section'>
                    <div class='bill_item'>
                      <span class='w_30'>QTE</span>
                      <span>ARTICLE</span>
                      <span class='flex_1'>AMOUNT</span>
                    </div>
  
                    <div class='bill_item'>
                      <span class='w_30'>01</span>
                      <strong>Forfait  $commande->nom_forfait</strong>
                      <span class='flex_1'> $commande->prix XAF</span>
                    </div>
  
                    <div class='bill_item'>
                      <span>Facture</span>
                      <span class='flex_1'> $commande->date_commande</span>
                    </div>
                    <div class='bill_item'>
                      <span>Taille</span>
                      <span class='flex_1'> $commande->nb_go Go</span>
                    </div>
                    <div class='bill_item'>
                      <span>Categorie</span>
                      <span class='flex_1'> $commande->taille </span>
                    </div>
                    <div
                      class=''
                      style='
                        display: flex;
                        justify-content: space-between;
                        padding: 0.4rem 0.3rem;
                      '
                    >
                      <span> Total</span> <span class='flex_1'> $commande->prix XAF </span>
                    </div>
  
                    <div class='bill_item'>
                      <strong>Montant net à payer (XAF)</strong>
                      <span class='style_price'> $commande->prix XAF</span>
                    </div>
                  </div>
  
                  <div>
                    <span>Important</span>
                    <p>
                      Cette facture est soumise aux conditions général de paiement
                      
                      . Bien vouloir les consulter sur
                      www.point10recharge.com
                    </p>
                  </div>
                </div>
              </div>
  
              <div class='footer_wrapper_pre'>
                <a>www.point10recharge.cm</a>
                <p>support@point10recharge.cm</p>
                <span>Page 1/1</span>
              </div>
            </div>
          </div>
      </main>";
      return $facture;
    }
   }
   
 ?>