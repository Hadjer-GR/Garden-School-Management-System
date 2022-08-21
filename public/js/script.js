const body = document.querySelector("body"),
  sidebar = document.querySelector("nav"),
  toggle = document.querySelector(".toggle");
searchBtn = document.querySelector(".search-box");
modeSwitch = document.querySelector(".toggle-switch");
modeText = document.querySelector(".mode-text");
// dropMeneu

const btndropMeneu = document.querySelector("#btndropMeneu");
const dropMeneu = document.querySelector(".dropmenu");



btndropMeneu.addEventListener("click", (eo) => {
  dropMeneu.classList.toggle("toggle_DropMenue");
});
// dropMeneu for register 

const btndropMeneu_2 = document.querySelector("#btndropMeneu_2");
 console.log(btndropMeneu_2);
const dropMeneu_2 = document.querySelector(".dropmenu_2");

console.log(dropMeneu_2 );


btndropMeneu_2.addEventListener("click", (eo) => {
  dropMeneu_2.classList.toggle("toggle_DropMenue");
});

/*
*
*
*/
toggle.addEventListener("click", () => {
  if (sidebar.className == "sidebar close") {
    sidebar.classList.remove("close");
  } else if (sidebar.className == "sidebar") {
    sidebar.classList.add("close");
  }
});
/*
searchBtn.addEventListener("click", () => {
  sidebar.classList.remove("close");
});
*/
modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark");

  if (body.classList.contains("dark")) {
    modeText.innerText = "Light mode";
  } else {
    modeText.innerText = "Dark mode";
  }
});




