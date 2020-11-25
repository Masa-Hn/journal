<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
 
    $page_id = 3;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<style type="text/css">
  @media (min-width: 576px)
{
  .story-content{
    margin-top:5%; 
  }
}
</style>

<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/character_3_2.png" alt="">
          </div>
          <div class="col-lg-12 col-sm-12">
            <div class="story-content" dir="rtl" style="text-align: center;">
              <h1><span class="sp-1" style="font-size: 30px">
                تبدأ مهمة السفير الأسبوعية يوم الاحد وتنتهي السبت
                <br>
                لتكون علامته الكاملة هي 
                <span class="sp-2">100%</span>
              </span>
              </h1>
              <h1>
                لا تعتمد قراءتك على أكبر عدد من الصفحات إنما عن استمراريتك بالتعلم
                <br>
                وقد قمنا بتجهيز قائد لك تم تدريبه لمتابعتك وتشجيعك وهناك أنشطة وتكريمات
              </h1>
              <a href="javascript:next('page_4')" class="genric-btn primary circle arrow">التالي <span class="lnr lnr-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
