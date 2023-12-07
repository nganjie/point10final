<?php

use App\Models\Client;

forcer_utilisateur_connecter();
$client =new Client($this->db,$_SESSION["id_utilisateur"]);
$client->setInfo($_SESSION['id'],$_SESSION['ville'],$_SESSION['email']);
$actif="message_client";
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

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/message.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
    <title>Page de contacts</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>
    <!-- Load Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>

    <!-- js file -->
    <script type="module" src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
  </head>
  <body>
  <?php require "header.php" ?>

    <!-- modla -->

    <!-- Scrollable modal -->
    <div id="contacts_form" class="modal-dialog modal-dialog-scrollable">
      ...
    </div>
    <!-- 
 -->
    <main class="main_content">
      <!-- banner -->
      <section class="banner_wrapper small_banner">
        <div class="banner_content">
          <div class="banner_content_right">
            <h1 class="banner_title">Messages</h1>

            <div class="banner_description">
              Ici , vous Trouverez tous les informations néccessaire pour
              contacter les admistrateurs du site. Vous pouvez aussi directement
              leur laisser un message dépuis le formulaire.
            </div>
          </div>
        </div>
      </section>

      <!-- <section class="body_section">
        <h2 class="title_section">nous laisser un message.</h2>

        <form action="" id="message_form">
          <input type="text" name="name" id="" placeholder="Nom..." />
          <input
            type="text"
            name="number"
            id=""
            placeholder="Numéro de téléphone..."
          />
          <input
            type="number"
            name="montant"
            id=""
            placeholder="Adresse montant..."
          />
          <textarea
            name="message"
            id=""
            cols="30"
            rows="10"
            placeholder="Votre message ici"
          ></textarea>

          <button class="form_btn">Envoyer</button>
        </form>
      </section> -->

      <section class="body_section">
        <h2 class="title_section">nous laisser un message.</h2>

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
                <p>Vous</p>
              </div>
            </div>

            <div id="contacts">
              <ul>
                <li class="contact active">
                  <div class="wrap">
                    <img src="<?= SCRIPTS ?>../media/images/Sans titre.jpeg" alt="" />
                    <div class="meta">
                      <p class="name">Admin</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="content">
            <div class="contact-profile">
              <img src="<?= SCRIPTS ?>../media/images/Sans titre.jpeg" alt="" />
              <p>Admin</p>
            </div>
            <div class="messages">
              <ul>
              <?php 
                echo $client->TemplateMessage($_SESSION['id_utilisateur']);?>
              </ul>
            </div>
            <div class="message-input">
            <form method="POST" action="message-client">
                <div class="wrap">
                <input type="text" name="message" placeholder="Write your message..." />
                <input type="text" name="id_rec" value="14" style="display:none" />
                <input type="text" name="nom" value="<?=$_SESSION['nom']?>" style="display:none" />
                <input type="text" name="numero" value="<?=$_SESSION['numero']?>" style="display:none" />
                <input type="text" name="ville" value="<?=$_SESSION['ville']?>" style="display:none" />
                <input type="text" name="mail" value="<?=$_SESSION['email']?>" style="display:none" />
                <input type="text" name="id_send" value="<?=$_SESSION['id_utilisateur']?>" style="display:none" />
                <button type="submit" class="submit">envoyer</button>
              </div>
                </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php require "footer.php" ?>
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
