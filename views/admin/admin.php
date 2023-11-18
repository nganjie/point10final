
<?php

$commande =$params['commande'];
$commande->allCommande();

?>
<!DOCTYPE html>
<html lang="en">
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


    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <script type="module" src="../js/toast.js" defer></script>
    <script type="module" src="../js/modal_coustom.js" defer></script>
  </head>
  <body class="body">
    <!-- TOAST CONTENT -->

    <div id="toast">
      <div id="img">
        <i class="fa-solid fa-check"></i>
      </div>
      <div id="desc">Nouveau forfaits enregistrer avec success</div>
    </div>

    <!-- <div id="toast">
      <div id="img">
        <i class="fa-regular fa-circle-xmark"></i>
      </div>
      <div id="desc">Erreur lors de la sauvegarde du forfait</div>
    </div> -->

    <!-- END TOAST CONTENT -->
    <main class="admin_wrapper">
      <nav class="sidebar">
        <div
          style="
            border-bottom: 1px solid white;
            padding-bottom: 1rem !important;
          "
        >
          <h1>Point10recharge</h1>
        </div>
        <ul class="list_nav">
          <li><a href="admin.html">Dashbord</a></li>
          <li><a href="forfaits.html">Forfaits</a></li>
          <li><a href="commandes.html">Commandes</a></li>

          <li>
            <button
              class="toaast_btn"
              onclick="launch_toast(`Bundle saved successfully`, `error`)"
            >
              Show Toast
            </button>
          </li>
        </ul>
      </nav>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <div class="title_dash">
            <button>
              <i class="fa-solid fa-bars"></i>
            </button>
            <h2>Dashbord</h2>
          </div>
          <div>
            <a class="new_btn" href="register_new_bundle.html"
              >Nouveau foraits</a
            >
          </div>
        </div>

        <!-- page content -->
        <div class="resume_wrapper">
          <!-- resume item  -->
          <div class="review_item">
            <h4>Total Commandes</h4>
            <span>34567</span>
          </div>
        </div>

        <div class="resume_wrapper">
          <div class="active-calories review_item">
            <h4 style="align-self: flex-start">Commandes Réalisées</h4>
            <div class="active-calories-container">
              <div class="box" style="--i: 85%">
                <div class="circle">
                  <h2>85<small>%</small></h2>
                </div>
              </div>
              <div class="calories-content">
                <p><strong>Nouveau:</strong> <span> 400 </span></p>
                <p><strong>Total:</strong> <span> 1400 </span></p>
              </div>
            </div>
          </div>

          <div class="active-calories review_item">
            <h4 style="align-self: flex-start">Commandes non-Réalisées</h4>
            <div class="active-calories-container">
              <div class="box" style="--i: 85%">
                <div class="circle">
                  <h2>85<small>%</small></h2>
                </div>
              </div>
              <div class="calories-content">
                <p><strong>Nouveau:</strong> <span> 400 </span></p>
                <p><strong>Total:</strong> <span> 1400 </span></p>
              </div>
            </div>
          </div>
        </div>

        <!-- table -->
        <div class="body_section">
          <h2 class="title_section">Commandes de forfaits</h2>
          <div class="products_table">
            <!-- Responsive Table Section -->
            <table class="responsive-table">
              <?=$commande->TemplateCommande()?>
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
          <h2>Détails de la commande</h2>

          <button class="close-modal" aria-label="close modal" data-close>
            ✕
          </button>
        </header>
        <section class="modal-content">
          <div class="details_bundles">
            <div>
              <img src="../media/images/blue.png" alt="" />
            </div>
            <div>
              <p>Nom du forfait : <strong>Blue Night</strong></p>
              <p>Plan du forfait : <strong>Blue Mo</strong></p>
              <p>Volume 4G : <strong>7Go</strong></p>
              <p>
                Volume 3G a la fin du volume 4G :
                <strong>Illimité vers tous les sites</strong>
              </p>
              <p>Vitesse Max en 3G illimité : <strong>200 Kbps</strong></p>
              <p>SMS On-net : <strong>200 </strong></p>
              <p>Prix : <strong>2000 XAF / semaine </strong></p>
            </div>
          </div>
        </section>
        <!-- <footer class="modal-footer">The footer of the first modal</footer> -->
      </div>
    </div>

    <!-- update modal -->

    <div class="modal" id="modal3" data-animation="slideInOutLeft">
      <div class="modal-dialog">
        <header class="modal-header">
          <h2>Modifier de la commande</h2>

          <button class="close-modal" aria-label="close modal" data-close>
            ✕
          </button>
        </header>
        <section class="modal-content">
          <div class="details_bundles">
            <div></div>
            <div>
              <p>Nom du forfait : <strong>Blue Night</strong></p>
              <p>Plan du forfait : <strong>Blue Mo</strong></p>
              <p>Volume 4G : <strong>7Go</strong></p>
              <p>
                Volume 3G a la fin du volume 4G :
                <strong>Illimité vers tous les sites</strong>
              </p>
              <p>Vitesse Max en 3G illimité : <strong>200 Kbps</strong></p>
              <p>SMS On-net : <strong>200 </strong></p>
              <p>Prix : <strong>2000 XAF / semaine </strong></p>
            </div>
          </div>

          <form
            action="
          "
          >
            <div class="form_item">
              <label for="">Valider la commande</label>
              <!-- <div class="check-box">
                <input type="checkbox" />
              </div> -->

              <div class="button button-2 green_btn" id="">
                <div class="slide"></div>
                <span class="text_btn" href="#">Valider la commande</span>
              </div>
            </div>

            <div class="form_item">
              <label for="">Cloturer la commande</label>
              <!-- <div class="check-box">
                <input type="checkbox" />
              </div> -->

              <div class="button button-2" id="">
                <div class="slide"></div>
                <span class="text_btn" href="#">Cloturer la commande</span>
              </div>
            </div>
          </form>
        </section>
        <!-- <footer class="modal-footer">The footer of the first modal</footer> -->
      </div>
    </div>

    <!-- delete modal -->
    <div class="modal" id="modal2" data-animation="mixInAnimations">
      <div class="modal-dialog">
        <header class="modal-header">
          <h2>Sure de le faire ?</h2>
          <button class="close-modal" aria-label="close modal" data-close>
            ✕
          </button>
        </header>
        <section class="modal-content">
          <p>
            <strong>Supprimer la commande N° #567876</strong>
          </p>
          <form
            action="
         "
          >
            <button class="delete_btn">Supprimer</button>
          </form>
        </section>
        <!-- <footer class="modal-footer">The footer of the second modal</footer> -->
      </div>
    </div>
    <form id="form-cache" style="display:none">
      <input type="text" name="query" />
      <input type="text" name="id" />
      <input type="text" name="motif" />
      <input type="text" name="id_commande" />
      <input type="text" name="id_admin" value='1' />
    </form>

  </body>
</html>

