<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>
<input type="hidden" name="leader_id" id="leader_id" value="<?php echo $leader_id;?>">
<input type="hidden" name="request_id" id="request_id" value="<?php echo $request_id; ?>">

 <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              قمنا بتجهيز قائد لك تم تدريبه لمتابعتك
              <br>
              وتشجيعك، ماذا تفضل أن يكون جنس القائد؟ 
            </h1>
            <br>
            <div class="col-lg-12 book-div">
              <div class="" >
                <div class="container ">
                  <div class="row text-center">
                    <div class="col-md-3 col-sm-12 book-section">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/female.png" class="book-div-img"  onclick="reallocateAmbassador('female')"><br><h1>أنثى</h1> 
                    </div>
                     <div class="col-md-3 col-sm-12 book-section">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/male.png" class="book-div-img"  onclick="reallocateAmbassador('male')"><br><h1>ذكر</h1> 
                    </div>
                     <div class="col-md-3 col-sm-12 book-section">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/any.png" class="book-div-img" style="width: 60%"   onclick="reallocateAmbassador('any')"><br><h1>لا فرق </h1> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_2.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
