<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
 
    $page_id = 6;
    $this->StatisticsModel->addVisitor($page_id);
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                سؤال
              </span>
            <br>
            <br>
            <h1>
              أخبرتك سابقاً بشأن تقسيم القراءة خلال الأسبوع 
              <br>
              فهل ستقوم بقراءة الـ <span class="sp-2">(30)</span>صفحة على دفعة واحدة
              <br>
              في يوم واحد أم تفضل تقسيمها حسب أوقات فراغك
              <br>
              خلال الأسبوع؟            
            </h1>
            <br>
               <a href="javascript:nextWithMsg('page_5',3)" class="genric-btn primary circle arrow">دفعة واحدة</a>
               <a href="javascript:nextWithMsg('page_5',4)" class="genric-btn primary circle arrow">تقسيمها  </a>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/wonder.png" alt="" alt="" style="width: 80%">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
