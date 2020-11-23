<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

  if(! isset($_SESSION['team_info'])){
     $url=base_url()."ReallocateAmbassador/";
      header('Location: '.$url);
      exit();
  }

    $page_id = 13;
    $this->StatisticsModel->addVisitor($page_id);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/info.css">

<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center page-img" dir="rtl">
              <h3>
                <span class="sp-3">
                  ثانيًا : 
                </span>
              </h3>
              <h1>
                لنضمن لك سرعة التواصل مع 
                <span class="sp-red">مشرف القراءة  </span>
                الخاص بك
              </h1>
          </div>
        </div>
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/leaderInfo.png" alt="">
          </div>
        </div>        
        <div class="row banner-center align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center" style="margin-bottom: 5%">
            <h3>
              أرسل له رسالة تلقي بها التحية

              <a href="<?php echo $_SESSION['team_info']['leader_info']->leader_link; ?>" target="_blank"><span class="sp-green">من هنا </span></a>
            </h3>
            <?php 
                if ($_SESSION['team_info']['reallocate']) {
                  echo '
                  <a href="javascript:checkLogin('.$_SESSION['team_info']['ambassador'][0]->fb_id.')" class="final-page genric-btn primary circle arrow" style=" margin: 1.5%; background:darkred">
                      اختر لي قائدًا أخر
                  </a>';
                }
            ?>
          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center icon-bar-right" dir="rtl">
              <a href="javascript:next('book_rack')" class="final-page genric-btn circle next-info" id="book_rack" style="margin: 1.5%;">
                الخطوة التالية
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
          </div>
          <div class="col-lg-12 col-sm-12 text-center btn-left container_centered icon-bar-left" dir="rtl">
              <a href="javascript:next('team_info')" class="final-page genric-btn circle prev-info" id="team" style="margin: 1.5%;">
                الخطوة  السابقة
            </a>
          </div>
        </div>
      </div>
    </section>
<!-- End Banner Area  -->

<?php include 'templates/footer.php';?>
