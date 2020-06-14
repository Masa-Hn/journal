
 <!-- Slideshow container -->
 <!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Management Book</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
 <style>
 body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background: linear-gradient(-45deg, #008080 50%, #EEEEEE 50%);
    background-repeat: no-repeat
}

h3,h5,p {text-align: right;}
.card {
    background-color: #FFF;
    border-radius: 25px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    padding: 40px;
    z-index: 0
}

.heading {
    font-weight: normal
}

.desc {
    font-size: 14px
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    padding-left: 0px
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: right;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    content: ""
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #E0E0E0;
    border-radius: 50%;
    margin: auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 10px;
    background: #E0E0E0;
    position: absolute;
    left: 0;
    top: 17px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #F9A825
}

.sub-heading {
    font-weight: 500
}

.yellow-text {
    color: #F9A825
}

fieldset.show {
    display: block
}

fieldset {
    display: none
}

.radio {
    display: inline-block;
    border-radius: 0;
    box-sizing: border-box;
    cursor: pointer;
    color: #BDBDBD;
    font-weight: 500;
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%)
}

.radio:hover {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.radio.selected {
    border: 1px solid #F9A825;
    box-shadow: 0px 8px 16px 0px #EEEEEE;
    color: #29B6F6 !important;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    filter: grayscale(0%)
}

.card-block {
    border: 1px solid #CFD8DC;
    width: 45%;
    margin: 2.5%;
    padding: 20px 25px 15px 25px
}

@media screen and (max-width: 768px) {
    .card-block {
        padding: 20px 20px 0px 20px;
        height: 250px
    }
}

.icon {
    width: 85px;
    height: 100px
}

.image-icon {
    width: 85px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px
}

select,
input,
textarea,
button {
    padding: 8px 15px 8px 15px;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    background-color: #ECEFF1;
    border: 1px solid #ccc;
    font-size: 16px;
    letter-spacing: 1px
}

select:focus,
input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid skyblue !important;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

textarea {
    height: 100px
}

button {
    width: 120px;
    letter-spacing: 2px
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.btn-block {
    border-radius: 5px;
    height: 50px;
    font-weight: 500;
    cursor: pointer
}

.fa-long-arrow-right {
    float: right;
    margin-top: 4px
}

.fa-long-arrow-left {
    float: right;
    margin-top: 4px
}

{box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;

}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
.mybutton {
  display: inline-block;
  padding: 15px 15px;
  width: 300px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #008080;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}


.mybutton:active {
  background-color: #2F4F4F;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.book {
  background: none!important;
  border: none;
  padding: 0!important;
  width: 100%;
  color: #008080;
  font-weight: bold;
  font-size: 14px;
  cursor: pointer;
  text-align: center;
  /*optional*/
  /*input has OS specific font-family*/
  text-decoration: none;
}

</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
                                 <script src="<?php echo base_url()?>assets/js/addbook.js"></script>
                                 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 

 var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide() {
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}
 
var slideIndex = 1;
showSlides(slideIndex);

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

 
                            </head>
                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">

            	<div id ="radio"> 
                <h4 class="heading" style="text-align: right;" >نوع الكتب التي تود استعراضها</h4>
            			<div style="padding-right: 25%;padding-bottom: 15em;padding-top: 4em">
               

            		 <label style="float: right; direction: rtl;"> 
            		<button class="mybutton"   onclick="type_book()">كتب المنهج </button><br>

            		 <label style="float: right; direction: rtl;">
            		 	<button class="mybutton" onclick="type_book()">كتب المرحلة التحضيرية</button><br>

            		 <label style="float: right; direction: rtl;">
            		 	<button class="mybutton" onclick="type_book()">كتب الأطفال</button> <br>

            		 <label style="float: right; direction: rtl;">
            		 	<button class="mybutton" onclick="type_book()">كتب رمضان</button> <br>
            		 <label style="float: right; direction: rtl;">
            		 	<button class="mybutton" onclick="type_book()">كتب اليافعين</button> <br>
            		 	</div>
            		 	</div>


  <div id="content" style="display: none;">
<div class="slideshow-container">
  <div class="mySlides"  >

  <!-- Full-width images with number and caption text -->
  <table style="width: 100%;" >
 <?php for ($i=1; $i <=30 ; $i+=4) { ?>
    


    <tr style="background-color: #f2f2f2;">
     <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
    </tr>
    <tr >
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
    </tr>

   <?php } ?>
</table>
</div>

  <div class="mySlides"  >

<table style="width: 100%;" >
 <?php for ($i=33; $i <=60 ; $i+=4) { ?>
    


    <tr style="background-color: #f2f2f2;">
     <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
    </tr>
    <tr >
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
    </tr>

   <?php } ?>
</table>
</div>

  <div class="mySlides"  >

<table style="width: 100%;" >
 <?php for ($i=61; $i <=90 ; $i+=4) { ?>
    


    <tr style="background-color: #f2f2f2;">
     <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
    </tr>
    <tr >
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
   <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
    </tr>

   <?php } ?>
</table>
</div>


  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<br>
<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>

<div id="content2" style="display: none;">
   <li style="direction: rtl; float: right;"> اسم الكتاب : إلى الجيل الصاعد  </li><br><br>
    <li style="direction: rtl; float: right;"> اسم الكاتب : أحمد بن يوسف السيد </li><br><br>
    <li style="direction: rtl; float: right;"> نوع الكتاب : كتاب منهج </li><br><br>
    <li style="direction: rtl; float: right;"> صنف الكتاب : فكري ديني </li><br><br>
    <li style="direction: rtl; float: right;"> رابط منشور الكتاب :  </li><br><br>

<button style="float: right;" class="mybutton" onclick="change_pic()" > عرض صورة الكتاب </button>
<button style="float: left; width: 25%" class="mybutton" onclick="back()" > رجوع </button>


</div>
</div>
</div>
</div>
</div>
</body>
</html>