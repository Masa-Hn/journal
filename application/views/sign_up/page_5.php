<?php
  include 'templates/header.php';
  include 'templates/navbar.php';
  $page_id = 7;
  $this->StatisticsModel->incrementVisitors($page_id);
?>
<div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="header_margin" data-aos="fade-up" dir="rtl">
            يأتي الآن السؤال الأهم كيف تستفيد من قراءتك؟
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/character_3.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section" dir="rtl">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2>
        يكون هذا عبر كتابة أطروحة وهي ثلاثة أنواع
        </h2>
      </div>
    </div>
    <div class="row justify-content-center text-right">
      <div class="col-12">
        <div class="border p-3 rounded mb-2 select_with_img">
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/creative.png" alt="Image" class="img-fluid">
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            تعبير عن رأيك فيما قرأت (أطروحة)
          </p>
        </div>
      </div>
      <div class="col-12">
        <div class="border p-3 rounded mb-2 select_with_img">
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/quotes.png" alt="Image" class="img-fluid">
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            كتابة اقتباس أعجبك من الكتاب
          </p>
        </div>
      </div>
      <div class="col-12">
        <div class="border p-3 rounded mb-2 select_with_img">
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/screenshot.png" alt="Image" class="img-fluid">
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            سكرين شوت لاقتباسات أثارت اهتمامك
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <a href="javascript:next('question_3')" class="btn btn-primary rounded py-2 px-4 text-white">
        التــالي
      </a>
    </div>
    
  </div>
</div>
<?php include 'templates/footer.php';?>