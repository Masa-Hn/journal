<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 12;
    $this->StatisticsModel->incrementVisitors($page_id);
?>


<!-- Start Banner Area -->
    <section id='1' class="banner-area relative bgImg2">
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

    <section id='2' class="banner-area relative bgImg2" style="display: none;">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 story-content left-text text-center " dir="rtl">
            <h1>
              مرحبًا بك  
              <a id='fbLink'>
                <span class="sp-2" id="name" >
                
                </span>
              </a>
              <br/>
              <br/>
              <div style="color: black;
                  margin: 0 auto;
                  width: 25%;
                  opacity: 0.8;
                  background: #aeceba;
                  font-size: 15px;">

                  للتأكيد، هذه معلوماتك التي زودنا بها الفيسبوك

                <br>
                <span id="email"></span>
                <br/>
                <span id="gender"></span>
                <br/>
                <span id="profile">
                  <a id="userfbLink">Facebook profile</a>
                </span>
              </div>
            </h1>

            <br>
            <h1 class="sp-1">
              أهلًا بك معنا            
            </h1>

            <a href="https://www.facebook.com/groups/1518939228167551/" class="final-page genric-btn primary circle arrow" target="_blank">
              اضغط هنا للانضمام لفريق القراءة الخاص بك
            </a>

          </div>
        </div>
      </div>
    </section>




<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/fbLogin.js"></script>
<?php include 'templates/footer.php';?>
