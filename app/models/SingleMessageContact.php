<?php
namespace App\Models;

class SingleMessageContact{
    public $id;
    public $nom;
    public $email;
    public $content;
    public $date;

    public function __construct($tab){
        $this->id=$tab->id;
        $this->nom=$tab->nom;
        $this->email=$tab->email;
        $this->content=$tab->content;
        $this->date=$tab->date;
    }
}
?>