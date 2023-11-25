<?php
//$post =$_GET["register_form"];
//var_dump($post);
//var_dump($params['categorie']);
forcer_utilisateur_connecter_admin();

 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/admin.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/contacts.css" />
  </head>
  <body>
    <main class="admin_wrapper">
    <?php require "option.php"; ?>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <h1>Dashbord</h1>
          <div>
            <a class="new_btn" href="#">Nouveau forfait</a>
          </div>
        </div>

        <section class="register_new_bundle_section">
          <h3 class="title">Enregistrer un nouveau forfait</h3>
          <p style="color:#41f1b6"><?= isset($_GET['valid'])?"le forfait à bien été enregistrer dans la base de données ":""?></p>
          <form action="enregistrer_forfait" method="POST" id="register_form">
            
 
            <select name="categorie" id="categorie">
              <option value="">Selectionner une categorie</option>
              <?php foreach($params['categorie'] as $categorie): ?>
                <option value="<?=$categorie->id?>"><?=$categorie->nom?></option>
                <?php endforeach ?>
            </select>
            
            <select name="taille" id="taille">
              <option value="">Selectionner une taille</option>
              <?php foreach($params['taille'] as $taille): ?>
                 <option value="<?=$taille->id?>"><?=$taille->symbole?></option>
              <?php endforeach ?>
            </select>
            <textarea type="text" name="description" id="" placeholder="description..." ></textarea>
            <input type="number" name="nb_go" id="nb_go" placeholder="Nombre de GO"/>
            <input
              type="number"
              name="prix"
              id=""
              placeholder="Le montant ici"
            />

            <input type="submit"  name="enregistrer" class="form_btn" value='Envoyer'>
          </form>
        </section>
      </div>
    </main>
  </body>
  <script src="<?= SCRIPTS ?>../js/ajouter_forfait.js"></script>
</html>
