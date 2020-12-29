<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

  if(! isset($_SESSION['team_info'])){
     $url=base_url()."ReallocateAmbassador/";
      header('Location: '.$url);
      exit();
  }
  if(isset($_SESSION['team_info'])){
    $id =  $_SESSION['team_info']['ambassador'][0]->id; 
  }

    $page_id = 14;
    $this->StatisticsModel->incrementVisitors($page_id);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/info.css">

<input type="hidden" id="team_code" value="<?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>">

<!--Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-center col-lg-12 col-sm-12 text-center" dir="rtl">
            <img class="d-flex mx-auto img-fluid page-img" src="<?php echo base_url()?>assets/sign_up_assests/img/teamInfo.png" alt="">
          </div>
        </div>        
        <div class="row banner-center align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center" style="margin-bottom: 5%">
            <h5>

              قم بالضغط على الكود أدناه لنسخه، سوف يطلب منك إدخاله لقبولك ضمن مجموعة القراءة الخاصة بك
            </h5>
            <h5>
              سوف يتواصل المشرف معك لمساعدتك خطوة بخطوة ومنحك الكُتب، احرص على تفقد
                <span style="color: #197439; font-weight: 700;">رسائل الفيسبوك  </span>
                الخاصة بك
            </h5>
            <a href="<?php echo $_SESSION['team_info']['leader_info']->team_link; ?>" class="final-page genric-btn primary circle arrow" id="team" style="margin: 1.5%; font-size: 1.5em"  target="_blank">
              انضم للمجموعة من هنا
            </a>
          </div>
        </div>
        <!-- <div class="row align-items-center justify-content-center">
          <div class="col-lg-12 col-sm-12 text-center icon-bar-right" dir="rtl">

              <a href="javascript:next('step_1')" class="final-page genric-btn circle next-info" id="leader_info" style="margin: 1.5%;font-size: 100%">

                الخطوة السابقة
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </a>
          </div>
        </div>
         --> <div class="icon-bar-left">
            <div class="container_centered" style="text-align: left; margin-left: 0" id="help">
                <a href="https://www.facebook.com/taheelofosboha/" target="_blank">
                  <img class="helpimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point4.png" alt="">
                </a>
                
            </div>
          </div>
      </div>
      </div>

    </section>
   
<!-- End Banner Area  -->

<?php include 'templates/footer.php';?>
<script type="text/javascript">
		$( document ).ready( function () {
			var base_url = "<?php echo base_url()?>";
			//var ip_address = "<?php echo $_SERVER['REMOTE_ADDR'];?>";
			var id = <?php echo $id;?>;
			
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
						//ip_address: ip_address,
						id: id
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
        var team_code =document.getElementById("team_code").value; 
        Swal.fire({
          title: 'هل قمت بالاحتفاظ بالكود التالي؟',
          text:team_code,
          imageUrl:document.getElementById("base_url").value+'assets/sign_up_assests/img/wonderCode.png',
          imageWidth: 100,
          imageAlt: 'Custom image',
          cancelButtonText: 'لا',
          confirmButtonText: "نعم ",
          confirmButtonColor:'#9ed16f',
          cancelButtonColor: 'darkred',
          showCancelButton: true,
          showCloseButton: true
        })
        .then((result) => {
          if (result.value) {
            $.ajax( {
                type: "POST",
                url: base_url + "Statistics/team_link_button",
                data: {
                //	ip_address: ip_address,
                    id:id
                },
              success: function ( data ) {
                window.open(document.getElementById('team').getAttribute("href"), "_blank");
              },
              error: function ( error ) {
                window.open(document.getElementById('team').getAttribute("href"), "_blank");

                console.log( error );
              }
            });
          }//if
          else{
            next('step_1');
          }				
			   });
	 });
    });
	</script>
