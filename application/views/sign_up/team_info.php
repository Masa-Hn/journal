<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

  if(! isset($_SESSION['team_info'])){
     $url=base_url()."ReallocateAmbassador/";
      header('Location: '.$url);
      exit();
  }

    $page_id = 13;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/info.css">

<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center page-img" dir="rtl">
              <h3>
                تبقى ثلاث خطوات لتصبح فردًا معنا
              </h3>
              <h1>
                <span class="sp-3">
                  أولًا : 
                </span>
                الانضمام لمجموعة القراءة الخاصة بك
              </h1>
          </div>
        </div>
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/teamInfo.png" alt="">
          </div>
        </div>        
        <div class="row banner-center align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center" style="margin-bottom: 5%">
            <h5>
              قم بالضغط على الكود أدناه لنسخه، سوف يطلب منك إدخاله لقبولك ضمن مجموعة القراءة الخاصة بك

            </h5>
            <div class="container_centered">
              <img class="copyimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point.png" alt="">
              <div class="centered">
                <a href="javascript:copyCode()" class="final-page code-text" id="code">
                  <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>    
                </a>
              </div>
            </div>
            <h5 class="clear artical-title-small" style="margin-bottom: 1.5%">
              ثم قم بعمل انضمام لمجموعة القراءة الخاصة بك
            </h5>
            <a href="<?php echo $_SESSION['team_info']['leader_info']->team_link; ?>" class="final-page genric-btn primary circle arrow" id="team" style="margin: 1.5%;"  target="_blank">
              اضغط هنا للدخول لفريقك
            </a>
          </div>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center icon-bar-right" dir="rtl">
              <a href="javascript:next('leader_info')" class="final-page genric-btn circle next-info" id="leader_info" style="margin: 1.5%;">
                الخطوة التالية
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
          </div>
        </div>
         <div class="icon-bar-left">
            <div class="container_centered" style="text-align: left; margin-left: 0" id="help">
                <a href="https://www.facebook.com/taheelofosboha/" target="_blank">
                  <img class="helpimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point4.png" alt="">
                </a>
                
            </div>
          </div>
      </div>
      </div>

    </section>
    <?php
    echo '<input type="hidden" name="inform_leader" id="inform_leader" value="'.$_SESSION['team_info']['inform_leader'].'">';  
      if ( $_SESSION['team_info']['inform_leader']) {
        echo '<input type="hidden" name="leader_id" id="leader_id" value="'.$_SESSION['team_info']['leader_id'].'">'; 
        echo '<input type="hidden" name="request_id" id="request_id" value="'.$_SESSION['team_info']['request_id'].'">'; 
      }
    ?>
<!-- End Banner Area  -->

<?php include 'templates/footer.php';?>
<script type="text/javascript">
  $(document).ready(function(){
    if(document.getElementById('inform_leader').value){
      leader_id=document.getElementById('leader_id').value;
      request_id=document.getElementById('request_id').value;
      informLeader(leader_id,request_id);
    }
  });

</script>
