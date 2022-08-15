//    deseign for mobile screen
/*
 *
 *
 *
 *
 */

const menu = document.querySelectorAll(".togglemenu");
menu.forEach((item) => {
  item.addEventListener("click", (eo) => {
    if (sidebar.className == "sidebar close") {
      sidebar.classList.add("close2");
    } else if (sidebar.className == "sidebar close close2") {
      sidebar.classList.remove("close2");
    }
  });
});
const deletemenu = document.querySelector(".togglemenu2");

const sidbarmobile = document.querySelector("nav");

deletemenu.addEventListener("click", (eo) => {
  sidebar.classList.remove("close2");
});
/*
 *
 *
 *
 *
 */