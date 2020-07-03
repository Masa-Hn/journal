<script type="text/javascript">
    function validate(val,v1,v2,v3) {
v1 = document.getElementById(v1);
v2 = document.getElementById(v2);
v3 = document.getElementById(v3);

flag1 = true;
flag2 = true;
flag3 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}

if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}

flag = flag1 && flag2 && flag3;

return flag;
}



function next1() {
  if (validate(0,'book_name','writer','story'))
  {
  document.getElementById('add1').style.display="none";
  document.getElementById('add2').style.display="block";
    document.getElementById('step2').className="step0";
    document.getElementById('step3').className="active step0";
}
}


function next2() {
  if (validate(0,'level','class','type'))
  {
  document.getElementById('add2').style.display="none";
  document.getElementById('add').style.display="block";
 document.getElementById('step3').className="step0";
 document.getElementById('step4').className="active step0";
}
}

function previous2() {
  document.getElementById('add2').style.display="none";
  document.getElementById('add1').style.display="block";
   document.getElementById('step2').className="active step0";
    document.getElementById('step3').className="step0";
}
function next() {
  if (validate(0,'article_name','writer','date'))
  {
  document.getElementById('add1').style.display="none";
  document.getElementById('add').style.display="block";
 document.getElementById('step2').className="step0";
 document.getElementById('step3').className="active step0";
}
}
function previous() {
  document.getElementById('add').style.display="none";
  document.getElementById('add1').style.display="block";
   document.getElementById('step2').className="active step0";
    document.getElementById('step3').className="step0";
}
function success() {
  

  document.getElementById('success').style.display="block";
  document.getElementById('add').style.display="none";
 
}


function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);  
  document.getElementById('img1').style.display="none";
  document.getElementById('img2').style.display="block";
}


// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 

function type_book() {
 
  document.getElementById('radio').style.display="none";
  document.getElementById('content').style.display="block";
 
}

function back() {
 
  document.getElementById('content2').style.display="none";
  document.getElementById('radio').style.display="block";
 
}
function show_detailes() {
 
  document.getElementById('content').style.display="none";
  document.getElementById('content2').style.display="block";
 
}
function change_pic()
{
  window.open("<?php base_url() ?>change_pic");
}
</script>