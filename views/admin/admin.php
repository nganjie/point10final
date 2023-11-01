<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin point10recharge</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/admin.css" />
  </head>
  <body>
    <main class="admin_wrapper">
      <nav class="sidebar">
        <div>
          <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
        </div>
        <ul class="list_nav">
          <li><a href="admin.html">Dashbord</a></li>
          <li><a href="forfaits.html">Forfaits</a></li>
          <li><a href="commandes.html">Commandes</a></li>
        </ul>
      </nav>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <h1>Dashbord</h1>
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
