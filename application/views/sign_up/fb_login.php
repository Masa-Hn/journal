<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              مشروع صناعة القُراء أصبوحة 180، ينشط حاليًا عبر منصة الفيسبوك فقط.
            </h1>  
            <br>
            <h1>
              من أجل ذلك سوف يستوجب منك تأكيد تسجيل الدخول عبر الفيسبوك لتأكيد دخولك إلى مجموعة المتابعة الخاصة بك.
            </h1>
            <a class="genric-btn primary circle arrow" style="background:#45258f;    color: white;" onclick="fb_login();">
             تسجيل  الدخول
            </a>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_fb.png" alt="">
          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area -->

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/fbLogin.js"></script>
<?php include 'templates/footer.php';?>
