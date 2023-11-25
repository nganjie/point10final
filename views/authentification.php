<?php

 function est_connecter(){
    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
    return !empty($_SESSION["connecter"]);
 }
 function forcer_utilisateur_connecter(){
    if(!est_connecter())
    {
      $a=SCRIPTS;
      header("Location:".$a."../se-connecter");
      exit();
    }
 }
 function forcer_utilisateur_connecter_admin(){
    if(!est_connecter())
    {
      $a=SCRIPTS;
      header("Location:".$a."../admin/connexion");
      exit();
    }
 }
?>