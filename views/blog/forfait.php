<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/contacts.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../csstmp/bundles.css" />
    <title>Formulaire de contacts</title>

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

        <div class="bundle_section_wrapper">
          <!-- filter form -->
          <form action="" id="filter_form">
            <h3>Faites une recherche ici</h3>
            <p>Choix de l'operateur</p>
            <div class="form_item">
              <input type="checkbox" id="blue" value="forfaits_blue" />
              <label for="blue">Camtel</label>
            </div>
            <p>Catégorie du forfait</p>
            <div class="group_input">
              <div class="form_item">
                <input type="checkbox" id="blue" value="forfaits_blue" />
                <label for="blue">Blue</label>
              </div>
              <div class="form_item">
                <input type="checkbox" id="yoome" value="forfaits_yoome" />
                <label for="yoome">Yoome</label>
              </div>
            </div>

            <div>
              <p>Qauntité en Go :</p>
              <input type="range" name="name" id="" placeholder="Nom..." />
            </div>

            <div>
              <p>Prix :</p>
              <input type="range" name="name" id="" placeholder="Nom..." />
            </div>

            <!-- <button class="form_btn">Envoyer</button> -->
          </form>

          <!-- bundles section -->
          <div>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem,
              quisquam. Nostrum odit dolorem dolorum eius mollitia harum
              molestias sint cum, cupiditate recusandae sequi corporis
              reprehenderit, eaque repellendus vitae consequatur odio.
            </p>
            <a href="" class="bundle_item">
              <div class="bundle_item_content">
                <p>blue</p>
                <h4 class="bundle_name">giga data BX56</h4>
                <p class="bundle_price">12500 FCFA</p>
              </div>
            </a>

            <a href="" class="bundle_item">
              <div class="bundle_item_content bundle_item_content_yoome">
                <p>yoome</p>
                <h4 class="bundle_name">giga data BX56</h4>
                <p class="bundle_price">12500 FCFA</p>
              </div>
            </a>

            <a href="" class="bundle_item">
              <div class="bundle_item_content bundle_item_content_orange">
                <p>orange</p>
                <h4 class="bundle_name">giga data BX56</h4>
                <p class="bundle_price">12500 FCFA</p>
              </div>
            </a>
          </div>
        </div>
      </section>
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
      <form id="form-id" style="display:none">
        <input type="text" name="query" value="forfait"/>
      </form>
    </footer>
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script type="module" src="<?= SCRIPTS ?>../js/forfait.js"></script>
</html>