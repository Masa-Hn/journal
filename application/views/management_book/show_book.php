    <link href="<?php echo base_url()?>assets/css/management.css" rel="stylesheet" />

 <style>
 
/* Slideshow container */

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