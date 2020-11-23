<?php 
  include_once 'templates/header.php';
  include_once 'templates/navbar.php';
 
    $page_id = 4;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 page-img">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_4.png" alt="">
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="story-content" dir="rtl">
              <h1><span class="sp-1" style="font-size: 50px">كيف تنال علامة </span></h1>
              <br>
              <h1><span class="sp-1" style="font-size: 50px">القراءة الكاملة ؟</span></h1>
              <br>
              <h1>
                بكل بساطة تقرأ <span class="sp-2">30</span>
                صفحة أسبوعيا
              بإمكانك قراءتها كاملة خلال يوم واحد
                أو تقوم بتقسيمها على أيام الأسبوع
              </h1>
              <a href="javascript:next('question_1')" class="genric-btn primary circle arrow">التالي </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include_once 'templates/footer.php';?>
