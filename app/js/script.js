// Slideshow Script

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


////////////////////////////////////////////////


// Valider Password Utilisateur
// var myInput = document.getElementById("pwd");
// var letter = document.getElementById("letter");
// var capital = document.getElementById("capital");
// var number = document.getElementById("number");
// var length = document.getElementById("length");
// var special = document.getElementById("special");

// // Quand l'utilisateur clique sur le champ "Mot de passe", la boite de message de validation apparait
// myInput.onfocus = function() {
//   document.getElementsByClassName("pwd-message")[0].style.display = "block";
// }

// // Quand l'utilisateur clique hors du champ "Mot de passe", la boite de message de validation disparait
// myInput.onblur = function() {
//   document.getElementsByClassName("pwd-message")[0].style.display = "none";
// }

// // Quand l'utilisateur commence à entrer quelque chose dans le champ "Mot de passe"
// myInput.onkeyup = function() {

//   // Validation des lettres minuscules
//   var lowerCaseLetters = /[a-z]/g;
//   if(myInput.value.match(lowerCaseLetters)) {
//     letter.classList.remove("invalid");
//     letter.classList.add("valid");
//   } else {
//     letter.classList.remove("valid");
//     letter.classList.add("invalid");
// }

//   // Validation des lettres majuscules  
//   var upperCaseLetters = /[A-Z]/g;
//   if(myInput.value.match(upperCaseLetters)) {
//     capital.classList.remove("invalid");
//     capital.classList.add("valid");
//   } else {
//     capital.classList.remove("valid");
//     capital.classList.add("invalid");
//   }

//   // Validation des nombres
//   var numbers = /[0-9]/g;
//   if(myInput.value.match(numbers)) {
//     number.classList.remove("invalid");
//     number.classList.add("valid");
//   } else {
//     number.classList.remove("valid");
//     number.classList.add("invalid");
//   }

//   // Validation des caractères spéciaux
//   var specials = /[!@#$%^&_/?*]/g;
//   if(myInput.value.match(specials)) {
//     special.classList.remove("invalid");
//     special.classList.add("valid");
//   } else {
//     special.classList.remove("valid");
//     special.classList.add("invalid");
//   }

//   // // Validation du nombre de caractères entrés
//   if(myInput.value.length >= 8) {
//     length.classList.remove("invalid");
//     length.classList.add("valid");
//   } else {
//     length.classList.remove("valid");
//     length.classList.add("invalid");
//   }
// }

////////////////////////////////////////////////

// Show/Hide Password + Confirm Password

// var showPwd = document.getElementById('showPwd');
// var showConfirmPwd = document.getElementById('showConfirmPwd');

// showPwd.addEventListener('click', revealPwd);
// showConfirmPwd.addEventListener('click', revealConfirmPwd);

// function revealPwd()
// {
//   var pwd = document.getElementById('pwd');

//   if(pwd.type === "password") 
//   {
//     pwd.type = "text";
//   }
//   else
//   {
//     pwd.type = "password";
//   }
// }

// function revealConfirmPwd()
// {
//   var confirmPwd = document.getElementById('confirmPwd');

//   if(confirmPwd.type === "password") 
//   {
//     confirmPwd.type = "text";
//   }
//   else
//   {
//     confirmPwd.type = "password";
//   }
// }

////////////////////////////////////////////////

// ToTheTop Button
var scrollTopBtn = document.getElementsByClassName("toTheTop")[0];
var rootElement = document.documentElement;

function handleScroll()
{
    var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
    if(rootElement.scrollTop / scrollTotal > 0.3) // 30% de la page
    {
        scrollTopBtn.classList.add('showBtn');
    }
    else
    {
        scrollTopBtn.classList.remove('showBtn');
    }
}

function scrollToTop()
{
    rootElement.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}

scrollTopBtn.addEventListener("click", scrollToTop);
document.addEventListener("scroll", handleScroll);