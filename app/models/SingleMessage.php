<?php

namespace App\Models;

class SingleMessage{
    public $id;
    public $contents;
    public $date_emis;
    public $date_reception;
    public $Rec_id;
    public $Env_id;

    public function __construct($tab){
        $this->id=$tab->id;
        $this->contents=$tab->contents;
        $this->date_emis=$tab->date_emis;
        $this->date_reception=$tab->date_reception;
        $this->Rec_id=$tab->Rec_id;
        $this->Env_id=$tab->Env_id;

    }
    public function TemplateMessage(int $id)
    {
        $s="replies";
        //echo $id;
        if($id==$this->Env_id)
        {
            
            $s="sent";
        }else if($id==$this->Rec_id)
        {
            $s="replies";
           // echo "on verifie ici $id";
        }
       // echo "on verifie ici $id  et $s : $this->Rec_id : $this->Env_id";
        //$s="replies";
        $a="<li class='{$s}' id='{$this->id}'>
        <p>
          {$this->contents}
        </p>
      </li>";
      return $a;
    }
}
?>