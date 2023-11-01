<?php
//$post =$_GET["register_form"];
//var_dump($post);
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/admin.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
  </head>
  <body>
    <main class="admin_wrapper">
      <nav class="sidebar">
        <div>
          <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
        </div>
        <ul class="list_nav">
          <li class="active"><a href="#">Dashbord</a></li>
          <li><a href="#">Forfaits</a></li>
          <li><a href="#">Commandes</a></li>
        </ul>
      </nav>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <h1>Dashbord</h1>
          <div>
            <a class="new_btn" href="#">Nouveau foraits</a>
          </div>
        </div>

        <section class="register_new_bundle_section">
          <h3 class="title">Enregistrer un nouveau forfait</h3>
          <p style="color:#41f1b6"><?= isset($_GET['valid'])?"le forfait à bien été enregistrer dans la base de données ":""?></p>
          <form action="enregistrer_forfait" method="POST" id="register_form">
            <p>Catégorie du forfait</p>
            <div class="group_input">
              <div class="form_item">
                <input type="radio" name="forfait"  id="blue" value="forfaits_blue"  />
                <label for="blue">Blue</label>
              </div>
              <div class="form_item">
                <input type="radio" name="forfait"  id="yoome" value="forfaits_yoome" />
                <label for="yoome">Yoome</label>
              </div>
            </div>
            <input type="text" name="nom" id="" placeholder="Nom..." />
            <textarea type="text" name="description" id="" placeholder="description..." ></textarea>
            <select name="taille" id="taille">
              <option value="">Selectionner une taille</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
            <input
              type="number"
              name="prix"
              step="100"
              min="500"
              max="50000"
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
