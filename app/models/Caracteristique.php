<?php
 namespace App\Models;
 use App\Models\Forfait;
 use App\Models\Element;
 class Caracteristique{
    public $elements=[];
    public function __construct($tab)
    {
        //var_dump($tab);
        for($i =0;$i<count($tab);$i++)
        {
            
            $this->elements[$i]=new Element($tab[$i]);
        }
        //echo count($this->elements);
       // var_dump($this->elements);
    }
    public function Template():string
    {
        //echo "ok";
        $t='';

        for($i=0;$i<count($this->elements);$i++)
        {
           // console.log(element);
          // echo "on essaie : ".$i;
          // echo $this->elments[$i]->Template();
            $t.=$this->elements[$i]->Template();
        }
        return $t;
    }
    public function SingleTemplate():string
    {
        //echo "ok";
        $t='';

        for($i=0;$i<count($this->elements);$i++)
        {
           // console.log(element);
          // echo "on essaie : ".$i;
          // echo $this->elments[$i]->Template();
            $t.=$this->elements[$i]->SingleTemplate();
        }
        return $t;
    }
 
 }
?>