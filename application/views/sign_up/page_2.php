<?php
  include 'templates/header.php';
  include 'templates/navbar.php';

  $page_id = 2;
  $this->StatisticsModel->incrementVisitors($page_id);
?>
<div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="" data-aos="fade-up" dir="rtl">
            مشروعنا يعتمد على فكرة التعليم المستمر
            للأشخاص ويسير على فكرة التعلم عبر القراءة
            المنهجية التي تنمي فكر الانسان وتطور مهاراته
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/character_2.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2>
        تالياً سأشرح لك الأمور الأساسية التي يوفرها المشروع
        وستكتشف البقية بعد انضمامك
        </h2>
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <a href="javascript:next('page_3')" class="btn btn-primary rounded py-2 px-4 text-white">
        التــالي
      </a>
    </div>
  </div>
</div>
<?php include 'templates/footer.php';?>