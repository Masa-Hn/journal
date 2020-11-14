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
    <section class="banner-area relative bgImg1">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12 story-content right-text" dir="rtl">


            <h1>
              <span class="sp-1" style="font-size: 50px">
                مرحبًا 
                <?php  echo $ambassador[0]->name; ?>
              </span>
            </h1>
            <br>
            <h1>
              معلوماتك
            </h1>
            <hr>
            <h6>
              اسمك : <?php  echo $ambassador[0]->name; ?>
              <br>
              رقم طلبك: <?php  echo $ambassador[0]->request_id; ?>
              <br>
              جنسك: <?php  echo $ambassador[0]->gender; ?>
              <br>
              حساب الفيسبوك الخاص بك:: <a href="<?php  echo $ambassador[0]->profile_link; ?>">مشاهدة حسابي</a>

            </h6>
            <br>
             <h1>
              معلومات قائدك          
            </h1>
            <hr>
            <h6>
               اسم قائدك : <?php echo $leader_info->leader_name; ?>
              <br>
              حساب الفيسبوك الخاص بقائدك : <a href="<?php echo $leader_info->leader_link; ?>" id="leader">مشاهدة حساب قائدي</a>
            </h6>
            <br>   

            <h1>
               فريق القراءة الخاص بك
            </h1>
            <hr>
            <br>
            <h6>
              للانضمام لفريق القراءة الخاص بك : <a href="<?php echo $leader_info->team_link; ?>" id="team"> اضغط هنا </a>
            </h6>
            <br>           
           <h1 class="sp-1">
              أهلًا بك معنا            
            </h1>
          </div>
        </div>
      </div>
    </section>
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
<script type="text/javascript">
	 $(document).ready(function () {
	 var base_url = "<?php echo base_url()?>";
	 var ip_address = "<?php echo $_SERVER['REMOTE_ADDR'];?>";
	 
 	$('#code').click(function () {
		
 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/code_button",
 			data: {
 				ip_address: ip_address
 			}, // multiple data sent using ajax
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});

 	$('#leader').click(function () {
 		
 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/leader_link_button",
 			data: {
 				ip_address: ip_address
 			}, 
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});

 	$('#team').click(function () {

 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/team_link_button",
 			data: {
 				ip_address: ip_address
 			}, 
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});
 });

	</script>
