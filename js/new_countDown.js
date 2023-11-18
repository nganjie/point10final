function decompteEn5Minutes() {
  const duree = 300000
  let tempsRestant = duree;

  function mettreAJourDecompte() {
    const minutes = Math.floor(tempsRestant / 60000);
    const secondes = Math.floor((tempsRestant % 60000) / 1000);

    const tempsFormatte = `
    <h1 id="headline">Veillez patienter</h1>
    <div class="times">
    ${minutes.toString().padStart(2, "0")}:${secondes
      .toString()
      .padStart(2, "0")}
      </div>
      `;

    let tempsElement = document.getElementById("temps");
    if (tempsElement) {
      tempsElement.innerHTML = tempsFormatte;
    } else {
      const parent = document.querySelector("#temps-restant");
      tempsElement = document.createElement("div");
      tempsElement.setAttribute("id", "temps");
      parent.appendChild(tempsElement);
      parent.innerHTML = `<div id="temps"></div>`;
    }

    tempsRestant -= 1000;

    if (tempsRestant < 0) {
      clearInterval(intervalle);
      const tempsRestantElement = document.getElementById("temps-restant");
      if (tempsRestantElement) {
        tempsRestantElement.innerHTML = "Le décompte est terminé.";
      }

      // Ajouter une nouvelle balise span pour contenir le temps
      tempsElement.innerHTML = '<div id="temps"></div>';

      tempsRestant = duree;
      if (tempsRestantElement) {
        tempsRestantElement.innerHTML = "Le décompte recommence.";
      }
      intervalle = setInterval(mettreAJourDecompte,1000);
    }
  }
  
  let intervalle = setInterval(mettreAJourDecompte, 1000);
  /**
   * Appeler cette fonction pour arreter le decompte
   */
    function arreterDecompte() {
      clearInterval(intervalle);
      const tempsRestantElement = document.getElementById("temps-restant");
      if (tempsRestantElement) {
        tempsRestantElement.innerHTML = "Le décompte est arrêté.";
      }
    }
}

decompteEn5Minutes();
