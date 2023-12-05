<?php

use App\Models\Client;

forcer_utilisateur_connecter();
$client =new Client($this->db,$_SESSION["id_utilisateur"]);
$client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
//echo "un monde en colère <br><br> $client->email et ".$_SESSION['id_utilisateur'];
//var_dump($client->commandeForfait);
//echo $client->commandeForfait->TemplateCommandeUser();
 //echo $_SESSION['nom'];
 //var_dump($params['client'])
// $client =$params['client'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/dashbord.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/table.css" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/toast.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/admin.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/table.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/modal.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/checkbox.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/button.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/notification_message.css" />
    <title>Espace Client</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <script src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/modal_coustom.js" defer></script>
  </head>
  <body>
  <?php require "header.php" ?>

    <main class="main_content">
      <section class="banner_wrapper small_banner">
        <div class="banner_content">
          <div class="banner_content_right">
            <h1 class="banner_title">Dashbord Client</h1>

            <div class="banner_description">
              bienvenu <strong class="">Ivan</strong> dans ton espace, Ici tu
              trouvera un bilan de toutes tes activités réaliseés sur ce site.
            </div>
          </div>
        </div>
      </section>
      <section class="">
        <div class="box2 box">
          <div class="content">
            <!-- <h1 class="name">Ivan Silatsa</h1> -->
            <div class="card_wrapper">
              <div class="right">
                <div class="info">
                  <h3>Information</h3>
                  <div class="info_data">
                    <div class="data">
                      <h4>Nom</h4>
                      <p><?=$client->nom?></p>
                    </div>
                    <div class="data">
                      <h4>Phone</h4>
                      <p>°237 <?=$client->numero?></p>
                    </div>
                  </div>

                  <div class="info_data">
                    <div class="data">
                      <h4>Email</h4>
                      <p><?=$_SESSION['email']?></p>
                    </div>
                    <div class="data">
                      <h4>Ville</h4>
                      <p><?=$_SESSION['ville']?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="post">
                <p>Commandes</p>
                <h5><?=$client->commandes?></h5>
              </div>
              <div class="followers">
                <p>Commandes Réalisées</p>
                <h5><?=$client->commande_r?></h5>
              </div>
              <div class="following">
                <p>En attentes</p>
                <h5><?=$client->commandes_art?></h5>
              </div>
            </div>
            <div class="text">
              <div class="button_dashbord">
                <div>
                  <a href="message-client?>">
                    <button class="message" type="button">
                      Nous laisser un message.
                    </button>
                  </a>
                </div>
                <div>
                  <a href="forfait">
                    <button class="connect" >
                      Acheter un nouveau forfait
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="body_section">
        <h2 class="title_section">Commandes de forfaits</h2>
        <div class="products_table">
          <!-- Responsive Table Section -->
          <table class="responsive-table">
            <!-- Responsive Table Header Section -->
            <?php echo $client->commandeForfait->TemplateCommandeUser();?>
          </table>
        </div>
      </section>
      <div class="modal" id="modal1" data-animation="slideInOutLeft">
      </div>
    </main>

    <!-- footer -->
    <?php require "footer.php" ?>
    <form id="form-cache" style="display:none">
      <input type="text" name="query" />
      <input type="text" name="id" />
      <input type="text" name="motif" />
      <input type="text" name="id_commande" />
      <input type="text" name="id_admin" value='1' />
      <input type="text" name="chemin" value="<?=SCRIPTS ?>"/>
    </form>
    
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
