"use strict";


$(".promo__link.sub_btn").on("click", function () {
  let href = $(this).attr("href");

  $("html, body").animate(
    {
      scrollTop: $(href).offset().top,
    },
    {
      duration: 700,
      easing: "swing", 
    }
  );

  return false;
});

$(
  ".navigation-сontacts,.navigation-works,.promo__link.btn,.navigation-me, .navigation-skills"
).on("click", function () {
  let href = $(this).attr("href");

  $("html, body").animate(
    {
      scrollTop: $(href).offset().top,
    },
    {
      duration: 700, 
      easing: "swing",
    }
  );

  return false;
});

const hamburger = document.querySelector(".promo__hamburger");
const navigation = document.querySelector(".navigation ");
const closes = document.querySelector(".closes ");

hamburger.addEventListener("click", () => {
  navigation.classList.add("active");
});

closes.addEventListener("click", () => {
  navigation.classList.remove("active");
});

const percent_num = document.querySelectorAll(".program__percent_num");
const percent_minus = document.querySelectorAll(".program__percent_minus");
percent_num.forEach((item, index) => {
  item.addEventListener("change", (e) => {
    percent_minus[index].setAttribute(
      "style",
      `width:  ${e.target.value} ; max-width: 100%; min-width: 0%; `
    );
  });
});

const certificate = document.querySelector(".certificate");

const a = document.querySelector(".utility__desc_last a");
a.addEventListener("click", function () {
  certificate.style.display = "block";
  certificate.style.animationName = "big";
});

certificate.addEventListener("click", function () {
  certificate.style.animationName = "small";
  let timer = setTimeout(() => {
    certificate.style.display = "none";
  }, 700);
  timer;
});
// clearTimeout(timer);

