<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 5;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                سؤال
              </span>
            </h1>
            <h1>
              هل تتذكر عدد الصفحات الأسبوعية 
              <br>
              التي
              عليك قراءتها للحصول على العلامة الكاملة

              في القراءة؟
            </h1>
            <span style="color: red; display: none;" id="error_msg">حاول مُجددًا</span>
            <br>
            <input type="text" name="" placeholder="أدخل عدد الصفحات " id="answer">
            <br>
               <a href="javascript:checkAnswer()" class="genric-btn primary circle ">التالي <span class="lnr lnr-arrow-right"></span></a>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/wonder.png" alt="" alt="" style="width: 80%">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->

<script type="text/javascript">
  document.querySelector('#answer').addEventListener('input', function(e) {
    if (document.getElementById('error_msg').style.display == "block") {
     document.getElementById('error_msg').style.display="none";
    }
  });
</script>
<?php include 'templates/footer.php';?>
