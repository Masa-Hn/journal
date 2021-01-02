<?php 
    $page_id = 1;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 page-img">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/card_mediaQ.png" alt="">
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="story-content" dir="rtl">
              <h1><span class="sp-1" style="font-size: 50px">هل تعلم أن </span></h1>
              <br>
              <h1>
                <span class="sp-2">8</span>
                دقائق في  اليوم تجعلك    
              ضمن الـ <span class="sp-2">15%</span> من الأكثر قراءة في العالم؟
              </h1>
              <h1>
                حقق هذا بانضمامك لمشروع صناعة القراء
                الأكبر في الوطن العربي
              </h1>
              <a href="javascript:next('page_2')" class="genric-btn primary circle arrow">انضم الأن مجانًا </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->