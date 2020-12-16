<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>

<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/registtration.css">
<!-- Start Banner Area -->
    <section id='1' class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              لاتمام هذه العملية يجب عليك تسجيل الدخول
            </h1>
            <form class="login-form">
              <div class="form-group" id="errorMsg">
                <span id="errorMsgLogin">
                
                </span>
              </div>
              <label for="loginemail">أدخل بريدك الالكتروني</label>

              <div class="form-group">
                <input type="email" name="loginemail" id="loginemail" required onblur="loginEmailValidation( this.value)">
                <span class="error" id="loginemailError">لطفًا أدخل بريدك الالكتروني</span>
                <span class="error" id="loginemailFormatError">أدخل بريدك بشكلٍ صحيح</span>       

              </div>
              <div class="text-center">
                <a  class="genric-btn primary circle arrow reg-btn" href="javascript:reallocateLogin()" style="color: #ffff;">
                  تسجيل الدخول
                </a>
                <a  class="genric-btn primary circle arrow reg-btn"style="background:#45258f;    color: white;" onclick="fb_login();">
                  دخول باستخدام الفيسبوك
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area -->

<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/registration.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/reallocateLogin.js"></script>
<?php include 'templates/footer.php';?>
