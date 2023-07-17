const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');
const navLogo = document.querySelector('#navbar__logo');

// Display Mobile Menu
const mobileMenu = () => {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);

// Show active menu when scrolling
const highlightMenu = () => {
  const elem = document.querySelector('.highlight');
  const ducaleMenu = document.querySelector('#ducale-page');
  const diamantiMenu = document.querySelector('#diamanti-page');
  const museoforiMenu = document.querySelector('#museofori-page');
  const maoMenu = document.querySelector('#mao-page');
  const prenotazioniMenu = document.querySelector('#prenotazioni-page');
  const gamMenu = document.querySelector('#gam-page');

  let scrollPos = window.scrollY;
  // console.log(scrollPos);

  // adds 'highlight' class to my menu items
  if (window.innerWidth > 960 && scrollPos < 1000) {
    ducaleMenu.classList.add('highlight');
    diamantiMenu.classList.remove('highlight');
    museoforiMenu.classList.remove('highlight');
    gamMenu.classList.remove('highlight');
    maoMenu.classList.remove('highlight');
    prenotazioniMenu.classList.remove('highlight');
    return;
  } else if (window.innerWidth > 960 && scrollPos < 2000 ) {
    ducaleMenu.classList.remove('highlight');
    diamantiMenu.classList.add('highlight');
    museoforiMenu.classList.remove('highlight');
    maoMenu.classList.remove('highlight');
    gamMenu.classList.remove('highlight');
    prenotazioniMenu.classList.remove('highlight');
    return;
  } else if (window.innerWidth > 960 && scrollPos < 2400) {
    ducaleMenu.classList.remove('highlight');
    diamantiMenu.classList.remove('highlight');
    museoforiMenu.classList.add('highlight');
    maoMenu.classList.remove('highlight');
    gamMenu.classList.remove('highlight');
    prenotazioniMenu.classList.remove('highlight');
    return;
  } else if (window.innerWidth > 960 && scrollPos < 3400) {
    ducaleMenu.classList.remove('highlight');
    diamantiMenu.classList.remove('highlight');
    museoforiMenu.classList.remove('highlight');
    maoMenu.classList.add('highlight');
    gamMenu.classList.remove('highlight');
    prenotazioniMenu.classList.remove('highlight');
    return;
  } else if (window.innerWidth > 960 && scrollPos < 4400) {
    ducaleMenu.classList.remove('highlight');
    diamantiMenu.classList.remove('highlight');
    museoforiMenu.classList.remove('highlight');
    maoMenu.classList.remove('highlight');
    gamMenu.classList.add('highlight');
    prenotazioniMenu.classList.remove('highlight');
    return;
  }

  if ((elem && window.innerWIdth < 960 && scrollPos < 600) || elem) {
    elem.classList.remove('highlight');
  }
};

window.addEventListener('scroll', highlightMenu);
window.addEventListener('click', highlightMenu);

//  Close mobile Menu when clicking on a menu item
const hideMobileMenu = () => {
  const menuBars = document.querySelector('.is-active');
  if (window.innerWidth <= 768 && menuBars) {
    menu.classList.toggle('is-active');
    menuLinks.classList.remove('active');
  }
};

menuLinks.addEventListener('click', hideMobileMenu);
navLogo.addEventListener('click', hideMobileMenu);

// open theatre details when click on i icon
function toggleText() {
  var texto = document.getElementById("info_sede");
  if (texto.style.display === "none") {
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}
function toggleText2() {
  var texto = document.getElementById("info_sede2");
  if (texto.style.display === "none") {
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}
function toggleText3() {
  var texto = document.getElementById("info_sede3");
  if (texto.style.display === "none") {
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}
function toggleText4() {
  var texto = document.getElementById("info_sede4");
  if (texto.style.display === "none") {
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}function toggleText5() {
  var texto = document.getElementById("info_sede5");
  if (texto.style.display === "none") {
    texto.style.display = "block";
  } else {
    texto.style.display = "none";
  }
}