<?php
$actif="contact";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
  <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
  <title>Formulaire de contacts</title>

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/6e9cf17fd4.js" crossorigin="anonymous"></script>
  <!-- Load Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>

  <!-- js file -->
  <script src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
  <script src="<?= SCRIPTS ?>../js/message_contact.js" defer></script>
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
          <h1 class="banner_title">Contacts</h1>

          <div class="banner_description">
            Ici , vous Trouverez tous les informations néccessaire pour
            contacter les admistrateurs du site. Vous pouvez aussi directement
            leur laisser un message dépuis le formulaire.
          </div>
        </div>
      </div>
    </section>

    <section class="body_section">
      <h2 class="title_section">nous laisser un message.</h2>
      <p style="color:#41f1b6"><?= isset($_GET['valid'])?"votre message à bien été envoyé a l'administrateur du site":""?></p>
      <form action="enregistrer_message_contact" method="POST" id="message_form">
        <div class="group_input">
          <input type="text" name="name" id="" placeholder="Nom..." />
          <input type="text" name="number" id="" placeholder="Numéro de téléphone..." />
        </div>
        <input type="text" name="email" id="" placeholder="Adresse email..." />
        <textarea name="message" id="" cols="30" rows="10" placeholder="Votre message ici"></textarea>

        <input type="submit" class="form_btn" value="Envoyer">
      </form>
    </section>
  </main>

  <!-- footer -->
  <?php require "footer.php" ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>