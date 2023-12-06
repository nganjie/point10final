<?php
//echo $params['forfait']->AllForfait();
$categorie=$params['forfait']->AllCategorie();
$actif="forfait";
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
    <title>Formulaire de contacts</title>

    <!-- font awesome -->
    <script
      src="https://kit.fontawesome.com/6e9cf17fd4.js"
      crossorigin="anonymous"
    ></script>

    <!-- javascript cdn and file -->
    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>

    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>

    <!-- js file -->
    <script src="<?= SCRIPTS ?>../js/mobile_menu.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/caroussel.js" defer></script>

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
            <h1 class="banner_title">nos forfaits</h1>

            <div class="banner_description">
              Ici , vous Trouverez tous les informations néccessaire pour
              contacter les admistrateurs du site. Vous pouvez aussi directement
              leur laisser un message dépuis le formulaire.
            </div>
          </div>
        </div>
      </section>

      <section class="body_section">
        <h2 class="title_section">liste de forfaits disponible.</h2>

        <!-- caroussel for bundle -->

        <div class="container">
          <div class="carousel">
            <div class="nav nav-left">
            <i class="fa-solid fa-chevron-left"></i>
            </div>
            
            <div class="carousel-content" id="carousel-forfait">
             
              <?= $params['forfait']->AllForfait(); ?>

             
            </div>

            <div class="nav nav-right">
            <i class="fa-solid fa-chevron-right"></i>
            </div>
          </div>
        </div>

        <!-- end caroussel for bundle -->

        <div class="bundle_section_wrapper">
          <!-- filter form -->
          <form action="" id="filter_form">
            <h3>Faites une recherche ici</h3>

            <p>Catégorie du forfait</p>
            <select name="categorie" class="categorie" id="categorie">
              <option value="">-- choisir une catégorie --</option>
              <?php foreach($categorie as $ca):?>
              <option value="<?= $ca->nom?>"><?= $ca->nom?></option>

              <?php endforeach; ?>
            </select>

            <p class="qte_value">Qauntité en Go :</p>
            <div id="qte"></div>

            <p class="price_value">Prix :</p>
            <div id="price"></div>
          </form>

          <!-- bundles section -->
          <div id="bundle-forfait">
            <div>
              <h3>Catégorie X</h3>
              <div class="sjow_bundle_wrapper">
                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>

                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>
                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <!-- bundles section -->
            <div>
              <h3>Catégorie S</h3>
              <div class="sjow_bundle_wrapper">
                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>

                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>
                <!-- bundle item -->
                <a href="" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="<?= SCRIPTS ?>../media/images/blue.png" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">Blue Night</p>
                      <h4 class="bundle_name">5Go valide 22H à 6H</h4>
                      <p>15 min appel tous réseaux</p>
                      <p>100 SMS On-net</p>
                    </div>
                    <div>
                      <span class="bundle_name">12500 XFA</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <form action="" method="POST" id="form-id" style="display:none">
      <input type="text" name="query" value="forfait"/>
    </form>
    </main>

    <!-- footer -->
    <?php require "footer.php" ?>
  </body>
  <script type ="module" src="<?= SCRIPTS ?>../js/range_slider.js" defer></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script type="module" src="<?= SCRIPTS ?>../js/forfait.js" defer></script>
</html>
