<?php
  include 'templates/header.php';
  include 'templates/navbar.php';
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/time_line.css">
<div class="overlay bg-light header_padding" style="padding: 8rem 0 1rem 0;" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="" data-aos="fade-up" dir="rtl">
            خطة السير حتى تسجيلك كـ قارئ ضمن أصبوحة ١٨٠
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/step_0.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section" data-aos="fade" >
  <div class="container col-10" >
    
    <div class="timeline">
      <div class="container_timeline left text-center">
        <div class="content" dir="rtl">
          <h1 class=" mb-3">
          الخطوة الأولى
          </h1>
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/step_1.png" alt="Image" class="img-fluid rounded">
          <h4 class="text-right">
          اكمل الخطوات الخمس في الموقع وتفاعل مع الاجوبة
          </h4>
        </div>
      </div>
      <div class="container_timeline right text-center">
        <div class="content" dir="rtl">
          <h1 class=" mb-3">
          الخطوة الثانية
          </h1>
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/step_2.png" alt="Image" class="img-fluid rounded">
          <h4>
          عند اكمالك للتسجيل سوف تنضم لـ facebook group التي تشرف على     قراءتك واسمها ( فريق المتابعة)
          </h4>
        </div>
      </div>
      <div class="container_timeline left text-center">
        <div class="content" dir="rtl">
          <h1 class=" mb-3">
          الخطوة الثالثة
          </h1>
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/step_3.png" alt="Image" class="img-fluid rounded">
          <h4>
          انتظر رسالة من قائد القراءة الخاص بك لترحب بك وتسير معك خطوة بخطوة خلال وقت بسيط
          </h4>
        </div>
      </div>
      <div class="container_timeline right text-center">
        <div class="content" dir="rtl">
          <h1 class=" mb-3">
          الخطوة الرابعة
          </h1>
          <img src="<?php echo base_url()?>assets/sign_up_assests/img/step_4.png" alt="Image" class="img-fluid rounded">
          <h4>
          الحصول على الكتاب وتبدأ بالقراءة 😍
          </h4>
        </div>
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <a href="javascript:next('page_2')" class="next_btn btn btn-primary rounded py-2 px-4 text-white">
        ابدأ الأن 
      </a>
    </div>
  </div>
</div>
<?php include 'templates/footer.php';?>