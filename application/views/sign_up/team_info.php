<?php
  include 'templates/header.php';
  include 'templates/navbar.php';
  if(! isset($_SESSION['team_info'])){
    $url=base_url()."ReallocateAmbassador/";
    header('Location: '.$url);
    exit();
  }
  if(isset($_SESSION['team_info'])){
    $id =  $_SESSION['team_info']['ambassador'][count( $_SESSION['team_info']['ambassador']) - 1]->id;
  }
  $page_id = 14;
  $this->StatisticsModel->incrementVisitors($page_id);
?>
<link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/info.css">
<input type="hidden" id="team_code" value="<?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>">
<div class="overlay bg-light" style="padding: 8rem 0 1rem 0;" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-12">
        
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 col-sm-12 text-center">
            <h1 class="header_margin" data-aos="fade-up" dir="rtl">
            بيانات فريقك
            </h1>
          </div>
          <div class="col-lg-4 col-sm-12 text-center">
            <img src="<?php echo base_url()?>assets/sign_up_assests/img/team.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section" dir="rtl">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-12">
        <div class="border p-3 rounded mb-2" style="display: -webkit-inline-box; width: 100%">
          
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            اسم فريق المتابعة :
            <?php echo $_SESSION['team_info']['leader_info']->team_name; ?>
          </p>
        </div>
      </div>
      <div class="col-12">
        <div class="border p-3 rounded mb-2" style="display: -webkit-inline-box; width: 100%">
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            كود الدخول :
            <?php echo $_SESSION['team_info']['leader_info']->uniqid .$_SESSION['team_info']['leader_info']->id ; ?>
          </p>
        </div>
      </div>
      <div class="col-12">
        <div class="border p-3 rounded mb-2" style="display: -webkit-inline-box; width: 100%">
          <p class="accordion-item d-block mb-0" style="font-weight: 700">
            اسم قائد فريقك :
            <?php echo $_SESSION['team_info']['leader_info']->leader_name; ?>
          </p>
        </div>
      </div>
      <p style="color: darkred">
        (لطفا قم بتصوير الشاشة، هذه المعلومات سوف تهمك لاحقا ❤️)
      </p>
    </div>
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h2>
        سوف تصلك رسالة من قائد الفريق للترحيب بك ومساعدتك. رجاء تفقد
        <strong class="strong_green" >رسائل الفيسبوك  </strong>
        </h2>
      </div>
    </div>
    <div class="row justify-content-center mb-5" id="redirectAgain">
      <div class="col-md-7 text-center">
        <h2 style="color: darkred">
          اذا لم يقم الموقع بتحويلك لفريق القراءة الخاص بك راسلنا 
          <strong class="strong_green" ><a  href="https://www.messenger.com/t/100360891928932/" target="_blank"> هنا  </a></strong>
            لنُساعدك 
        </h2>
          </div>
        </div>
    <div class="col-12 text-center mt-4">
      <a id="team" class="btn btn-primary rounded py-2 px-4 text-white">
        انضم للمجموعة من هنا
      </a>
      <input value="<?php echo $_SESSION['team_info']['leader_info']->team_link; ?>" id="team_link" style="display: none;">
    </div>
    <!-- <div class="icon-bar-left">
      <div class="container_centered" style="text-align: left; margin-left: 0" id="help">
        <a href="https://www.messenger.com/t/100360891928932/" target="_blank">
          <img class="helpimg" src="<?php echo base_url()?>assets/sign_up_assests/img/point4.png" alt="">
        </a>
        
      </div>
    </div> -->
  </div>
</div>
<?php include 'templates/footer.php';?>
<script type="text/javascript">
$( document ).ready(function(){
  /* ============================================================== */
  /* vars define */
  /* ============================================================== */
  var base_url = "<?php echo base_url()?>";
  var id = <?php echo $id;?>;

  /* ============================================================== */
  /* copy code */
  /* ============================================================== */
  // $('#code').click(function(){
  //     var Code =document.getElementById('code');
  //     var copyText = document.createElement('textarea');
  //     copyText.value=code.innerHTML;
  //     copyText.setAttribute('readonly', '');
  //     copyText.style = {position: 'absolute', left: '-9999px'};
  //     document.body.appendChild(copyText);
  //     copyText.select();
  //     document.execCommand('copy');
  //     // Remove temporary textarea
  //     document.body.removeChild(copyText);
  //     Swal.fire({
  //       icon: 'success',
  //       title: 'تم  النسخ ',
  //       text:'لطفًا قم بارسال هذا الكود لقائد الفريق الخاص بك',
  //       type: "success",
  //       timer: 3000,
  //       confirmButtonText: "استمرار ",
  //       confirmButtonColor:'#9ed16f'
  //     });
  //   });

    /* ============================================================== */
    /* go to team */
    /* ============================================================== */
  $('#team').click( function () {
    var team_code = document.getElementById("team_code").value;
    var team_link = document.getElementById('team_link').value; 
    if (!team_link.match(/^http?:\/\//i) || !team_link.match(/^https?:\/\//i)) {
        team_link = 'https://' + team_link;
    }
    Swal.fire({
      title: 'هل قمت بالاحتفاظ بالكود التالي؟',
      text:team_code,
      imageUrl:document.getElementById("base_url").value+'assets/sign_up_assests/img/wrong.png',
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
        $.ajax({
          type: "POST",
          url: base_url + "signUp/team_link_button",
          data:{ // ip_address: ip_address,
          id:id
        },
        success: function(data){

          window.location.replace(team_link, "_blank");
          setInterval(function(){
            document.getElementById('redirectAgain').style.display='block';
          }, 3000);

          //document.getElementById('team_link').click();
        },
        error: function(error) {
          window.location.replace(team_link, "_blank");
          setInterval(function(){
            document.getElementById('redirectAgain').style.display='block';
          }, 3000);
          console.log( error );
        }
        });
      }
      else{
        next('step_1');
      }
    });
  });
});
</script>