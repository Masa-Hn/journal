<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
 
    $page_id = 8;
    $this->StatisticsModel->addVisitor($page_id);
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
              أي من الطرق السابقة تفضل
            </h1>
            <br>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/creative.png">
              <br>
              تعبير عن رأيك فيما قرأت (أطروحة) 
            </h3>
            <hr>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/quotes.png">
              <br>
              كتابة اقتباس أعجبك من الكتاب
            </h3>
            <hr>
            <h3 class="question" onclick="nextWithMsg('page_6',0)">
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/screenshot.png">
              <br>
              سكرين شوت لاقتباسات أثارت اهتمامك
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
