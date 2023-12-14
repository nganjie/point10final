<?php
$actif="detaille_forfait" 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/bundles.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/caroussel_styles.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/bundle_details.css" />
    <?php require "favicon.php"; ?>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
    />
    <title>Formulaire de contacts</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <!-- javascript cdn and file -->
    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>

    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <!-- js file -->
    <script src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
 
  </head>
  <body>
  <?php require "header.php" ?>

    <main class="main_content">
      <!-- banner -->
      <!-- <section class="banner_wrapper small_banner">
        <div class="banner_content">
          <div class="banner_content_right">
            <h1 class="banner_title">nos forfaits</h1>

            <div class="banner_description">
              Ici , vous Trouverez tous les informations néccessaire pour
              contacter les admistrateurs du site. Vous pouvez aussi directement
              leur laisser un message dépuis le formulaire.
            </div>
          </div>
        </div>
      </section> -->

      <section class="body_section">
        <h2 class="title_section">Détail d'un forfait</h2>

       <?=$params["forfait"]->TemplateDetaille() ?>
      </section>

      <section class="body_section">
        <h2 class="title_section">Autre forfait similaire</h2>

        <!-- bundle item -->
       <?=$params["forfait"]->otherForfait()?>
      </section>
    </main>

    <!-- footer -->
    <?php require "footer.php" ?>
  </body>
 
  <script>
   /* document.addEventListener("DOMContentLoaded", function () {
      //  new Splide(".splide");

      var splide = new Splide(".splide", {
        type: "loop",
        perPage: 3,
      });
      splide.mount();
    });*/
  </script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
