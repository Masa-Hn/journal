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
              <span style="color: #197439; font-weight: 700;"> مشرف للقراءة </span>
              تم تدريبه ليتابع ويشجع كل قارئ جديد وذلك عن طريقة مجموعة على منصة الفيسبوك 

              <span style="color: #197439; font-weight: 700;"> (Facebook Group) </span>
            </h5>
            <h5>
              للدخول إلى مجموعة الفيسبوك سوف يطلب منك 
             <span style="color: #197439; font-weight: 700;">  الكود </span>
                التالي 

            </h5>
            <div class="col-lg-12 col-sm-12 text-center" dir="rtl">
                <div class="container_centered">
                  <img class="d-flex mx-auto img-fluid code-img" src="<?php echo base_url()?>assets/sign_up_assests/img/code.png" alt="">
                  <div class="centered">
                    <h4 style="  font-weight: bold;">
                      <span class="team-code">
                        <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>
                      </span>
                    </h4>
                  </div>
              </div>
              <!-- <button class="genric-btn primary circle arrow" onclick="copyCode()"  id="code">
                  <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>
              </button>
             --></div>
            <h5>
              احفظ الكود عن طريق كتابته على ورقة
              <br>
               <strong> أو   </strong>
               تصوير الشاشة
            </h5>
          </div>
        <div class="col-lg-12 col-sm-12 text-center btn-left container_centered icon-bar-left" dir="rtl" style="top: 90%">
          <a href="javascript:next('team_info')" class="genric-btn circle next-info" id="leader_info" style=" font-size: 100%">
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

        var Code =document.getElementById('code');
        var copyText = document.createElement('textarea');
        copyText.value=code.innerHTML;
        copyText.setAttribute('readonly', '');
        copyText.style = {position: 'absolute', left: '-9999px'};
        document.body.appendChild(copyText);
        copyText.select();
        document.execCommand('copy');
        // Remove temporary textarea
        document.body.removeChild(copyText);

        Swal.fire({
          icon: 'success',
          title: 'تم  النسخ ',
          text:'لطفًا قم بارسال هذا الكود لقائد الفريق الخاص بك',
          type: "success",
          timer: 3000,
          confirmButtonText: "استمرار ",
          confirmButtonColor:'#9ed16f'
        });

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

			$( '#team' ).click( function () {

				$.ajax( {
					type: "POST",
					url: base_url + "Statistics/team_link_button",
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
        window.open(document.getElementById('team').getAttribute("href"), "_blank");
				return false;
			} );
		} );
	</script>
