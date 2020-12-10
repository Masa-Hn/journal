<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
  $page_id = 12;
  $this->StatisticsModel->incrementVisitors($page_id);

?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/registtration.css">
<!-- Start Banner Area -->
<section class="banner-area relative bgImg2">
  <div class="container">
  <div class="row fullscreen align-items-center justify-content-center">
    <div class="container">
      <section id="formHolder">
        <div class="row">
         <div class="col-sm-6 brand" id="leftDiv">
            <div class="heading">
              <h3>
                لطفا نحتاج منك تسجيل معلوماتك
              </h3>
              <p>
                هذا سوف يساعدنا على ترصيد قراءتك الأسبوعية و تكريم المتميزين
              </p>
            </div>
         </div>
        <!-- Form Box -->
        <div class="col-sm-6 form">
          <!-- Login Form -->
          <div class="login form-peice switched" dir="rtl">
            <form class="login-form">
              <div style="text-align: center;">
               <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/reg_img.png" alt="">
              </div>
              <div class="form-group" id="errorMsg">
                <span id="errorMsgLogin">
                
                </span>
              </div>
              <div class="form-group">
                <label for="loginemail">أدخل بريدك الالكتروني</label>
                <input type="email" name="loginemail" id="loginemail" required onblur="loginEmailValidation( this.value)">
                <span class="error" id="loginemailError">لطفًا أدخل بريدك الالكتروني</span>
                <span class="error" id="loginemailFormatError">أدخل بريدك بشكلٍ صحيح</span>       

              </div>
              <div class="CTA">
                <a  class="genric-btn primary circle arrow reg-btn" href="javascript:checkLoginEmail()" style="color: #ffff;">
                  تسجيل الدخول
                </a>
                <a  class="genric-btn primary circle arrow reg-btn"style="background:#45258f;    color: white;" onclick="fb_login();">
                  دخول باستخدام الفيسبوك
                </a>

                <a href="#" class="switch">قارئ جديد</a>
              </div>
            </form>
          </div>
          <!-- End Login Form -->
          <!-- Signup Form -->
          <div class="signup form-peice" dir="rtl">
            <form class="signup-form" >
              <div class="form-group" id="errorMsg">
                <img id="loading" src="<?php echo base_url()?>assets/sign_up_assests/img/loading.png" alt="" style="width: 20px; display: none; ">
                <span id="loadingMsg" style="color: #197439;">
                </span>
                <span id="errorMsgP">
                  <?php 
                    if(!empty($errorMsg)){
                      echo $errorMsg; 
                    }

                  ?>
                </span>
              </div>
              <div class="form-group">
                <input type="text" name="username" id="username" class="name" placeholder="اسمك الكامل " onblur="checkUserName(this.value)">
                <span class="error" id="usernameError"> لطفًا أدخل اسمك الكامل</span>
              </div>
              <div class="form-group">
                <label for="email"></label>
                <input type="email" name="email" id="email" class="email" oninvalid="this.setCustomValidity('لطفًا أدخل بريدك الالكتروني بشكلٍ صحيح')"
                        oninput="this.setCustomValidity('')" 
                        placeholder="بريدك الالكتروني" 
                        onblur="checkEmail(this.value)" />
                <span class="error" id="emailError">لطفًا أدخل بريدك الالكتروني</span>
                <span class="error" id="emailFormatError">أدخل بريدك بشكلٍ صحيح</span>       
              </div>
              <div class="form-group" style="margin-bottom: 10%"> 
                <label>ما هو جنسك </label>
                <div class="form-group"> 
                  <label class="radio-label"> 
                    أنثى
                    <input type="radio" value="female" name="amb_gender" id="female">
                  </label>
                  <label class="radio-label"> 
                    ذكر
                    <input type="radio" value="male" name="amb_gender" id="male">
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label >
                  قمنا بتجهيز قائد لك تم تدريبه لمتابعتك
                        وتشجيعك، ماذا تفضل أن يكون جنس القائد؟
                </label>
                <div class="form-group"> 
                  <label class="radio-label"> 
                    أنثى
                    <input type="radio" value="female" name="leader_gender" id="leader_female">
                  </label>
                  <label class="radio-label"> 
                      ذكر
                    <input type="radio" value="male" name="leader_gender"id="leader_male" >
                  </label>
                  <label class="radio-label"> 
                    لا فرق
                    <input type="radio" value="any" name="leader_gender"id="leader_any">
                  </label>
                </div>
              </div>
    
 <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="your_site_key"></div>
      <br/>
      <input type="submit" value="Submit">
    
              <div class="CTA" style="margin-top: 55px; text-align: center;">
                <a  class="genric-btn primary circle arrow reg-btn" href="javascript:checkData()" style="color: #ffff;">
                  تسجيل
                </a>
                <a  class="genric-btn primary circle arrow reg-btn"style="background:#45258f;    color: white;" onclick="fb_login();">
                  تسجيل باستخدام الفيسبوك
                </a>

                <a href="#" class="switch"> قارئ سابق </a>
              </div>
            </form>
          </div>
          <!-- End Signup Form -->
        </div>
        </div>
      </section>
    </div>

  </div>
</div>
</section>
<!-- End Banner Area -->
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/registration.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/fbLogin.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php include 'templates/footer.php';?>
