<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>
  <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 text-center page-img" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/any.png" alt="">
             <h4>
              ماذا تفضل أن يكون جنس قائدك؟
            </h4>
            <div class="form-group">
              <select class="form-control" id="leader_gender" required>
                <option value="">اختر جنس القائد </option>
                <option value="female">أنثى</option>
                <option value="male">ذكر</option>
                <option value="any">لا فرق </option>
              </select>
            </div>
            
          </div>
          <div class="col-lg-6 col-sm-12 text-center banner-left page-img">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/country.png" alt="">
              <h4>
                أخبرنا من أين أنت
              </h4>
              <div class="form-group">
                <select class="form-control" id="country" required>
                  <option value="">دولتم</option>
                  <option value="c1">1</option>
                  <option value="c2">2</option>
                </select>
              </div>
          </div>
        </div>

        <div class="row fullscreen align-items-center justify-content-center text-center">
          <a href="javascript:allocateAmbassador()" class="genric-btn primary circle arrow">التالي <span class="lnr lnr-arrow-right"></span></a>

        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
