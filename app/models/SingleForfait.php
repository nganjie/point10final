<?php
 namespace App\Models;
 use App\Models\Forfait;
 use App\Models\Caracteristique;
 class SingleForfait extends Forfait{
    public $id;
    public $nom;
    public $nb_go;
    public $taille;
    public $type;
    public $prix;
    public $description;
    public function __construct($db,int $id)
    {
        $this->db=$db;
        $f =$this->getForfait($id);
        $this->id=$f->id;
        $this->nom=$f->nom;
        $this->nb_go=$f->nb_go;
        $this->taille =$f->taille;
        $this->type=$f->type;
        $this->prix=$f->prix;
        $a=$f->description;
        //echo $f->id;
        //echo $a;
        $chaine=$a;
        $position = strrpos($chaine, ";");

        if ($position !== false) {
          $chaine = substr($chaine, 0, $position);
        }

      // echo $chaine;
       $a=$chaine;
      // echo "<br><br>et<br>";

        //$a =substr($a,0,strlen($a)-1);
        //echo "<br>".strlen($a)." et ".$a[strlen($a)-1];
        //echo($a);
        $element =explode(";",$a);
        //var_dump($element);
        $this->description=new Caracteristique($element);
        
    }
    public function SingleTemplate()
    {
      $a="<div class='details_wrapper'>
      <div class='details_bundles'>
        <div>
          <img src='../media/images/blue.png' alt='' />
        </div>
        <div>
          <p>Nom du forfait : <strong style='color:blue'>{$this->nom}</strong></p>
          {$this->description->Template()}
          <p>Prix :<span style='color:blue'>  {$this->prix}</span></p>
        </div>
      </div>
      <div class='start_now'>
        
      </div>
    </div>";
    return $a;
    }
    public function TemplateDetaille()
    {
        $a="  <div class='details_wrapper'>
        <div class='details_bundles'>
          <div>
            <img src='../media/images/blue.png' alt='' />
          </div>
          <div>
            <p>Nom du forfait : <strong style='color:blue'>{$this->nom}</strong></p>
            {$this->description->Template()}
            <p>Prix :<span style='color:blue'>  {$this->prix}</span></p>
          </div>
        </div>
        <div class='start_now'>
          <a href='../validation-forfait/{$this->id}'>Passer ma commande</a>
        </div>
      </div>";
      return $a;
    }
    public function TemplateCarousel()
    {
      $a= "<div class='slide slide-5'>
        <a href='details-forfait/{$this->id}' class='bundle_item'>
        <div class='bundle_item_content'>
          <div class='image'>
            <img src='/point10final/public/../media/images/blue.png' alt='' />
          </div>
          <div class='bundle_description'>
            <p class='plan'><span style='color:#41f1b6'>{$this->nom}</span></p>
            {$this->description->Template()}
          </div>
          <div>
            <span class='bundle_name'>{$this->prix}</span>
          </div>
        </div>
      </a></div>";
      return $a;
    }

    public function Template():string
    {
        $a= "  <a href='/details_forfait/' class='bundle_item'>
        <div class='bundle_item_content'>
          <div class='image'>
            <img src='/point10final/public/../media/images/blue.png' alt='' />
          </div>
          <div class='bundle_description'>
            <p class='plan'><span style='color:#41f1b6'>{$this->nom}</span></p>
            {$this->description->Template()}
          </div>
          <div>
            <span class='bundle_name'>{$this->prix}</span>
          </div>
        </div>
      </a>";
      //echo "c'est de la merde ici bas ";
     // echo $a;
    //$b= $this->description->Template();
      //echo $b;
      //var_dump($this->description->Template());
      return $a;
    }
 }
?>