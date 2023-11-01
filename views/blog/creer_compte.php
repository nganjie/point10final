<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../../css/index.css" />
    <link rel="stylesheet" href="../../css/contacts.css" />
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
    <script src="/js/mobile_menu.js" defer></script>
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
            <a href="index.html">Accueil</a>
          </li>
          <li>
            <a href="contacts.html">Contact</a>
          </li>

          <li>
            <a href="forfaits.html">Nos forfaits</a>
          </li>

          <li>
            <a href="se_connecter.html">Se connecter</a>
          </li>
          <li>
            <a href="creer_compte.html">S'inscrire</a>
          </li>
        </ul>

        <div class="logo_sect_mobile">
          <a href="/"
            ><img
              src="/media/logo-point10final.png"
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
            src="/media/logo-point10final.png"
            alt="logo de point10recharge"
        /></a>

        <ul class="nav_wrap_list">
          <li class="">
            <a href="index.html">Accueil</a>
          </li>
          <li class="">
            <a href="contacts.html">Contacts</a>
          </li>

          <li>
            <a href="forfaits.html">Nos forfaits</a>
          </li>

          <li>
            <a href="se_connecter.html">Se connecter</a>
          </li>
          <li class="active_nav_item">
            <a href="creer_compte.html">S'inscrire</a>
          </li>
        </ul>

        <button class="open_btn"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </header>

    <main class="main_content">
      <!-- banner -->
      <section class="banner_wrapper small_banner">
        <div class="banner_content">
          <div class="banner_content_right">
            <h1 class="banner_title">Se créer un compte</h1>

            <div class="banner_description">
              Inscrivez-vous dès maintenant pour bénéficier de réductions
              spéciales et être informé en avant-première de nos nouvelles
              promotions plus tard. Rejoignez notre communauté et profitez des
              meilleurs tarifs sur nos forfaits.
            </div>
          </div>
        </div>
      </section>

      <section class="body_section">
        <h2 class="title_section">nous laisser un message.</h2>

        <form action="" id="message_form">
          <!-- <div class="group_input"> -->
          <input type="text" name="name" id="" placeholder="Nom..." />
          <input
            type="text"
            name="number"
            id=""
            placeholder="Numéro de téléphone..."
          />
          <!-- </div> -->
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
      </section>
    </main>

    <!-- footer -->
    <footer class="footer_wrapper">
      <div class="footer_content">
        <div class="footer_top_content">
          <div class="footer_section">
            <div>
              <img src="/media/logo-point10final.png" alt="" />
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

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
