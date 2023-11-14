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
}
?>