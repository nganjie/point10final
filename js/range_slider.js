const rangeSliderOptions = {
  values: [5, 100],
  min: 5,
  max: 100,
  step: 1,
  railHeight: 3,
  trackHeight: 3,
  pointRadius: 10,
};

const rangeSliderOptionsPrice = {
  values: [3000, 100000],
  min: 3000,
  max: 100000,
  step: 100,
  railHeight: 3,
  trackHeight: 3,
  pointRadius: 10,
};

const sliderPrice = new RangeSlider("#price", rangeSliderOptionsPrice);
const sliderQte = new RangeSlider("#qte", rangeSliderOptions);
const qte_value = document.querySelector(".qte_value");
const price_value = document.querySelector(".price_value");

// charger d'abord le Slider pour le prix
sliderPrice.onChange((values) => {
  console.log("first value: ", values);
  if (!price_value) return;

  price_value.textContent = `Prix : ${values[0]}XAF - ${values[1]}XAF`;
});

// charger d'abord le Slider pour le prix
sliderQte.onChange((values) => {
  console.log("first qte: ", values);
  if (!qte_value) return;

  qte_value.textContent = `Quantité en Go : ${values[0]}Go - ${values[1]}Go `;
});
