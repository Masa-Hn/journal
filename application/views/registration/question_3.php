<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
 
    $page_id = 8;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<style type="text/css">
  ul{
    cursor:pointer;
  }
</style>
    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                سؤال
              </span>
            <br>
            <h1>
              كيف تفضل كتابة ما استفدته من قراءتك؟
            </h1>
            <br>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/creative.png">
              <br>
                أن تكتب رأيك الشخصي فيما قرأت (أطروحة)
            </h3>
            <hr>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/quotes.png">
              <br>
                أن تكتب اقتباس أعجبك مما قرأت (اقتباس)
            </h3>
            <hr>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/screenshot.png">
              <br>
              أن تقوم بعمل سكرين شوت للاقتباسات التي أعجبتك (سكرين شوت)
            </h3>
            
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/wonder.png" alt="" alt="" style="width: 80%">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
