<?php 
    $page_id = 17;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<style type="text/css">
  #join{
    margin-bottom: 2%;
  }
  .pm{
    margin-bottom: 3% !important ;
  }
  @media (min-width: 576px)
{
  .story-content{
    margin-top:5%; 
  }
}
</style>
<div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-12 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/ambMsg.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section" dir="rtl">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-9 text-center">
        <h1>
          نعتذر ! 
        </h1>
      </div>
       <div class="col-md-9 text-center">
        <h5>
          نظرا لزيادة عدد الانضمام اليومي للقراء فقد نفذت الأفرقة المخصصة للقراء. لطفا قم بمراسلة صفحتنا من خلال إرسال رقم طلبك برسالة منفصلة
        </h5>
      </div>
      <div class="col-md-9 text-center">
      <h1> رقمك طلبك هو</h1>
        <h1><span id="msg" class="pm sp-1" style="color: #289506">                  
          <?php echo $ambassadorID;?>
        </span></h1>
      </div>
      <div class="col-md-9 text-center">
        <h5>
            حتى نتمكن من التواصل معك مباشرة فور تجهيز فريق القراءة الخاص بك.
              سيتم تجهيز فريق قراءة جديد لك خصيصًا خلال ٢٤ ساعة.
        </h5>
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <a href="javascript:copyMsg('https://www.messenger.com/t/100360891928932/')" class="btn btn-primary rounded py-2 px-4 text-white">
        أرسل رسالة 
      </a>
    </div>
  </div>
</div>
    <!-- Start Banner Area -->
<!--     <section class="banner-area relative bgImg2">
       <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 page-img">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/ambMsg.png" alt="" style="width: 50%">
          </div>

          <div class="col-lg-6 col-sm-12 text-center" >
            <div class="story-content" dir="rtl">
              <div class="heading">
                <h1>
                  نعتذر!
                </h1>
                <p class="pm">
                  نظرا لزيادة عدد الانضمام اليومي للقراء فقد نفذت الأفرقة المخصصة للقراء. لطفا قم بمراسلة صفحتنا من خلال إرسال رقم طلبك برسالة منفصلة


                </p>
                <h5> رقمك طلبك هو</h5>
                <h1><span id="msg" class="pm sp-1" style="color: #289506">                  
                  <?php echo $ambassadorID;?>
                </span></h1>
                <p class="pm">
                  حتى نتمكن من التواصل معك مباشرة فور تجهيز فريق القراءة الخاص بك.
              سيتم تجهيز فريق قراءة جديد لك خصيصًا خلال ٢٤ ساعة.
                </p>
              </div>
              <a href="javascript:copyMsg('https://www.messenger.com/t/100360891928932/')" class="genric-btn primary circle arrow">
                أرسل الرسالة
              </a>

            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Banner Area -->
