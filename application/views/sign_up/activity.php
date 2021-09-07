<?php
include 'templates/header.php';
include 'templates/navbar.php';
$page_id = 11;
$this->StatisticsModel->incrementVisitors($page_id);
?>

<div class="overlay bg-light" style="padding: 8rem 0 1rem 0;" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="header_margin" data-aos="fade-up" dir="rtl">
            في مشروعنا هناك العديد من الفعاليات والدورات الغير المنهجية منها التصميم والانفوجرافيك والنقاشات الفكرية، المشاركة بها
            <strong style="color:#278036 "> اختيارية    </strong>
            ، أيها ستحب أن تجرب أولاً؟
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/character_7.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section" dir="rtl">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-3 cursor_display" onclick="nextWithMsg('registration_form',2)">
            <div class="d-block d-md-flex listing vertical text-center">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/video.png" alt="Image" class="img-fluid">
              <div class="lh-content text-center">
                <h3>
                التثقيف بالفيديو (ورش تعليمية)
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 cursor_display" onclick="nextWithMsg('registration_form',2)">
            <div class="d-block d-md-flex listing vertical text-center">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/writing.png" alt="Image" class="img-fluid">
              <div class="lh-content text-center">
                <h3>
                كتابة المقالات
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 cursor_display" onclick="nextWithMsg('registration_form',2)">
            <div class="d-block d-md-flex listing vertical text-center">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/discussion.png" alt="Image" class="img-fluid">
              <div class="lh-content text-center">
                <h3>
                النقاش المنهجي
                </h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 cursor_display" onclick="nextWithMsg('registration_form',2)">
            <div class="d-block d-md-flex listing vertical text-center">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/graphic_design.png" alt="Image" class="img-fluid">
              <div class="lh-content text-center">
                <h3>
                الانفوجرافيك والتصميم
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'templates/footer.php';?>