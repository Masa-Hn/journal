<?php 
    $page_id = 1;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
    <div class="overlay" style="padding: 8rem 0 4rem 0;
    border-bottom-right-radius: 50%;
    background: 0% 0px #E8F1EC;
    overflow: hidden;" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-lg-8 col-sm-12 text-center">
                <h1 class="" data-aos="fade-up" dir="rtl">
                  8 دقائق في اليوم تجعلك ضمن الـ 15% من الأكثر قراءة في العالم
                </h1>
                <h5 data-aos="fade-up" data-aos-delay="100">
                  حقق هذا بانضمامك لمشروع صناعة القراء الأكبر في الوطن العربي
                </h5>
                <br>
                <span class="bg-primary text-white rounded btn" data-aos="fade-up" style="font-size: 2rem" onclick="next('reg_steps')">
                  انضم الأن مجانًا
                </span>

              </div>
              <div class="col-lg-4 col-sm-12 text-center">
                <img src="<?php echo base_url()?>assets/sign_up_assests/img/character_1_3.png" alt="Image" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  

     <div class="site-section" data-aos="fade">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/about_us.png" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-5 ml-auto" dir="rtl" style="text-align: right;">
            <h2 class=" mb-3">من نحن</h2>
            <p>
              المشروع الأكبر عربيا لصناعة القراء
              عن طريق استثمار القراءة المنهجية ونواتجها
              لصناعة مجتمع واع قادر على الوصول للنهضة
              وتحقيق التنمية مستعينين بالتكنولوجيا الحديثة

            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">
              انضم مجانًا 
            </h2>
          </div>
        </div>
          <div class="col-12 text-center mt-4">
            <a href="javascript:next('page_2')" class="btn btn-primary rounded py-2 px-4 text-white">
              ابدأ الأن 
            </a>
          </div>
        </div>
      </div>
    </div>