<!DOCTYPE html>
<html lang="ar">
<head>
  <title>Osboha 180</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/sign_up_assests/css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<style type="text/css">
  .final-page{
    margin: 2%;
  }
</style>
<body>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">
  <div class="oz-body-wrap">
    <!-- Start Header Area -->
    <header class="default-header">
      <div class="container-fluid">
        <div class="header-wrap">
          <div class="header-top d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="<?php echo base_url()?>SignUp"><img src="<?php echo base_url()?>assets/sign_up_assests/img/logo.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Area -->
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
<!-- End Banner Area  -->
 </div>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/sign_up_assests/js/main.js"></script>
</html>