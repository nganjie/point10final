<?php
$forfait =$params['forfait'];
$date = new DateTime();
$actif="validation_forfait"
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
    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/toast.css" />
    <?php require "favicon.php"; ?>



    <script type="module" src="<?= SCRIPTS ?>../js/multiple_form.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/createPdf.js" defer></script>
    <script type="module" src="<?= SCRIPTS ?>../js/new_countDown.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Validation d'un forfait</title>
  </head>
  <body>
  <?php require "header.php" ?>
    <main class="main_content">
      
       <?= $params['forfait']->SingleTemplate(); ?>
     

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

            <div class="single-form" id="info-div">
              <span> Informations Personnelles </span>
              <div class="input-group" id="info-div">
                <label for="name">Nom : </label
                ><input
                  type="text"
                  class="user-name input-field"
                  value="<?= isset($_SESSION['nom'])?$_SESSION['nom']:"" ?>"
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
                  value="<?= isset($_SESSION['email'])?$_SESSION['email']:"" ?>"
                  placeholder="Adresse email"
                  name="email"
                />
              </div>
              <div class="input-group">
                <label for="nom-entreprise">Nom de l'entreprise(facultatif) : </label
                ><input
                  type="text"
                  class="user-entreprise input-field"
                  id="nom-entreprise"
                  
                  placeholder="Nom de l'entreprise"
                  name="nom-entreprise"
                />
              </div>
              <div class="input-group">
                <label for="phone_number">Numero de téléphone du béneficiare : </label
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
                  value="<?= isset($_SESSION['numero'])?$_SESSION['numero']:"" ?>"
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
                ><button class="btn next" id="info-btn" type="button">Suivant <i class="fa-solid fa-arrow-right-long"></i></button>
              </div>
            </div>

            <!--  -->
            <div class="single-form hide" id="submit-div">
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
              <div class="input-description" id="om">
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
                <input type="number" name="id_client" value="<?= isset($_SESSION['id'])?$_SESSION['id']:0 ?>" style="display:none"/>
                <button class="btn prev" type="button">Précédent</button
                ><button class="btn next" type="submit" id="submit-btn">Validé</button>
              </div>
            </div>
          </form>
          <div id="error"></div>
          <!-- Confirmation de la commande  -->
          <div class="single-form hide" id="confirm-div">
            <span> Confirmation de la commande </span>

            <!-- countdwn -->
            <div id="container_count_down">
              <div id="temps-restant">
                <div id="temps"></div>
              </div>
            </div>
            <!--<div id="container_count_down">
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
            </div>-->
            <form method="POST" action="<?= SCRIPTS ?>../facture" id="pdfac">
              <input type="text" name="facture" style="display:none"/>
            <button type="submit" id="pdf" class="btn" style="visibility: hidden"  type="button">Télécharger le Réçus</button
            >
            </form>
            
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
                  <a href="point10recharge@gmail.com"
                    >E-mail : point10recharge@gmail.com</a
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
                <p id="email-client">example@gmail.com</p>
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
                <div>
                  <span>Nom De l'entreprise :</span>
                  <strong id="entreprise"></strong>
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
                    <span class="flex_1"><?= $params["forfait"]->prix ?> Franc CFA</span>
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
                    www.point10recharge.cm
                  </p>
                </div>
              </div>
            </div>

            <div class="footer_wrapper_pre">
              <a>www.point10recharge.cm</a>
              <p>support@point10recharge.cm</p>
              <span>Page 1/1</span>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- footer -->
    <?php require "footer.php" ?>

    <form id="cache" style="display:none">
    <input type="text" name="query" value="verifie_valid_commande" />
    <input type="number" name="id_commande"  />
    </form>
    <div id="toast" style="display: none;">
      <div id="img">Icon</div>
      <div id="desc">A notification message..</div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script type="module" src="<?= SCRIPTS ?>../js/valider_commande.js"></script>
  </body>
</html>
