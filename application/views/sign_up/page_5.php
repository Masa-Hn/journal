<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1><span class="sp-1" style="font-size: 50px; line-height: 1;">يأتي الآن السؤال الأهم </span></h1>
              <br>
              <h1><span class="sp-1" style="font-size: 50px; line-height: 1;">كيف تستفيد من قراءتك؟ </span></h1>
              <br>

            <br>
            <h1>
              يكون هذا عبر كتابة أطروحة وهي ثلاثة أنواع
            </h1>
            <br>
            <h3>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/creative.png">
              <br>
              تعبير عن رأيك فيما قرأت (أطروحة) 
            </h3>
            <hr>
            <h3>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/quotes.png">
              <br>
              كتابة اقتباس أعجبك من الكتاب
            </h3>
            <hr>
            <h3>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/screenshot.png">
              <br>
              سكرين شوت لاقتباسات أثارت اهتمامك
            </h3>
               <a href="javascript:next('question_3')" class="genric-btn primary circle arrow">التالي </a>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_5.png" alt="" style="width: 80%">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
