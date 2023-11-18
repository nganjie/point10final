// // APPEAR
// //
// // This module will:
// //
// // - Search for anything with the attribute of 'data-appear'
// // - Attach an IntersectionObserver to it
// // - When the element enters the viewport, it will animate in (slide up and fade in)
// // - The IntersectionObserver will detach (runs only once per page load)
// //
// // Several options are available to pass as data attributes:
// //
// // - data-appear-delay = time in milliseconds to delay the animation (enables staggered entry)
// // - data-appear-offset = amount in pixels to slide in
// // - data-appear-opacity = value between 0 and 1 to start opacity animation.
// //   A non-zero value (recommended 0.1) will improve LCP scores for above-the-fold elements.
// // - data-appear-duration = length of animation in milliseconds
// //
// // Features
// //
// // - Does not prevent visibility with JS disabled
// // - Elements should fade in smoothly regardless of scroll speed (no scroll flash)

//  class Appear {
//   constructor(el) {
//     this.el = el;
//     this.setVars();
//     this.init();
//   }

//   // build animation keyframes, default values if undefined arguments
//   appearAnim(appearOpacity = 0, appearOffset = 24) {
//     return [
//       {
//         opacity: parseInt(appearOpacity),
//         transform: `translateY(${parseInt(appearOffset)}px)`,
//       },
//       { opacity: 1, transform: "translateY(0)" },
//     ];
//   }

//   // build animation options, default values if undefined arguments
//   appearOptions(appearDuration = 1250, appearDelay = 0) {
//     return {
//       duration: parseInt(appearDuration),
//       fill: "both", // required to persist both start and end states
//       easing: "cubic-bezier(0.33, 1, 0.68, 1)", //easeOutCubic
//       delay: parseInt(appearDelay),
//     };
//   }

//   setVars() {
//     this.observerElements = document.querySelectorAll("[data-appear]");
//     this.observerOptions = { root: null, rootMargin: "0px 0px", threshold: 0 };

//     this.observer = new IntersectionObserver((entries) => {
//       entries.forEach((entry) => {
//         // grab any data attributes
//         const appearOpacity = entry.target.dataset.appearOpacity;
//         const appearOffset = entry.target.dataset.appearOffset;
//         const appearDuration = entry.target.dataset.appearDuration;
//         const appearDelay = entry.target.dataset.appearDelay;

//         // set up but pause animation, freezing elements in faded out state
//         let animation = entry.target.animate(
//           this.appearAnim(appearOpacity, appearOffset),
//           this.appearOptions(appearDuration, appearDelay)
//         );
//         animation.pause();

//         if (entry.isIntersecting) {
//           animation.play();

//           // remove the observer when done
//           this.observer.unobserve(entry.target);
//         }
//       });
//     }, this.observerOptions);
//   }

//   init() {
//     if (this.observerElements.length > 0) {
//       this.observerElements.forEach((el) => {
//         this.observer.observe(el);
//       });
//     }
//   }

//   cleanUp() {
//     if (this.observerElements.length > 0) {
//       this.observerElements.forEach((el) => {
//         this.observer.unobserve(el);
//       });
//     }
//   }
// }

// // This is a simple way to create new instances of our class,
// // ideally this would be bundled in a lazy-load controller pattern like:
// // - Viget Modules: https://www.viget.com/articles/how-does-viget-javascript/
// // - Stimulus: https://stimulus.hotwired.dev/
// // - or some other pattern

// const dataModules = [...document.querySelectorAll('[data-module="appear"]')];

// dataModules.forEach((element) => {
//   element.dataset.module.split(" ").forEach(function () {
//     new Appear(element);
//   });
// });

// =============================================================

const scrollElements = document.querySelectorAll(".js-scroll");

const elementInView = (el, dividend = 1) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop <=
    (window.innerHeight || document.documentElement.clientHeight) / dividend
  );
};

const elementOutofView = (el) => {
  const elementTop = el.getBoundingClientRect().top;

  return (
    elementTop > (window.innerHeight || document.documentElement.clientHeight)
  );
};

const displayScrollElement = (element) => {
  element.classList.add("scrolled");
};

const hideScrollElement = (element) => {
  element.classList.remove("scrolled");
};

const handleScrollAnimation = () => {
  scrollElements.forEach((el) => {
    if (elementInView(el, 1.25)) {
      displayScrollElement(el);
    } else if (elementOutofView(el)) {
      hideScrollElement(el);
    }
  });
};

window.addEventListener("scroll", () => {
  handleScrollAnimation();
});
