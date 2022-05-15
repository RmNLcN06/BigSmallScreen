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

