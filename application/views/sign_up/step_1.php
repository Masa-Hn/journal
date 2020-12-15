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

    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl" style="margin-bottom: 10%">
            <h1>
              <span class="sp-1">عزيزي القارئ الجديد، </span>
            </h1>  
            <br>
            <h5>
              مشروعنا أصبوحة ١٨٠ ينشط حاليا عبر منصة الفيسبوك فقط. حيث هناك 
                <strong>
                  <span class="sp-1" style="color: #197439"> مشرف للقراءة  </span>
                </strong>
                تم تدريبه ليتابع ويشجع كل قارئ جديد وذلك عن طريقة مجموعة على منصة الفيسبوك 
                <strong>
                  (<span class="sp-1" style="color: #197439">Facebook Group</span>)
                </strong>
                
            </h5>
            <h5>
              للدخول مجموعة الفيسبوك سوف يطلب منك
                <strong>
                  <span class="sp-1" style="color: #197439"> الكود </span>
                </strong>
               التالي              
            </h5>
            <div class="col-lg-12 col-sm-12 text-center" dir="rtl">

              <span class="genric-btn primary circle arrow" id="code">
                  <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>
              </span>
            </div>
            <h5>
              احفظ الكود عن طريق كتابته على ورقة، 
                <br>
               <strong> أو   </strong>
               تصوير الشاشة
              <br>
            </h5>
          </div>
        <div class="col-lg-12 col-sm-12 text-center btn-left container_centered icon-bar-left" dir="rtl" style="top: 90%">
          <a href="javascript:copyCode()" class="genric-btn circle next-info" id="leader_info" style=" font-size: 100%">
                مستعد للانضمام للفريق
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </a>
        </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid character_fb" src="<?php echo base_url()?>assets/sign_up_assests/img/character_fb.png" alt="">
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

		$( document ).ready( function () {
			var base_url = "<?php echo base_url()?>";
			var ip_address = "<?php echo $_SERVER['REMOTE_ADDR'];?>";

			$( '#code' ).click( function () {
				$.ajax( {
					type: "POST",
					url: base_url + "Statistics/code_button",
					data: {
						ip_address: ip_address
					},
					success: function ( data ) {

						console.log( data );
					},
					error: function ( error ) {
						console.log( error );
					}
				} );
				return false;
			} );
		} );
	</script>
