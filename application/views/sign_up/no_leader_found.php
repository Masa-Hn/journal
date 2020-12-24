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

    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
       <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 page-img">
            <img class="d-flex mx-auto img-fluid regImg" src="<?php echo base_url()?>assets/sign_up_assests/img/ambMsg.png" alt="" style="width: 50%">
          </div>

          <div class="col-lg-6 col-sm-12 text-center" >
            <div class="story-content" dir="rtl">
              <div class="heading">
                <h1>
                  نعتذر!
                </h1>
                <p class="pm">
                  نظرا لزيادة عدد الانضمام اليومي للقراء فقد نفذت الأفرقة المخصصة للقراء.             
                  لطفا قم بمراسلة صفحتنا من خلال إرسال الرسالة التالية

                </p>
                <strong><p id="msg" class="pm" style="color: #289506">
                  لقد أنهيت خطوات الانضمام ، أرغب بفريق جديد.
                  رقم طلبي (<?php echo $ambassador[0]->id;?>)
                </p></strong>
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
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
