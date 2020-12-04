<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 11;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h3>
              في مشروعنا هناك العديد من الفعاليات والدورات الغير المنهجية منها التصميم والانفوجرافيك والنقاشات الفكرية،
              المشاركة بها
                <span class="sp-2"> اختيارية،</span>
               أيها ستحب أن تجرب أولاً؟
            </h3>
            <br>
            <div class="col-lg-12 book-div">
              <div class="" >
                <div class="container ">
                  <div class="row text-center">
                    <div class="col-md-4 col-sm-12 activity-div">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/activity_1.png" class="activity-div-img" onclick="nextWithMsg('simulation',2)"><br>
                      <h5 class="question">
                        التثقيف بالفيديو  (ورش تعليمية)
                      </h5>
                    </div>
                    <div class="col-md-4 col-sm-12 activity-div">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/activity_2.png" class="activity-div-img" onclick="nextWithMsg('registration_form',2)"><br>
                      <h5 class="question">
                        النقاش المنهجي
                      </h5>
                    </div>
                    <div class="col-md-4 col-sm-12 activity-div">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/activity_3.png" class="activity-div-img" onclick="nextWithMsg('registration_form',2)"><br>
                      <h5 class="question">
                        كتابة المقالات
                      </h5>
                    </div>
                    <div class="col-md-4 col-sm-12 activity-div">
                      <img src="<?php echo base_url()?>assets/sign_up_assests/img/activity_4.png" class="activity-div-img" onclick="nextWithMsg('registration_form',2)"><br>
                      <h5 class="question">
                        الانفوجرافيك والتصميم
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_9.png" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
