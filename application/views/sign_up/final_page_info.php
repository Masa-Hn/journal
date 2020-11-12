<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 13;
    $this->StatisticsModel->addVisitor($page_id);
?>

<style type="text/css">
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
            <a href="javascript:show('leaderInfo')" class="final-page genric-btn primary circle arrow">
              مشاهدة معلومات قائدي
            </a>
          </div>
          <div class="banner-left col-lg-6 col-sm-12 story-content  text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/teamInfo.png" alt="">
            <a href="javascript:show('teamInfo')" class="final-page genric-btn primary circle arrow">
              مشاهدة معلومات فريقي
                
            </a>         
          </div>
          <div class="row fullscreen align-items-center justify-content-center">
            <div class="col-lg-12 col-sm-12 text-center">
              <br>
              <h4 style="margin-bottom: 5%">
              بينما تنتظر الدخول لمجموعة القراءة ما رايك أن تاخذ جولة بين رف مكتبة كتب منهج أصبوحة ١٨٠ من  <a href="">هنا</a>
              </h4>
            </div>  
          </div>
          
        </div>
      </div>
    </section>

    <div id="leaderInfo" class="modal" dir="rtl">
      <span class="close" onClick="closeModel()">&times;</span>
      <h4>
        اسم قائدك : <?php echo $leader_info->leader_name; ?>
        <br>
      ستصلك رسالة من قائد فريقك، لطفًا تفقد طلبات المراسلة على الفبيسبوك
        <br><br>

        إن كنت متحمسًا جدًا، اضغط هنا لِتَقوم بمراسلة قائدك : <a href="<?php echo $leader_info->leader_link; ?>">مراسلة قائدي</a>
      </h4>
      
      <?php 
        if ($reallocate) {
          echo '
          <a href="'.base_url().'ReallocateAmbassador/checkAmbassador?fb_id='.$ambassador[0]->fb_id.'" class="final-page genric-btn primary circle arrow" style="padding: 0px 15px; font-size: 1em; background:darkred">
              اختر لي قائدًا أخر
          </a>';
        }
      ?>
            
    </div>

    <div id="teamInfo" class="modal" dir="rtl">
      <span class="close" onClick="closeModel()">&times;</span>
      <h6>
       اضغط على الكود التالي لنسخه فهو بوابة دخولك للمشروع
        <br>
        <a href="javascript:copyCode()" class="final-page genric-btn primary circle arrow" id="code" style="padding: 0px 10px">
              OSB180<?php echo $request_id; ?>
                
        </a>
        <br>
        للانضمام لفريق القراءة الخاص بك : <a href="<?php echo $leader_info->team_link; ?>"> اضغط هنا </a>
      </h6>
            
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
