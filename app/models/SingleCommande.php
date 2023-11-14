<?php
 namespace App\Models;

class SingleCommande{
    public $id;
    public $nom;
    public $email;
    public $numero_benefice;
    public $numero_payement;
    public $operateur_payement;
    public $numero_transaction;
    public $date_commande;
    public $date_cloture;
    public $idclient;
    public $forfait_id;
    

    public function __construct($tab){
        $this->id=$tab->id;
        $this->nom=$tab->nom;
        $this->email=$tab->email;
        $this->numero_benefice=$tab->numero_benefice;
        $this->numero_payement=$tab->numero_payement;
        $this->numero_transaction=$tab->numero_transaction;
        $this->operateur_payement=$tab->operateur_payement;
        $this->date_commande=$tab->date_commande;
        $this->date_cloture=$tab->date_cloture;
        $this->idclient=$tab->idclient;
        $this->forfait_id=$tab->forfait_id;
    }
}

?>