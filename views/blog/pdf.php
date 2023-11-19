<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recu cleint</title>

    <link rel="stylesheet" href="<?= SCRIPTS ?>../css/template_bill.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    <main class="wrapper">
      <?php echo $params['facture'];?>
    </main>
    <p id="ur"><?= SCRIPTS.'../' ?></p>
  </body>
</html>
<script >
  var a=document.getElementById("ur");
  const piece = document.querySelector(".wrapper");
 //piece.style.width="600px";
 //piece.style.height="900px";
 var opt = {
    filename:     "test.pdf",
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
    filename:    "test"
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
