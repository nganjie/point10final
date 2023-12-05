<?php
//$post =$_GET["register_form"];
//var_dump($post);
//var_dump($params['categorie']);
forcer_utilisateur_connecter_admin();
$messageContact =$params['messageContact'];
echo $_SESSION['adm-id'];
$actif="message_contact";

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge </title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/toast.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/admin.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/table.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/modal.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/checkbox.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/button.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/notification_message.css" />

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <script type="module" src="<?= SCRIPTS ?>../js/toast.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/toggle_sidebar.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/messages_contact.js" defer></script>
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
            <h2>Msgs Contact</h2>
          </div>
          <div>
            <a class="new_btn" href="<?= SCRIPTS ?>../admin/ajouter_forfait"
              >Nouveau forfait</a
            >
          </div>
        </div>

        <!-- page content -->
        <div class="resume_wrapper">
          <!-- resume item  -->
          <div class="review_item">
            <h4>Nouveau Messages</h4>
            <span><?=$params['nbMessages'] ?></span>
          </div>
        </div>

        <!-- table -->
        <div class="body_section">
          <h2 class="title_section">messages du formulaire de contact</h2>
          <div class="products_table">
            <!-- Responsive Table Section -->
            <table class="responsive-table ">
              <!-- Responsive Table Header Section -->
        
              <!-- Responsive Table Body Section -->
              <?=$messageContact->Template()?>
            </table>
          </div>
        </div>
      </div>
    </main>

    <!-- LES MODAUX ICI -->
    <!-- view modal -->

    <div class="modal" id="modal1" data-animation="slideInOutLeft">
      <div class="modal-dialog">
        <header class="modal-header">
          <h2>Détails du message</h2>

          <button class="close-modal" aria-label="close modal" data-close>
            ✕
          </button>
        </header>
        <section class="modal-content">
          <div class="details_bundles">
            <div>
              <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
            </div>
            <div>
              <p>Email d'envoie : <strong>admin@admin.cm</strong></p>
              <p>Le : <strong>13 / 10 / 2023</strong></p>
              <p>A : <strong> L'equipe Point10recharge</strong></p>
              <p>Message complet :</p>
              <div>
                Bonjour l'equipe point10recharge. , Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Libero sint dolores provident!
                Itaque repellat dolore consequatur minima ducimus provident, nam
                omnis sunt molestiae neque ipsa molestias eos quis obcaecati
                repudiandae.
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
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
