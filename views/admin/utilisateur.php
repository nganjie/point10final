<?php

use App\Models\Admin;
use Database\DBConnection;

forcer_utilisateur_connecter_admin();
$db =new DBConnection();
$admin =new Admin($db,$_SESSION['adm-id_utilisateur'],$_SESSION['adm-id']);
$admin->allClient();
$actif="utilisateur";
//var_dump($admin->users);
//var_dump($admin);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/toast.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/admin.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/table.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/modal.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/checkbox.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/button.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/message.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/notification_message.css" />

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>
    <script src="<?= SCRIPTS ?>../js/modal_coustom.js" defer></script>
    <script src="<?= SCRIPTS ?>../js/toggle_sidebar.js" defer></script>
    <script src="<?= SCRIPTS ?>../js/resize_sidebar.js" defer></script>
    <script type="module"  src="<?= SCRIPTS ?>../js/notification.js" defer></script>

  </head>

  <body>
    <!-- TOAST CONTENT -->

    <div id="toast">
      <div id="img">
        <i class="fa-solid fa-check"></i>
      </div>
      <div id="desc">Nouveau forfaits enregistrer avec success</div>
    </div>

    <main class="admin_wrapper">
    <?php require "option.php"; ?>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <div class="title_dash">
            <button onclick="toggleSidebar()">
              <i class="fa-solid fa-bars"></i>
            </button>
            <h2>Utilisateurs</h2>
          </div>
          <div>
            <a class="new_btn" href="register_new_bundle.html"
              >Nouveau forfait</a
            >
          </div>
        </div>

        <!-- page content -->
        <div class="resume_wrapper">
          <!-- resume item  -->
          <div class="review_item">
            <h4>Total Comptes</h4>
            <span> <?=sizeof($admin->users)?></span>
          </div>
        </div>

        <div class="resume_wrapper">
          <div class="active-calories review_item">
            <h4 style="align-self: flex-start">Nouveaux Comptes</h4>
            <div class="active-calories-container">
              <div class="box" style="--i: <?=1/sizeof($admin->users)?>%">
                <div class="circle">
                  <h2><?=1/sizeof($admin->users)?><small>%</small></h2>
                </div>
              </div>
              <div class="calories-content">
                <p><strong>Nouveau:</strong> <span> 1 </span></p>
                <p><strong>Total:</strong> <span> <?=sizeof($admin->users)?> </span></p>
              </div>
            </div>
          </div>
        </div>

        <!-- table -->
        <div class="body_section">
          <h2 class="title_section">Détails compte utilisateurs</h2>
          <div class="products_table">
            <!-- Responsive Table Section -->
            <table class="responsive-table">
              <!-- Responsive Table Header Section -->
              <thead class="responsive-table__head">
                <tr class="responsive-table__row">
                  <th
                    class="responsive-table__head__title responsive-table__head__title--name"
                  >
                    Nom
                  </th>

                  <th
                    class="responsive-table__head__title responsive-table__head__title--types"
                  >
                    Email
                  </th>


                  <th
                    class="responsive-table__head__title responsive-table__head__title--types"
                  >
                    Numéro
                  </th>

                  <th
                    class="responsive-table__head__title responsive-table__head__title--types"
                  >
                    Ville
                  </th>

                  <th
                    class="responsive-table__head__title responsive-table__head__title--update"
                  >
                    Créer Le
                  </th>

                  <th
                    class="responsive-table__head__title responsive-table__head__title--status"
                  >
                    Status
                  </th>

                  <!-- <th
                    class="responsive-table__head__title responsive-table__head__title--status"
                  >
                    Action
                  </th> -->
                </tr>
              </thead>
              <!-- Responsive Table Body Section -->
              <tbody class="responsive-table__body">
                <?=$admin->TemplateClient()?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <form id="form-cache" style="display:none">
      <input type="text" name="query" />
      <input type="text" name="id" />
      <input type="text" name="motif" />
      <input type="text" name="id_commande" />
      <input type="text" name="id_admin" value='<?=$_SESSION['adm-id']?>' />
      <input type="text" name="chemin" value="<?=SCRIPTS ?>"/>
    </form>
  </body>
</html>
