document.addEventListener("DOMContentLoaded", function () {
  // Selecionar todas as divs com a classe 'splide'
  var splideDivs = document.querySelectorAll(".splide");

  // Loop através das divs e inicializar cada carrossel
  splideDivs.forEach(function (div) {
    new Splide(div, {
      perPage: 6,
      breakpoints: {
        1024: {
          perPage: 4,
          gap: 14,
        },
        991:{
          perPage: 3,
          gap: 15,
        },
        767: {
          perPage: 2,
          gap: 15,
        },
        640: {
          perPage: 1,
          gap: 15,
        },
      },
      perMove: 1,
      gap: 24,
      pagination: false,
      arrows: false,
      focus: "start",
      trimSpace: true,
      autoplay: false,
    }).mount();
  });
});


document.addEventListener('DOMContentLoaded', () => {
  const player = new Plyr('#player');
});