<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';
?>

<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 story-content left-text text-center " dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                تهانينـــا !! 
              </span>
            </h1>
            <h1>
              سيكون    
              <span class="sp-2">
                <?php echo '<a href="'. $leader_info->leader_link.'" style="color:#9ed16f;">'. $leader_info->leader_name .'</a>'?> 
              </span> 
                قائد فريقك
            </h1>
            <br>
            <div>
            <h5>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/1.png">
              <br>
              ستصلك رسالة من قائد فريقك، لطفًا تفقد طلبات المراسلة على الفيسبوك 

            </h5>
            <h5>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/2.png">
              <br>
              اضغط على الكود التالي لنسخه فهو بوابة دخولك للمشروع

            </h5>
              <a href="javascript:copyCode()" class="final-page genric-btn primary circle arrow" id="code">
              <?php echo $request_id; ?>
                
            </a>
            <h5>
              <img src="<?php echo base_url()?>assets/sign_up_assests/img/3.png">
              <br>
               انضم لفريقك من هنا 
             
            </h5>
            <a href="<?php echo $leader_info->team_link; ?>" class="final-page genric-btn primary circle arrow" target="_blank">
              انضم للفريق
            </a>
          </div>
           <h1 class="sp-1">
              أهلًا بك معنا            
            </h1>
          </div>
        </div>
      </div>
    </section>
    <?php 
      if ($inform_leader) {
        echo '<input type="hidden" name="inform_leader" id="inform_leader" value="'.$inform_leader.'">'; 
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
