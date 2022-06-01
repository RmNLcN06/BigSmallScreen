// Slideshow Script
/*
var slideIndex = [1,1,1,1];
var slideId = ["mySlides1", "mySlides2", "mySlides3", "mySlides4"];
showSlides(1, 0);
showSlides(1, 1);
showSlides(1, 2);
showSlides(1, 3);


function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var slides = document.getElementsByClassName(slideId[no]);
  

  if (n > slides.length) 
  {
      slideIndex[no] = 1
    }    

  if (n < 1) 
  {
      slideIndex[no] = slides.length;
    }

  for (i = 0; i < slides.length; i++) 
  {
     slides[i].style.display = "none";  
  }

  slides[slideIndex[no]-1].style.display = "block";

}

*/

////////////////////////////////////////////////


// Valider Password Utilisateur
var myInput = document.getElementById("pwd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var special = document.getElementById("special");

// Quand l'utilisateur clique sur le champ "Mot de passe", la boite de message de validation apparait
myInput.onfocus = function() {
  document.getElementsByClassName("pwd-message")[0].style.display = "block";
}

// Quand l'utilisateur clique hors du champ "Mot de passe", la boite de message de validation disparait
myInput.onblur = function() {
  document.getElementsByClassName("pwd-message")[0].style.display = "none";
}

// Quand l'utilisateur commence à entrer quelque chose dans le champ "Mot de passe"
myInput.onkeyup = function() {

  // Validation des lettres minuscules
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validation des lettres majuscules  
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validation des nombres
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validation des caractères spéciaux
  var specials = /[!@#$%^&_/?*]/g;
  if(myInput.value.match(specials)) {
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }

  // // Validation du nombre de caractères entrés
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

////////////////////////////////////////////////
/*
// Valider Password Utilisateur
var myInputAdmin = document.getElementById("pwdAdmin");
var letterAdmin = document.getElementById("letterAdmin");
var capitalAdmin = document.getElementById("capitalAdmin");
var numberAdmin = document.getElementById("numberAdmin");
var lengthAdmin = document.getElementById("lengthAdmin");
var specialAdmin = document.getElementById("specialAdmin");

// Quand l'utilisateur clique sur le champ "Mot de passe", la boite de message de validation apparait
myInputAdmin.onfocus = function() {
  document.getElementsByClassName("pwd-message-admin")[0].style.display = "block";
}

// Quand l'utilisateur clique hors du champ "Mot de passe", la boite de message de validation disparait
myInputAdmin.onblur = function() {
  document.getElementsByClassName("pwd-message-admin")[0].style.display = "none";
}

// Quand l'utilisateur commence à entrer quelque chose dans le champ "Mot de passe"
myInputAdmin.onkeyup = function() {

  // Validation des lettres minuscules
  var lowerCaseLetters = /[a-z]/g;
  if(myInputAdmin.value.match(lowerCaseLetters)) {
    letterAdmin.classList.remove("invalid");
    letterAdmin.classList.add("valid");
  } else {
    letterAdmin.classList.remove("valid");
    letterAdmin.classList.add("invalid");
}

  // Validation des lettres majuscules  
  var upperCaseLetters = /[A-Z]/g;
  if(myInputAdmin.value.match(upperCaseLetters)) {
    capitalAdmin.classList.remove("invalid");
    capitalAdmin.classList.add("valid");
  } else {
    capitalAdmin.classList.remove("valid");
    capitalAdmin.classList.add("invalid");
  }

  // Validation des nombres
  var numbers = /[0-9]/g;
  if(myInputAdmin.value.match(numbers)) {
    numberAdmin.classList.remove("invalid");
    numberAdmin.classList.add("valid");
  } else {
    numberAdmin.classList.remove("valid");
    numberAdmin.classList.add("invalid");
  }

  // Validation des caractères spéciaux
  var specials = /[!@#$%^&_/?*]/g;
  if(myInputAdmin.value.match(specials)) {
    specialAdmin.classList.remove("invalid");
    specialAdmin.classList.add("valid");
  } else {
    specialAdmin.classList.remove("valid");
    specialAdmin.classList.add("invalid");
  }

  // // Validation du nombre de caractères entrés
  if(myInputAdmin.value.length >= 8) {
    lengthAdmin.classList.remove("invalid");
    lengthAdmin.classList.add("valid");
  } else {
    lengthAdmin.classList.remove("valid");
    lengthAdmin.classList.add("invalid");
  }
}
*/

////////////////////////////////////////////////

// User/Admin buttons form onclick
// var userBtn = document.getElementById('user');
// var adminBtn = document.getElementById('admin');

// userBtn.addEventListener('click', showFormUser);
// adminBtn.addEventListener('click', showFormAdmin);

// function showFormUser() 
// {
//   var userForm = document.getElementsByClassName('user-form')[0];
//  userForm.classList.toggle('show');
// }

// function showFormAdmin() 
// {
//   var adminForm = document.getElementsByClassName('admin-form')[0];
//   adminForm.classList.toggle('show');
// }