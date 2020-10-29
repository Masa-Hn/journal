<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 9;
    $this->StatisticsModel->addVisitor($page_id);
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 page-img">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_6.png" alt="">
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="story-content" dir="rtl">
              <h1><span class="sp-1" style="font-size: 40px">تبقى أن أخبرك عن الكتب 
              </span></h1>
              <br>
              <h1><span class="sp-1" style="font-size: 40px">داخل المشروع </span></h1>
              <br>
              <h1>
                حيث أننا نمتلك مكتبة
                ضخمة تتجدد أسبوعيًا تحتوي على
                أكثر من 
                <span class="sp-2">400</span>
                 كتاب من
                 <span class="sp-2">15</span>
                 فئة مختلفة

              </h1>
              <a href="javascript:next('question_4')" class="genric-btn primary circle arrow">التالي <span class="lnr lnr-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
