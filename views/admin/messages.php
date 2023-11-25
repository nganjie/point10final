<?php
forcer_utilisateur_connecter_admin();
$admin =$params['admin'];
$admin->allUsers();
$client="";
echo $_SESSION['adm-id_utilisateur'];

$id=(int)$_SESSION['adm-id_utilisateur'];
if(isset($params['client']))
{
    echo "cela marche plutot bien";
    $client =$params['client'];
    
}else{
    //echo "rien ne va ici bas ";
}

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
            <h4>Total Messages</h4>
            <span>34567</span>
          </div>

          <!-- resume item  -->
          <div class="review_item">
            <h4>Total Discussion</h4>
            <span>34567</span>
          </div>
        </div>

        <!-- message -->

        <div id="frame">
          <div id="sidepanel">
            <div id="profile">
              <div class="wrap">
                <img
                  id="profile-img"
                  src="<?= SCRIPTS ?>../media/images/Sans titre.jpeg"
                  class="online"
                  alt=""
                />
                <p>Mike Ross</p>
                <i
                  class="fa fa-chevron-down expand-button"
                  aria-hidden="true"
                ></i>
              </div>
            </div>

            <div id="contacts">
                <?= $admin->TemplateUsers() ?>
            </div>
          </div>
          
          <div class="content">
            <div class="contact-profile">
              <img src="<?= SCRIPTS ?>../media/images/Sans titre.jpeg" alt="" />
              <p><?=isset($params['client'])?$client->nom:"selctioner un client" ?></p>
            </div>
            <div class="messages">
              <ul>
              <?php if(isset($params['client']))
                echo $client->TemplateMessage($id);else "" ;?>
              </ul>
            </div>
            <div class="message-input">
                <form method="POST" action="<?=$id?>">
                <div class="wrap">
                <input type="text" name="message" placeholder="Write your message..." />
                <input type="text" name="id_rec" value="<?=isset($params['client'])?$client->id:0 ?>" style="display:none" />
                
                <button type="submit" class="submit">envoyer</button>
              </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
