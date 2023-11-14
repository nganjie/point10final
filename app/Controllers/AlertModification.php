<?php 

namespace App\Controllers;

use Database\DBConnection;

 class AlertModification{
    static function createModification($id,$type)
    {
        $db =new DBConnection();
        $pdo=$db->getPDO();
        $req =$pdo->prepare("INSERT INTO modification(type,numero_modifier,id_modif) VALUES(:type,:numero_modifier,:id_modif)");
        $req->execute(array(
            "type"=>$type,
            "numero_modifier"=>1,
            "id_modif"=>$id
        ));

    }
    static function modifierCommande(int $id){
        $db =new DBConnection();
        $pdo=$db->getPDO();
        $selectmod = $pdo->prepare("SELECT numero_modifier FROM modification WHERE id_modif=:id");
        $selectmod->execute(array(
            "id"=>$id
        ));
        $resultmod = $selectmod->fetch();
        //echo $resultmod[0][0]+1;
        $m =1+$resultmod->numero_modifier%10;
        
    
    $modifier = $pdo->prepare("UPDATE modification SET numero_modifier = '$m' WHERE id =1");
      $modifier->execute();
    }
    static function numeroModif($id){
        $db =new DBConnection();
        $pdo=$db->getPDO();
        $req=$pdo->prepare("SELECT numero_modifier FROM modification WHERE id_modif=:id");
        $req->execute(array(
            "id"=>$id
        ));
        $res =$req->fetch();
        //echo $res->numero_modifier;
        //var_dump($res);
        return $res->numero_modifier;
    }
 }

?>