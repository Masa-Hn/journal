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
<div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="header_margin" data-aos="fade-up" dir="rtl">
            عزيزي القارئ الجديد،
            </h1>
            <h5 data-aos="fade-up" data-aos-delay="100" dir="rtl">
            مشروعنا أصبوحة ١٨٠ ينشط حاليا عبر منصة الفيسبوك فقط. حيث هناك مشرف للقراءة تم تدريبه ليتابع ويشجع كل قارئ جديد وذلك عن طريقة مجموعة على منصة الفيسبوك (Facebook Group)
            </h5>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/facebook.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-9 text-center">
        <h2>
        للدخول إلى مجموعة الفيسبوك سوف يطلب منك الكود التالي
        </h2>
      </div>
      <div class="col-md-9 text-center">
        <div class="container_center">
          <img class="d-flex mx-auto img-fluid " src="<?php echo base_url()?>assets/sign_up_assests/img/codeImg.png" alt="">
          <div class="centered">
            <span class="code_font_size team-code" id="code">
              <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-9 text-center">
        <h2>
        احفظ الكود عن طريق كتابته على ورقة أو تصوير الشاشة
        </h2>
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <a href="javascript:copyCode()" class="btn btn-primary rounded py-2 px-4 text-white">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
        مستعد للانضمام للفريق
      </a>
    </div>
  </div>
</div>
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
  $( document ).ready( function () {
    if(document.getElementById('inform_leader').value){
      leader_id=document.getElementById('leader_id').value;
      request_id=document.getElementById('request_id').value;
      informLeader(leader_id,request_id);
    }
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
      });
    return false;
    });
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