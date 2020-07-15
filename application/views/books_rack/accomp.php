<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css">

  <div class="padding" id="section-one">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 fade-in">
          <img src="<?php echo base_url()?>assets/img/special.png" style="width: 90%">
        </div>
        <div class="col-sm-6 text-center vertical-center fade-in">
          <h2>
            في أصبوحة لمعت لدينا أسماء
            بذلت  من الجهد الكثير 
            لتصل إلى مرادها 
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div id="fixed">
  </div> 
  <div class="padding" >
    <div class="container">
      <div class="row fade-in">
        <div class="container-fluid text-center">
          <h2> اسم النشاط </h2>
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row">
        <div class="carousel-container w3-display-container ">
          <img class="mySlides carousel-slide" src="<?php echo base_url()?>assets/img/s1.jpg" id="1" onClick="show(this.id)">
          <img class="mySlides carousel-slide" src="<?php echo base_url()?>assets/img/s2.jpg" id="2" onClick="show(this.id)">
          <img class="mySlides carousel-slide" src="<?php echo base_url()?>assets/img/s3.jpg" id="3" onClick="show(this.id)">
          <img class="mySlides carousel-slide" src="<?php echo base_url()?>assets/img/s4.jpg" id="4" onClick="show(this.id)">
          <img class="mySlides carousel-slide" src="<?php echo base_url()?>assets/img/6.jpg" id="6" onClick="show(this.id)">

          <button class="btn carousel-btn w3-display-left" onclick="plusDivs(-1)">&#10095;</button>
          <button class="btn carousel-btn w3-display-right" onclick="plusDivs(1)">&#10094;</button>
        </div>
        <!-- View Images -->
        <div id="myModal" class="modal">
          <input type="hidden" name="id" id="shareID">
          <input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">

          <span class="close">&times;</span>       
          <img class="modal-content" id="img01">       
          <h2 style="color:#ebe6d5;">مشاركة </h2>
          <hr style="width: 20%">
          <i onclick="accomp_fbShare()" class=" btn fa fa-facebook" id="share"></i>
          <i onclick="accomp_twitterShare()" class=" btn fa fa-twitter" id="share"></i>
          <i onclick="accomp_pin_it()" class=" btn fa fa-pinterest-square" id="share"></i>
          <i onclick="accomp_linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
          <i title="copy link" onclick="accomp_copyLink()" class=" btn fa fa-copy" id="share"></i>
        </div>
        <!-- End View Images -->
      </div>
      <!-- Search -->
      <div class="padding">
        <div class="container-fluid text-center fade-in">
          <form action="#">
            <select id="activity" name="activity" class="btn select-btn dropdown-toggle" data-toggle="dropdown" style="color: #fcfaef;">
              <option value="0" selected=""> اختر النشـاط</option>
              <option value="1"> نشاط 1</option>
              <option value="2">نشاط 2</option>
              <option value="3">نشاط 2</option>
              <option value="4">نشاط 3 </option>
            </select>
            <select id="version" name="version" class="btn select-btn dropdown-toggle" data-toggle="dropdown" style="color: #fcfaef;">
              <option value="0" selected=""> اختر النسخة </option>
              <option value="1">  نسخة  1</option>
              <option value="2"> نسخة  2</option>
              <option value="3"> نسخة  2</option>
              <option value="4"> نسخة  3 </option>
            </select>
          </form>
        </div>  
      </div>
      <!-- End Search -->
    </div>
  </div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>