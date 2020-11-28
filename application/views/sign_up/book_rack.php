<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

  if(! isset($_SESSION['team_info'])){
     $url=base_url()."ReallocateAmbassador/";
      header('Location: '.$url);
      exit();
  }

    $page_id = 13;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/info.css">

<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center page-img" dir="rtl">
              <h3>
                <span class="sp-3">
                  أخيرًا: 
                </span>
              </h3>
              <h1>
                ريثما يصلك الرد من مشرف القراءة الخاص بك.
                ما رأيك أن تأخذ جولة ل تختار كتابك الذي ستقرأه معنا
              </h1>
          </div>
        </div>
        <div class="row fullscreen align-items-center justify-content-center">
          <div class=" col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/book_rack.png" alt="">
          </div>
        </div>        
        <div class="row banner-center align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center" style="margin-bottom: 5%">
            <a href="<?php echo base_url()?>bookSearch" target="_blank" class="final-page genric-btn primary circle arrow" style="margin-top: auto;" >
              اختيار الكتاب 
            </a>

          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center btn-left container_centered icon-bar-left" dir="rtl">
              <a href="javascript:next('leader_info')" class="final-page genric-btn circle prev-info" id="team" style="margin: 1.5%;">
                الخطوة  السابقة
            </a>
          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area  -->

<?php include 'templates/footer.php';?>
