<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 13;
    $this->StatisticsModel->addVisitor($page_id);
?>

<style type="text/css">
a{
  color: #1d509f;
}
  hr{

    width: 35%;
  }
</style>
<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
            <div class="banner-left col-lg-12 col-sm-12 story-content text-center page-img" dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                مرحبًا 
                <?php  echo $ambassador[0]->name; ?>
              </span>
            </h1>
          </div>
        </div>
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-6 col-sm-12 story-content  text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/leaderInfo.png" alt="">
            <a href="javascript:show('leaderInfo','closeLeaderInfo')" class="final-page genric-btn primary circle arrow">
              مشاهدة معلومات قائدي
            </a>
          </div>
          <div class="banner-left col-lg-6 col-sm-12 story-content  text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/teamInfo.png" alt="">
            <a href="javascript:show('teamInfo','closeTeamInfo')" class="final-page genric-btn primary circle arrow">
              مشاهدة معلومات فريقي
                
            </a>         
          </div>
          <div class="row fullscreen align-items-center justify-content-center">
            <div class="col-lg-12 col-sm-12 text-center">
              <br>
              <h4 style="margin-bottom: 5%; margin-top: 0">
              بينما تنتظر الدخول لمجموعة القراءة ما رايك أن تاخذ جولة بين رف مكتبة كتب منهج أصبوحة ١٨٠ من  <a href="<?php echo base_url()?>" target="_blank"><span class="sp-3">هنــا</span></a>
              </h4>
            </div>  
          </div>
          
        </div>
      </div>
    </section>

    <div id="leaderInfo" class="modal bgImg2" dir="rtl">
      <div class="row fullscreen align-items-center justify-content-center">
        <span class="close" id="closeLeaderInfo" onClick="closeModel()">&times;</span>

      </div>
      <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid infoImg" src="<?php echo base_url()?>assets/sign_up_assests/img/leaderInfo_2.png" alt="">
          </div>
          <div class="col-lg-12 col-sm-12">
            <div class="modalDiv" dir="rtl" style="text-align: center;">
              <h2>
                اسم قائدك : <?php echo $leader_info->leader_name; ?>
                <br>
              ستصلك رسالة من قائد فريقك، لطفًا تفقد طلبات المراسلة على الفيسبوك
                <br><br>

                إن كنت متحمسًا جدًا، اضغط هنا لِتَقوم بمراسلة قائدك : 
                <br>
                <a href="<?php echo $leader_info->leader_link; ?>" class="final-page genric-btn primary circle arrow" id="leader" style="margin: 1.5%; font-size: inherit;" target="_blank">
                  مراسلة قائدي
                </a>
              </h2>
              <?php 
                if ($reallocate) {
                  echo '
                  <a href="javascript:checkLogin('.$ambassador[0]->fb_id.')" class="final-page genric-btn primary circle arrow" style=" margin: 1.5%; background:darkred">
                      اختر لي قائدًا أخر
                  </a>';
                }
              ?>
            
            </div>
          </div>
      </div>
    </div>

    <div id="teamInfo" class="modal bgImg2" dir="rtl">
      <div class="row fullscreen align-items-center justify-content-center">
        <span class="close" id="closeTeamInfo" onClick="closeModel()">&times;</span>
      </div>
      <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid infoImg" src="<?php echo base_url()?>assets/sign_up_assests/img/teamInfo_1.png" alt="">
          </div>
          <div class=" col-lg-12 col-sm-12">
            <div class="modalDiv" dir="rtl" style="text-align: center;">
            <h3>
              قم بالضغط على الكود أدناه لنسخه، سوف يطلب منك إدخاله لقبولك ضمن مجموعة القراءة الخاصة بك.

            </h3>
            <div class="container_centered">
              <img class="copyimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point3.png" alt="">
              <div class="centered">
                <a href="javascript:copyCode()" class="final-page genric-btn primary circle arrow" id="code" style="margin-top: 15%; background-color: #8cb99c;">
                  <?php echo $leader_info->uniqid .$leader_info->id ; ?>    
                </a>
              </div>
            </div>
            <h2 class="clear artical-title-small" style="margin-bottom: 1.5%">
              اضغط هنا للانضمام لفريق القراءة الخاص بك
            </h2>
            <a href="<?php echo $leader_info->team_link; ?>" class="final-page genric-btn primary circle arrow" id="team" style="margin: 1.5%;"  target="_blank">
              اضغط هنا للدخول لفريقك
            </a>
          </div>
        </div>
        <div class="col-lg-12 col-sm-12 text-left">
          <div class="container_centered" style="text-align: left; margin-left: 0" id="help">
              <img class="helpimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point4.png" alt="">
              <div class="centered_help">
                <a href="https://www.facebook.com/taheelofosboha/" class="helpTxt" target="_blank">
                راسلنا من هنا لمُساعدتك      
                </a>
              </div>
            </div>  
      </div>  
    </div>
    <?php
    echo '<input type="hidden" name="inform_leader" id="inform_leader" value="'.$inform_leader.'">';  
      if ($inform_leader) {
        echo '<input type="hidden" name="leader_id" id="leader_id" value="'.$leader_id.'">'; 
        echo '<input type="hidden" name="request_id" id="request_id" value="'.$request_id.'">'; 
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
