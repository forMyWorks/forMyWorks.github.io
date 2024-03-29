// $(document).ready(function () {
//   $(".carousel__inner").slick({
//     infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 1000,
//     speed: 1500,
//     prevArrow:
//       '<button type="button" class="slick-prev"><img src="./icon/left-solid.png"> </button>',
//     nextArrow:
//       '<button type="button" class="slick-next"><img src="./icon/right-solid.png"> </button>',
//     responsive: [
//       {
//         breakpoint: 928,
//         settings: {
//           arrows: false,
//           dots: true,
//         },
//       },
//     ],
//   });
// });

const slider = tns({
  container: ".carousel__inner",
  items: 1,
  slideBy: "page",
  autoplay: false,
  controls: false,
  nav: false,
  autoplay: true,
  autoplayButtonOutput: false,
});

$(document).ready(function () {
  document.querySelector(".prev").addEventListener("click", function () {
    slider.goTo("prev");
  });
  document.querySelector(".next").addEventListener("click", function () {
    slider.goTo("next");
  });

  $("ul.catalog__tabs").on(
    "click",
    "li:not(.catalog__tab_active)",
    function () {
      $(this)
        .addClass("catalog__tab_active")
        .siblings()
        .removeClass("catalog__tab_active")
        .closest("div.container")
        .find("div.catalog__content")
        .removeClass("catalog__content_active")
        .eq($(this).index())
        .addClass("catalog__content_active");
    }
  );

  function toggleSlider(elem) {
    $(elem).each(function (i) {
      $(this).on("click", function (e) {
        e.preventDefault();
        $(".catalog-item__content")
          .eq(i)
          .toggleClass("catalog-item__content_active");
        $(".catalog-item__list").eq(i).toggleClass("catalog-item__list_active");
      });
    });
  }
  toggleSlider(".catalog-item__back");
  toggleSlider(".catalog-item__link");
  // modal

  $("[data-modal=consultation]").on("click", function () {
    $(".overlay, #consultation").fadeIn("slow");
  });
  $(".button_mini").on("click", function () {
    $(".overlay, #order").fadeIn("slow");
  });

  $(".modal__close").on("click", function () {
    $(".overlay, #consultation, #order, #thanks").fadeOut();
  });

  function validate(id_str) {
    $(id_str).validate({
      rules: {
        name: "required",
        phone: "required",
        email: {
          required: true,
          email: true,
        },
      },
      messages: {
        name: "Ваше ім*я",
        phone: "Ваш номер телефону",
        email: {
          required: "Ваш email",
          email: "наприклад: name@domain.com",
        },
      },
    });
  }
  validate("#consultation-form ");
  validate(".consultation form ");
  validate("#consultation form ");
  validate("#order form ");
  $("input[name=phone]").mask("+380 (99) 999 9999");
  $("form").submit(function (e) {
    e.preventDefault();

    if (!$(this).valid()) {
      return;
    }
    $.ajax({
      type: "POST",
      url: "./mailer/smart.php",
      data: $(this).serialize(),
    }).done(function () {
      $(this).find("inpput").val("");
      $("#consultation, #order").fadeOut();
      $(".overlay, #thanks").fadeIn();
      $("form").trigger("reset");
    });
    return false;
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 1600) {
      $(".arrow").fadeIn();
    } else {
      $(".arrow").fadeOut();
    }
  });

  $(".arrow").on("click", function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        1000,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });
  new WOW().init();
});

// document.querySelector(".modal__close").addEventListener("click", function () {
//   document.querySelector("#order ").setAttribute("style", "display: none;");
//   document
//     .querySelector("#consultation ")
//     .setAttribute("style", "display: none;");
//   document.querySelector("#thanksn ").setAttribute("style", "display: none;");
//   document.querySelector(".overlay ").setAttribute("style", "display: none;");
// });
