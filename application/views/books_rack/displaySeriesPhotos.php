<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/infographicCarousel.css">
<input type="hidden" name="id" id="base_url" value="<?php echo base_url(); ?>">
<style type="text/css">
  .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.carousel-container:hover .image {
  opacity: 0.3;
}

.carousel-container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #205d67;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
</style>
<div class="container padding" id="section-one">
  <h2 style="text-align: center;"> </h2>
  <div class="heading-underline"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="" >
          <!-- Start View Images -->
          <div class="modal" style="display: block;">
            <div class="carousel-container w3-display-container " id="seriesPhotos">
              <?php 
                foreach ($series_info as $info) {
                  echo '<img class="mySlides carousel-slide first_slide" src="'. base_url() .'/assets/img/infographic/'.$info->get_pic().'" id="'.$info->get_id().'">
                   ';
                }
                 foreach ($photos as $photo) {
                  echo '<img class="mySlides carousel-slide" src="'. base_url() .'assets/img/infographic/'.$photo->get_pic().'" id="'.$photo->get_id().'">
                   ';
                }//foreach
                echo ' <div class="middle">
                      <div class="text" onClick="detailedView()">مشاركة هذه الصورة 
                      </div>
                    </div>';
              ?>
            </div>  
            <button class="btn carousel-btn w3-display-left" onclick="plusDivs(-1)">&#10095;</button>
            <button class="btn carousel-btn w3-display-right" onclick="plusDivs(1)">&#10094;</button>            
            <span class="close" onClick="returnToSeries()" id="return">&times;</span>       
            <input type="hidden" name="id" id="<?php echo $series_id; ?>">
            <input type="hidden" name="id" id="base_url" value="'.base_url().'">
            <h2 style="color:#ebe6d5;">مشاركة السلسلة </h2>
            <hr style="width: 20%">
            <i onclick="fbShare()" class=" btn fa fa-facebook" id="share"></i>
            <i onclick="twitterShare()" class=" btn fa fa-twitter" id="share"></i>
            <i onclick="linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
            <i title="copy link" onclick="copyLink()" class=" btn fa fa-copy" id="share"></i>

          </div>
          <!-- End View Images -->

          <!-- Start Detailed View -->
          <div id="myModal" class="modal">
            <input type="hidden" name="id" id="shareID">
            <input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
            <span class="close" id="detailedView">&times;</span>
            <img class="modal-content" id="img">
            <h2 style="color:#ebe6d5;">مشاركة </h2>
            <hr style="width: 20%">
            <i onclick="infographic_fbShare()" class=" btn fa fa-facebook" id="share"></i>
            <i onclick="infographic_twitterShare()" class=" btn fa fa-twitter" id="share"></i>
            <i onclick="infographic_pin_it()" class=" btn fa fa-pinterest-square" id="share"></i>
            <i onclick="infographic_linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
            <i title="copy link" onclick="infographic_copyLink()" class=" btn fa fa-copy" id="share"></i>
          </div>
          <!-- End Detailed View -->

        </div>
      </div> 
    </div>
  </div>
</div> 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/gallary.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/shareArcticle.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $(".first_slide").hover(function(){
      $(".middle").css("display", "none");
      }, function(){
      $(".middle").css("display", "block");
    });
  });
 
</script>