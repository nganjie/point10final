<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/contacts.css" />
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
    <script src="<?= SCRIPTS ?>../js/caroussel.js" defer></script>
  </head>
  <body>
    <header class="header_wrapper">
      <!-- menu for small vp -->
      <nav aria-label="mobile-menu" id="mobile-menu" class="mobile-menu-close">
        <div class="close_mobile_section">
          <button class="close_btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <ul class="lisy_menu_item">
          <li>
            <a href="#contact">Accueil</a>
          </li>
          <li>
            <a href="contacts.html">Contact</a>
          </li>

          <li>
            <a href="forfaits.html">Nos forfaits</a>
          </li>

          <li>
            <a href="#contact">Se connecter</a>
          </li>
          <li>
            <a href="#contact">S'inscrire</a>
          </li>
        </ul>

        <div class="logo_sect_mobile">
          <a href="/"
            ><img
              src="<?= SCRIPTS ?>../media/logo-point10final.png"
              alt="logo de point10recharge"
          /></a>
          <div class="social_icon">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </nav>
      <!-- main site menu -->
      <nav id="nav_wrap">
        <a href="/"
          ><img
            src="<?= SCRIPTS ?>../media/logo-point10final.png"
            alt="logo de point10recharge"
        /></a>

        <ul class="nav_wrap_list">
          <li class="">
            <a href="index.html">Accueil</a>
          </li>
          <li class="active_nav_item">
            <a href="contacts.html">Contact</a>
          </li>

          <li>
            <a href="#contact">Nos forfaits</a>
          </li>

          <li>
            <a href="#contact">Se connecter</a>
          </li>
          <li>
            <a href="#contact">S'inscrire</a>
          </li>
        </ul>

        <button class="open_btn"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </header>

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
              <div class="ion-chevron-left carousel-arrow-icon-left"></div>
            </div>
            
            <div class="carousel-content" id="carousel-forfait">
              <div class="slide slide-5">
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

            <div class="nav nav-right">
              <div class="ion-chevron-right carousel-arrow-icon-right"></div>
            </div>
          </div>
        </div>

        <!-- end caroussel for bundle -->

        <div class="bundle_section_wrapper">
          <!-- filter form -->
          <form action="" id="filter_form">
            <h3>Faites une recherche ici</h3>

            <p>Catégorie du forfait</p>
            <select name="" id="categorie">
              <option value="">-- choisir une catégorie --</option>
              <option value="">Catégorie E</option>
              <option value="">Catégorie D</option>
              <option value="">Catégorie M</option>
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
    <footer class="footer_wrapper">
      <div class="footer_content">
        <div class="footer_top_content">
          <div class="footer_section">
            <div>
              <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
            </div>
            <p>
              Nous proposons des forfaits adaptés à vos besoins et qui vous
              permettront d'être fier de les utiliser. Ils sont disponibles pour
              tous les réseaux Blue et Yoome.
            </p>

            <div class="social_icon">
              <a><i class="fa-brands fa-facebook"></i></a>
              <a><i class="fa-brands fa-twitter"></i></a>
              <a><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
          <div class="details_footer_wrap">
            <section class="footer_section">
              <h2 class="footer_title">ENTREPRISE</h2>
              <ul>
                <li><a href="#">Support Cleint</a></li>
                <li><a href="#">Détails de livraison</a></li>
                <li><a href="#">Termes et conditions</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
              </ul>
            </section>

            <section class="footer_section">
              <h2 class="footer_title">aide</h2>
              <ul>
                <li><a href="#">Support Cleint</a></li>
                <li><a href="#">Détails de livraison</a></li>
                <li><a href="#">Termes et conditions</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
              </ul>
            </section>

            <section class="footer_section">
              <h2 class="footer_title">FAQS</h2>
              <ul>
                <li><a href="#">Compte</a></li>
                <li><a href="#">Livraison</a></li>
                <li><a href="#">paiement</a></li>
              </ul>
            </section>
          </div>
        </div>
        <hr />
        <div class="foter_desxcript">
          @point10recharge &copy; 2023. Tous droits réservés
        </div>
      </div>
    </footer>
  </body>
  <script src="<?= SCRIPTS ?>../js/range_slider.js"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script type="module" src="<?= SCRIPTS ?>../js/forfait.js"></script>
</html>
