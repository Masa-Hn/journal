var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}// end plusDivs

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}//end showDivs

//auto
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
    x[i].classList.remove("active");
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block";
  x[slideIndex-1].classList.add("active");
 }// end carousel

function  show (id){
  var modal = document.getElementById("myModal");
  document.getElementById("shareID").value= id;
  var imgSrc = document.getElementById(id).src;
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
 
  modal.style.display = "block";
  modalImg.src = imgSrc;
 
  var span = document.getElementsByClassName("close")[0];

  span.onclick = function() { 
    modal.style.display = "none";
  }//end span.onclick

}//end show()

