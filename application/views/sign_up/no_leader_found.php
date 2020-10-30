<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
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
          <div class=" banner-left left-text col-lg-12 col-sm-12">
            <div class="story-content" dir="rtl" style="text-align: center;">
              <h1><span class="sp-1" style="font-size: 30px">
                لا يتوفر قادة حاليًا حسب طلبك 
              </span>
              </h1>
              <h1>
                 سيتم التواصل معك قريبًا 
              </h1>
              <a href="<?php echo base_url()?>" class="genric-btn primary circle arrow" id="code">عودة إلى رف الكتب </a>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area -->
<?php include 'templates/footer.php';?>
