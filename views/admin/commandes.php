<!DOCTYPE html>
<html lang="en">
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
          <li class="active"><a href="commandes.html">Commandes</a></li>
        </ul>
      </nav>

      <!-- header adamin -->
      <div class="content_wrapper">
        <div class="header_admin">
          <h1>Commandes</h1>
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
            <h4>Total commandes</h4>
            <span>34567</span>
          </div>
          <!-- resume item  -->
          <div class="review_item">
            <h4>Commandes Rejétées</h4>
            <span>34567</span>
          </div>
          <!-- resume item  -->
          <div class="review_item">
            <h4>Commandes Validéés</h4>
            <span>34567</span>
          </div>

          <!-- resume item  -->
          <div class="review_item">
            <h4>Commandes en Attentes</h4>
            <span>34567</span>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
