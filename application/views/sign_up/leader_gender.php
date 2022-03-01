<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>

<div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center" dir="rtl">
            <h1 class="" data-aos="fade-up">
            لطفا نحتاج منك تسجيل معلوماتك
            لاعادة توزيعك
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/character_1.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SIGNUP FORM -->
<div class="site-section" dir="rtl" id="signup_form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9 text-right">
        <h5 data-aos="fade-up" data-aos-delay="100" style="color: darkred">
        نحيطكم علمًا أن كافة الخدمات المقدمة والمسابقات تقدم بشكل مجاني، و نتعهد بعدم الاحتفاظ بأي معلومات شخصية أبدا.
        </h5>
      </div>
      <div class="col-md-7 mb-5"  data-aos="fade">
        
        <form id="form" method="POST" class="p-5 bg-white text-right">
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="email">
                أدخل بريدك الالكتروني الي سجلت به مسبقًا
              </label>
              <input type="email" name="email" id="email" class="form-control" oninvalid="this.setCustomValidity('لطفًا أدخل بريدك الالكتروني بشكلٍ صحيح')"
              oninput="this.setCustomValidity('')"
              onblur="checkEmail(this.value)">
              <span class="error" id="emailError">لطفًا أدخل بريدك الالكتروني</span>
              <span class="error" id="emailFormatError">أدخل بريدك بشكلٍ صحيح</span>
            </div>
          </div>
          <div class="row form-group" >
            <div class="col-md-12">
              <label class="text-black">
                ماذا تفضل أن يكون جنس القائد؟
                
              </label>
            </div>
            <div class="col-md-12" style="display: inherit;">
              <input type="radio" value="male" name="leader_gender"id="leader_male" class="radio_width_margin form-control">
              <label class="text-black radio_btn" for="male">ذكر </label><br>
              <input type="radio" value="female" name="leader_gender" id="leader_female" class="radio_width_margin form-control">
              <label class="text-black radio_btn" for="female">أنثى</label><br>
              <input type="radio"  value="any" name="leader_gender"id="leader_any" class="radio_width_margin form-control">
              <label class="text-black" for="any" style="margin-top: 2%">لا فرق </label><br>
            </div>
          </div>
          <div class="row form-group">
            <span calss="errorMsg" id="errorMsgP">
              <?php
              if(!empty($errorMsg)){
              echo $errorMsg;
              }
              ?>
            </span>
          </div>
          <div class="row form-group" id="errorMsg">
            <img id="loading" src="<?php echo base_url()?>assets/sign_up_assests/img/loading.png" alt="" style="width: 20px; display: none; ">
            <span id="loadingMsg" style="color: #197439;"></span>
          </div>
          <div class="row form-group">
            <div class="col-12">
              <a href="javascript:checkData()" class="btn btn-primary rounded py-2 px-4 text-white">
                اختر فريقًا جديدًا
              </a>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- END SIGNUP FORM -->
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/reallocateLogin.js"></script>
<?php include 'templates/footer.php';?>