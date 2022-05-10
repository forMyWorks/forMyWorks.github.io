window.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".header .nav_menu"),
    menuItem = document.querySelectorAll(".header .nav_menu .nav_menu_some"),
    hamburger = document.querySelector(".header .hum");

  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("hum_acty");
    menu.classList.toggle("nav_menu_act");
  });

  //   menuItem.forEach((item) => {
  //     item.addEventListener("click", () => {
  //       hamburger.classList.toggle("hum_act");
  //       menu.classList.toggle("nav_menu_act");
  //     });
  //   });
});
