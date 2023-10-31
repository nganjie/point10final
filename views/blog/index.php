<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="<?= SCRIPTS ?>../../css/index.css" />
  <title>Document</title>

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
  <script src="<?= SCRIPTS ?>../../js/mobile_menu.js" defer></script>
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
          <a href="contacts">Contact</a>
        </li>

        <li>
          <a href="#contact">Nos forfaits</a>
        </li>
        <li>
          <a href="#contact">Accueil</a>
        </li>
        <li>
          <a href="#contact">Se connecter</a>
        </li>
        <li>
          <a href="#contact">S'inscrire</a>
        </li>
      </ul>

      <div class="logo_sect_mobile">
        <a href="/"><img src="<?= SCRIPTS ?>../../media/logo-point10final.png" alt="logo de point10recharge" /></a>
        <div class="social_icon">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </nav>
    <!-- main site menu -->
    <nav id="nav_wrap">
      <a href="/"><img src="<?= SCRIPTS ?>../../media/logo-point10final.png" alt="logo de point10recharge" /></a>

      <ul class="nav_wrap_list">
        <li class="active_nav_item">
          <a href="">Accueil</a>
        </li>
        <li>
          <a href="contacts">Contact</a>
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
Découvrez le paradis bleu et l'aventure Yoome sur notre site de vente en ligne
              Découvrez le paradis bleu et l'aventure Yoome sur notre site de vente en ligne ! Plongez dans une expérience unique où les eaux cristallines et les paysages à couper le souffle vous attendent. Explorez nos forfaits exclusifs et laissez-vous séduire par des escapades inoubliables. Préparez-vous à vivre des moments de détente absolue et d'excitation intense. Ne manquez pas cette opportunité de créer des souvenirs inestimables. Rejoignez-nous dès maintenant et laissez la magie opérer !"

 -->
  <main class="main_content">
    <!-- banner -->
    <section class="banner_wrapper">
      <div class="banner_content">
        <div class="banner_content_right">
          <h1 class="banner_title">
            reChercher le forait qui convient à vos besoin de connectivité
            <span class="line_through"> illimité. </span>
          </h1>

          <div class="banner_description">
            Parcourez notre vaste liste de forfaits , disponible pour tous les
            réseaux et soyez des aujourd'hui plus que jamais connecté.
          </div>
          <div class="start_now">
            <a href="#">Commencer maintenant</a>
          </div>

          <div class="resume_section">
            <div class="resume_section_item">
              <span class="big_heading"> 10+ </span>
              <span>Réseaux supporter</span>
            </div>
            <hr />
            <div class="resume_section_item">
              <span class="big_heading"> 200+ </span>
              <span> Clients satisfaits </span>
            </div>
          </div>
        </div>
        <!-- <div class="banner_content_left">
            <img
              src="/media/images/belle-fille-noire-se-sent-excitee-regardant-quelque-chose-son-telephone_216356-2331-removebg-preview.png"
              alt=""
            />
          </div> -->
      </div>
    </section>

    <!-- security -->
    <section class="body_section">
      <h2 class="title_section">Bien de choses nous distingue du reste</h2>
      <div class="support">
        <div>
          <i class="fa-solid fa-question"></i>
          <p>Sécurité</p>
        </div>

        <div>
          <i class="fa-solid fa-forward"></i>
          <p>Rapidité</p>
        </div>

        <div>
          <i class="fa-solid fa-user-clock"></i>
          <p>Sécurité</p>
        </div>

        <div>
          <i class="fa-solid fa-user-clock"></i>
          <p>Support</p>
        </div>
      </div>
    </section>

    <section class="body_section">
      <h2 class="title_section">ces entreprises nous font confiance</h2>
      <div class="company_logo">
        <img alt="e" src="<?= SCRIPTS ?>../../media/images/BLUE.jpeg" />
        <!-- <img src="e" src="/media/images/images.jpeg" /> -->
        <img src="<?= SCRIPTS ?>../../media/images/logo-yoomee-mobile-489 (1).png" alt=" Yoome logo" />
        <img src="<?= SCRIPTS ?>../../media/images/téléchargement.jpeg" alt="" />
        <img src="<?= SCRIPTS ?>../../media/images/images.png" alt="" />
      </div>
    </section>

    <!-- top selling -->
    <!-- <section class="body_section">
        <h1 class="title_section">crédit actuellment disponible.</h1>
      </section> -->

    <!-- top selling -->
    <section class="body_section how_it_work">
      <h1 class="title_section">Comment ça marche ?</h1>

      <div class="step_wrap">
        <div class="step_wrap_item">
          <div>
            <img
              src="<?= SCRIPTS ?>../../media/images/6333195_adjudication_assortment_choice_culling_resolving_icon-q7orve2eg0xkdj15uy3bvimb4m09hmpafspb63a5ew.png"
              alt="" />
          </div>
          <section class="description_step">
            <h3>1. Choix de l'opérateur</h3>
            <p>
              Choisissez l’opérateur pour lequel vous souhaitez disposer de
              données mobiles, puis choisissez le pack qui vous convient le
              mieux.
            </p>
          </section>
        </div>

        <div class="step_wrap_item">
          <div>
            <img
              src="<?= SCRIPTS ?>../../media/images/5027839_business_rocket_start_icon-q7orx5zfcrd2b0gbhppyl2hnit9811r1cl2bswndns.png"
              alt="" />
          </div>
          <!-- src="/media/images/172465_flag_finish_goal_icon-q7orxqnvj45defma4ynr3x9slafaqe14rff0czspuw.png" -->
          <section class="description_step">
            <h3>2. Débuté la transaction</h3>
            <p>
              Après avoir choisi le pack qui vous convient. Cliquez dessus et
              entrez les informations nécessaires, puis cliquez sur
              poursuivre.
            </p>
          </section>
        </div>

        <div class="step_wrap_item">
          <div>
            <img
              src="<?= SCRIPTS ?>../../media/images/172465_flag_finish_goal_icon-q7orxqnvj45defma4ynr3x9slafaqe14rff0czspuw.png"
              alt="" />
          </div>
          <section class="description_step">
            <h3>3. Finaliser la transaction</h3>
            <p>
              Après avoir cliqué sur « soumettre », saisissez les informations
              complémentaires et payez. Vous serez ensuite redirigé vers une
              page de remerciement. Merci de votre confiance
            </p>
          </section>
        </div>
      </div>
    </section>

    <!-- top selling -->
    <section class="body_section">
      <h1 class="title_section">actuellement disponible</h1>
      <div class="categorie_wrap">
        <div class="blue_categorie_cart">
          <a href="#" class="underline_hover_after">Débuter maintenant <i class="fa-solid fa-arrow-right-long"></i></a>
          <div class="image_containt">
            <img src="<?= SCRIPTS ?>../../media/images/BLUE.jpeg" alt="" />
          </div>
        </div>

        <div class="blue_categorie_cart yoome">
          <a href="#" class="underline_hover_after">Débuter maintenant <i class="fa-solid fa-arrow-right-long"></i></a>
          <div class="image_containt">
            <img src="<?= SCRIPTS ?>../../media/images/logo-yoomee-mobile-489.png" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- client reviews -->
    <section class="body_section">
      <h2 class="title_section">Nos clients satisfaits</h2>
      <div class="review_wrap">
        <!-- client review -->
        <div class="client_review">
          <div class="author">
            <img src="<?= SCRIPTS ?>../../media/images/image_girl.png" alt="cleint image" />
            <div>
              <h4>Sythian Drandale</h4>
              <p>Maketer Digital</p>
            </div>
          </div>
          <p>
            J'ai récemment utilisé le site de ventes de forfaits internet en
            ligne point10recharge et je suis extrêmement satisfait du service
            que j'ai reçu. Non seulement le processus d'achat était simple et
            rapide, mais j'ai également trouvé des forfaits internet à des
            prix très compétitifs.
          </p>
        </div>

        <!-- client review -->
        <div class="client_review">
          <div class="author">
            <img src="<?= SCRIPTS ?>../../media/images/image_girl.png" alt="cleint image" />
            <div>
              <h4>Ivan Silatsa</h4>
              <p>Développeur</p>
            </div>
          </div>
          <p class="description">
            Une fois ma commande passée, j'ai été agréablement surpris par la
            rapidité de la livraison. Mon nouveau modem a été livré dans les
            délais annoncés et l'installation a été un jeu d'enfant grâce aux
            instructions claires fournies.
          </p>
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
            <img src="<?= SCRIPTS ?>../../media/logo-point10final.png" alt="" />
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>