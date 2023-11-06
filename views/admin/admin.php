
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/toast.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/admin.css" />

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <script src="<?= SCRIPTS ?>../js/toast.js" defer></script>
  </head>
  <body>
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
        <div>
          <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
        </div>
        <ul class="list_nav">
          <li><a href="admin.html">Dashbord</a></li>
          <li><a href="forfaits.html">Forfaits</a></li>
          <li><a href="commandes">Commandes</a></li>

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
            <a class="new_btn" href="admin/ajouter_forfait"
              >Nouveau foraits</a
            >
          </div>
        </div>

        <!-- page content -->
        <div class="resume_wrapper">
          <!-- resume item  -->
          <div class="review_item">
            <h4>Compte créer</h4>
            <span>34567</span>
          </div>
          <!-- resume item  -->
          <div class="review_item">
            <h4>Catégories</h4>
            <span>34567</span>
          </div>
          <!-- resume item  -->
          <div class="review_item">
            <h4>Forfaits vendus</h4>
            <span>34567</span>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

