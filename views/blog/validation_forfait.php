<?php
$forfait =$params['forfait'];
$date = new DateTime();
//echo $forfait->nom;
//var_dump($params['forfait']);
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/contacts.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/index.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/multi_form.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/template_bill_preview.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/bundle_details.css" />
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/countdown.css" />

    <script src="<?= SCRIPTS ?>../js/multiple_form.js" defer></script>
    <script src="<?= SCRIPTS ?>../js/countdown.js" defer></script>
    <title>Validation d'un forfait</title>
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
            <a href="se_connecter.html"></a>
          </li>
          <li>
            <a href="creer_compte.html"></a>
          </li>

          <li class="user_dashbord_link">
            <a href="">
              <i class="fa-solid fa-user"></i>
              <span>Ivan</span>
            </a>
          </li>
        </ul>

        <div class="logo_sect_mobile">
          <a href="index.html"
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
          <li class="active_nav_item">
            <a href="#contact">Accueil</a>
          </li>
          <li>
            <a href="contacts.html">Contact</a>
          </li>

          <li>
            <a href="forfaits.html">Nos forfaits</a>
          </li>

          <li>
            <a href="creer_compte.html">S'incrire</a>
          </li>
          <li>
            <a href="se_connecter.html">Se connecter</a>
          </li>
          <li class="user_dashbord_link">
            <a href="dasnord_client.html">
              <i class="fa-solid fa-user"></i>
              <span>Ivan</span>
            </a>
          </li>
        </ul>

        <button class="open_btn"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </header>

    <main class="main_content">
      <div class="body_section">
       <?= $params['forfait']->SingleTemplate(); ?>
      </div>

      <section id="multi_step_section" class="body_section multi_step">
        <div id="userForm">
          <form id="valid-form">
            <h2 class="title_section">Validation de commande</h2>

            <ul data-steps>
              <li class="list active">
                <span> Informations Personnelles </span>
              </li>
              <li class="list">
                <span> Détails du forfait </span>
              </li>
              <li class="list">
                <span> Confirmation de la commande </span>
              </li>
            </ul>

            <div class="single-form">
              <span> Informations Personnelles </span>
              <div class="input-group">
                <label for="name">Nom : </label
                ><input
                  type="text"
                  class="user-name input-field"
                  value=""
                  placeholder="Votre nom : "
                  name="name"
                  id="name"
                />
              </div>
              <div class="input-group">
                <label for="email">Email : </label
                ><input
                  type="email"
                  class="user-email input-field"
                  id="email"
                  value=""
                  placeholder="Adresse email"
                  name="email"
                />
              </div>
              <div class="input-group">
                <label for="phone_number">Numero de téléphone : </label
                ><input
                  id="phone_number"
                  type="number"
                  class="user-phone input-field"
                  value=""
                  placeholder="Téléphone du béneficiare"
                  name="phone_number"
                />
              </div>
              <div class="input-group">
                <label for="whatsapp_number">Numéro whatsapp : </label
                ><input
                  id="whatsapp_number"
                  type="number"
                  class="user-date input-field"
                  value=""
                  placeholder="Numéro whatsapp"
                  name="whatsap-number"
                />
              </div>
              <div class="btn-container">
                <button
                  class="btn prev"
                  type="button"
                  style="visibility: hidden"
                ><i class="fa-solid fa-arrow-left-long"></i>
                  Précédent</button
                ><button class="btn next" type="button">Suivant <i class="fa-solid fa-arrow-right-long"></i></button>
              </div>
            </div>

            <!--  -->
            <div class="single-form hide">
              <div class="input-group" >

                <h4>Mode de paiement</h4>
              </div>
              <div class="input-line input-group">
                <label for="methode">Orange Money</label>
                <div class="input-img">
                  <img
                    src="<?= SCRIPTS ?>../media/methode_paiement_2.png"
                    alt="méthode de paiement"
                  />
                </div>
                <input
                  id="methode"
                  type="radio"
                  class="user-radio input-field"
                  name="methode"
                  checked="true"
                  value="Orange Money"
                />
              </div>

              <div class="input-line input-group">
                <label for="methode1">MTN Mobile money</label>
                <div class="input-img">
                  <img
                    src="<?= SCRIPTS ?>../media/methode_paiement_1.jpeg"
                    alt="méthode de paiement"
                  />
                </div>
                <input
                  id="methode1"
                  type="radio"
                  class="user-radio input-field"
                  name="methode"
                  placeholder="Numéro de transaction"
                  value="MTN Mobile money"
                />
              </div>
              <div class="input-description">
                <h1>Guide de paiement Orange Money Cameroun</h1>
                <p>Composer le <h3>

                  #150*14*272180*656968696*le_montant_ici#
                </h3> 
              </p>
              </div>

              <div class="input-group">
                <label for="pay_number">Numéro payeur : </label
                ><input
                  id="pay_number"
                  type="text"
                  class="user-fb input-field"
                  value=""
                  name="pay_number"
                  placeholder="Numéro qui paye"
                />
              </div>
              <div class="input-group">
                <label for="transaction_number">Numéro de transaction : </label
                ><input
                  id="transaction_number"
                  name="transaction_number"
                  type="text"
                  class="user-nt input-field"
                  value=""
                  placeholder="Numéro de transaction"
                />
              </div>

              

             
              
              <div class="btn-container">
                <input type="text" name="query" value="commande_forfait" style="display:none"/>
                <input type="number" name="id_forfait" value="<?= $params["forfait"]->id?>" style="display:none"/>
                <input type="number" name="id_client" value="<?php isset($params['user'])?-1:-1;  ?>" style="display:none"/>
                <button class="btn prev" type="button">Précédent</button
                ><button class="btn next" type="submit">Validé</button>
              </div>
            </div>
          </form>
          <div id="error"></div>
          <!-- Confirmation de la commande  -->
          <div class="single-form hide">
            <span> Confirmation de la commande </span>

            <!-- countdwn -->
            <div id="container_count_down">
              <h1 id="headline">Veillez patienter</h1>
              <div id="countdown">
                <ul>
                  <li><span id="minutes"></span>Minutes</li>
                  <li><span id="seconds"></span>Seconds</li>
                </ul>
              </div>
              <div id="content" class="emoji">
                <span>🥳</span>
                <span>🎉</span>
                <span>🎂</span>
              </div>
            </div>

            <button class="btn prev" type="button">Précédent</button
            ><button class="btn next" style="visibility: hidden" type="button">
              Validé
            </button>
          </div>
        </div>

        <!-- preview facture -->
        <div id="preview">
          <div class="wrapper">
            <section class="bill_head">
              <div>
                <img src="<?= SCRIPTS ?>../media/logo-point10final.png" alt="" />
              </div>
              <div>Reçu Client</div>
            </section>
            <div class="background_pre">point10recharge</div>
            <!-- user details -->
            <section class="user_bill_details">
              <!-- right -->
              <div>
                <p>Point10recharge</p>
                <p>Plateforme de vente en ligne de forfait</p>
                <p>
                  <a href="support@point10recharge.com" id="email-client"
                    >E-mail : @gmail.com</a
                  >
                </p>
                <strong><?=$date->format("Y-m-d H:i") ?></strong>
              </div>

              <!-- left -->
              <div>
                <p>Recu à</p>
                <strong id="name-client"> ........</strong>
                <p>Douala</p>
                <p id="number-client">+237 ...</p>
                <p>ivansilatsa@gmail.com</p>
                <p>Cameroun</p>
              </div>
            </section>

            <!--  -->
            <div>
              <p>Désignation</p>
              <strong ><?= $params["forfait"]->nom ?></strong>
            </div>
            <div class="main_content_section">
              <div>
                <div>
                  <span>Invoice number</span>
                  <strong id="number-recharge">#FC-AD44G</strong>
                </div>

                <div>
                  <span>Référence</span>
                  <strong id="reference">MP044235710</strong>
                </div>
                <div>
                  <span>Mode de paiement</span>
                  <strong id="mode-paiemant">Orange money CM</strong>
                </div>
              </div>

              <!-- table details -->
              <div class="bill_section_table">
                <div class="bill_section">
                  <div class="bill_item">
                    <span class="w_30">QTE</span>
                    <span>ARTICLE</span>
                    <span class="flex_1">AMOUNT</span>
                  </div>

                  <div class="bill_item">
                    <span class="w_30">01</span>
                    <strong>Forfait <?= $params["forfait"]->nom ?></strong>
                    <span class="flex_1"><?= $params["forfait"]->prix ?>$USD</span>
                  </div>

                  <div class="bill_item">
                    <span>Facture</span>
                    <span class="flex_1">12/07/2023</span>
                  </div>
                  <div class="bill_item">
                    <span>Taille</span>
                    <span class="flex_1"><?= $params["forfait"]->nb_go ?>Go</span>
                  </div>
                  <div class="bill_item">
                    <span>Categorie</span>
                    <span class="flex_1"><?= $params["forfait"]->taille ?></span>
                  </div>
                  <div
                    class=""
                    style="
                      display: flex;
                      justify-content: space-between;
                      padding: 0.4rem 0.3rem;
                    "
                  >
                    <span> Total</span> <span class="flex_1"><?= $params["forfait"]->prix ?> XAF </span>
                  </div>

                  <div class="bill_item">
                    <strong>Montant net à payer (XAF)</strong>
                    <span class="style_price"><?= $params["forfait"]->prix ?> XAF</span>
                  </div>
                </div>

                <div>
                  <span>Important</span>
                  <p>
                    Cette facture est soumise aux conditions général de paiement
                    
                    . Bien vouloir les consulter sur
                    www.point10recharge.com
                  </p>
                </div>
              </div>
            </div>

            <div class="footer_wrapper_pre">
              <a>www.point10recharge.com</a>
              <p>support@point10recharge.com</p>
              <span>Page 1/1</span>
            </div>
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
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="<?= SCRIPTS ?>../js/valider_commande"></script>
  </body>
</html>
