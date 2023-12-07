<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
    <title>Création de compte</title>

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
    <script src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
  </head>
  <body>
    <main class="main_content">
      <!-- banner -->
      <div class="divided_main_content">
        <!--  -->

        <section class="body_section">
          <!-- <h2 class="title_section">nous laisser un message.</h2> -->

          <div class="bordered_content">
            <div class="message_with_logo_section">
              <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
            </div>
            <p style="color:red"><?= isset($_GET['result'])?"le mail renseigner existe déjà et appartient à un client !":""?></p>
            <form action="creation_compte" method="POST" id="compte_form">
              <div class="group_input">
                <input type="text" name="name" id="" placeholder="Nom..." />
                <input
                  type="text"
                  name="number"
                  id=""
                  placeholder="Numéro de téléphone..."
                />
              </div>
              <div class="group_input">
                <!-- <input
                  type="number"
                  name="montant"
                  id=""
                  placeholder="Adresse montant..."
                /> -->
             
                <input
                  type="text"
                  name="ville"
                  id=""
                  placeholder="Ville de résidence..."
                />
              </div>

              <input
                type="email"
                name="mail"
                id=""
                placeholder="Adresse mail..."
              />
              <input type="password" name="password" placeholder="definir un mot de passe"/>

              <input type="submit" class="form_btn" value="Creer">
            </form>
            <div class="green_link">
              Déja inscrit ?
              <a class="" href="se-connecter">Se conecter</a>
            </div>
          </div>
        </section>

        <section class="banner_wrapper">
          <div class="banner_content">
            <div class="banner_content_right">
              <h1 class="banner_title">créer un compte</h1>

              <div class="banner_description small_text">
                Inscrivez-vous dès maintenant pour bénéficier de réductions
                spéciales et être informé en avant-première de nos nouvelles
                promotions plus tard. Rejoignez notre communauté et profitez des
                meilleurs tarifs sur nos forfaits.
              </div>
              <div class="image_right">
                <img src="<?= SCRIPTS ?>../media/images/image_boy1.png" alt="" />
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="<?= SCRIPTS ?>../js/creer_compte.js"></script>
</html>
