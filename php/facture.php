<?php


?>
<!DOCTYPE html>
<html lang='fr'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Recu cleint</title>

    <link rel='stylesheet' href='<?= SCRIPTS ?>../css/template_bill.css' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js' integrity='sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  </head>
  <body>
    <main class='wrapper'>
    <div id='previe'>
          <div class='wrappe'>
            <section class='bill_head'>
              <div>
                <img src='<?= SCRIPTS ?>../media/logo-point10final.png' alt='' />
              </div>
              <div>Reçu Client</div>
            </section>
            <div class='background_pre'>point10recharge</div>
            <!-- user details -->
            <section class='user_bill_details'>
              <!-- right -->
              <div>
                <p>Point10recharge</p>
                <p>Plateforme de vente en ligne de forfait</p>
                <p>
                  <a href='issahnfonsouen@point10recharge'
                    >E-mail : issahnfonsouen@point10recharge</a
                  >
                </p>
                <strong><?=$date->format('Y-m-d H:i') ?></strong>
              </div>

              <!-- left -->
              <div>
                <p>Recu à</p>
                <strong id='name-client'> ........</strong>
                <p>Douala</p>
                <p id='number-client'>+237<?= $commande->numero_payement?></p>
                <p id='email-client'><?=$_SESSION['email']?></p>
                <p>Cameroun</p>
              </div>
            </section>

            <!--  -->
            <div>
              <p>Désignation</p>
              <strong ><?= $_SESSION['nom'] ?></strong>
            </div>
            <div class='main_content_section'>
              <div>
                <div>
                  <span>numero bénéficiare</span>
                  <strong id='number-recharge'><?=$commande->numero_benefice?></strong>
                </div>

                <div>
                  <span>Référence</span>
                  <strong id='reference'><?=$commande->numero_transaction?></strong>
                </div>
                <div>
                  <span>Mode de paiement</span>
                  <strong id='mode-paiemant'><?=$commande->operateur_payement?></strong>
                </div>
              </div>

              <!-- table details -->
              <div class='bill_section_table'>
                <div class='bill_section'>
                  <div class='bill_item'>
                    <span class='w_30'>QTE</span>
                    <span>ARTICLE</span>
                    <span class='flex_1'>AMOUNT</span>
                  </div>

                  <div class='bill_item'>
                    <span class='w_30'>01</span>
                    <strong>Forfait <?= $forfait->nom?></strong>
                    <span class='flex_1'><?= $forfait->prix ?>XAF</span>
                  </div>

                  <div class='bill_item'>
                    <span>Facture</span>
                    <span class='flex_1'><?= $commande->date_commande?></span>
                  </div>
                  <div class='bill_item'>
                    <span>Taille</span>
                    <span class='flex_1'><?= $forfait->nb_go ?>Go</span>
                  </div>
                  <div class='bill_item'>
                    <span>Categorie</span>
                    <span class='flex_1'><?= $forfait->taille ?></span>
                  </div>
                  <div
                    class=''
                    style='
                      display: flex;
                      justify-content: space-between;
                      padding: 0.4rem 0.3rem;
                    '
                  >
                    <span> Total</span> <span class='flex_1'><?= $forfait->prix ?> XAF </span>
                  </div>

                  <div class='bill_item'>
                    <strong>Montant net à payer (XAF)</strong>
                    <span class='style_price'><?= $forfait->prix ?> XAF</span>
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

            <div class='footer_wrapper_pre'>
              <a>www.point10recharge.com</a>
              <p>support@point10recharge.com</p>
              <span>Page 1/1</span>
            </div>
          </div>
        </div>
    </main>
    <p id='ur'><?= SCRIPTS.'../dashbord-client' ?></p>
  </body>
</html>
<script >
  var a=document.getElementById('ur');
  const piece = document.querySelector('.wrapper');
 //piece.style.width='600px';
 //piece.style.height='900px';
 var opt = {
    filename:     'test.pdf',
    html2canvas:  { scale: 2 },
    jsPDF:        { unit: 'pc', format: 'a4', orientation: 'l' }
  };
  const options = {
    // La largeur et la hauteur du PDF
    width: 658,
    height: 658,

    // La marge gauche, droite, supérieure et inférieure
    marginLeft: 20,
    marginRight: 20,
    marginTop: 20,
    marginBottom: 20,

    // L'orientation du PDF (portrait ou paysage)
    orientation: 'portrait',
    filename:    'test'
  };
  setTimeout(()=>{
      html2pdf()
      .set(opt)
      .from(piece)
      .save();

      setTimeout(()=>{
        window.location.href =a.innerHTML
      },300)


  },600);
</script>
