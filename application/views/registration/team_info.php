<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/registration_assests/css/info.css">
<!--Start Banner Area -->
    <section class="banner-area relative bgImg1">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 story-content right-text" dir="rtl">


            <h1>
              <span class="sp-1" style="font-size: 50px">
                مرحبًا 
                <?php  echo $name; ?>
              </span>
            </h1>
            <br>
            <h1>
              معلوماتك
            </h1>
            <hr>
            <h6>
              اسمك : <?php  echo $name; ?>
              <br>
              رقم طلبك:  509
              <br>
              جنسك: <?php  echo $gender; ?>
              <br>
              بريدك الالكتروني: <?php  echo $email; ?>

            </h6>
            <br>
            <h1>
               فريق القراءة الخاص بك
            </h1>
            <hr>
            <h1>استخدم رمز التحقق هذا للانضمام لمجموعتنا الخاصة </h1> <h5>Osb180acfcaa509</h5>
            <h6>
              للانضمام لفريق القراءة الخاص بك : <a class="genric-btn primary circle " href="https://www.facebook.com/groups/1518939228167551/" target="_blank" style="font-size: 100%"> اضغط هنا </a>
            </h6>
           <h1 class="sp-1">
              أهلًا بك معنا            
            </h1>
            <!-- Load Facebook SDK for JavaScript -->
                  <div id="fb-root"></div>
                  <script>
                    window.fbAsyncInit = function() {
                      FB.init({
                        xfbml            : true,
                        version          : 'v9.0'
                      });
                    };

                    (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>

                  <!-- Your Chat Plugin code -->
                  <div class="fb-customerchat"
                    attribution=setup_tool
                    page_id="100360891928932">
                  </div>
            <div style="text-align: left;"><a class="genric-btn primary circle" style=" background: #1d509f;font-size: 100%" href="<?php echo base_url()?>Registration">تسجيل الخروج</a></div>

          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area  -->

<?php include 'templates/footer.php';?>
