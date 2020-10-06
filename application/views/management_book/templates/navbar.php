<body>
<style>
   .logout{
        margin-right:70px;
    }
@media screen and (max-width: 768px){
    .logout{
        margin-right:0px;
        padding-top: 30px;
    }
}
</style>
  <!-- Navbar -->

 <nav class="navbar navbar-expand-lg navbar-light" dir="ltr" style="font-family: 'Tajawal', sans-serif;font-size:1.1em">

    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url()?>assets/img/logo_2.png" >
    </a>  

    <button class="navbar-toggler right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" dir="rtl">
        <div class="navbar-nav">
          <li>
              <a style="color:#FCFAEF;" class="nav-item nav-link activ" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a>
          </li>
          <?php
          if(isset($_SESSION['team'])){
            $team = $_SESSION['team'];
            //split numbers
            $teamSplitted = explode("+", $team);
            //sort array values
            asort($teamSplitted);
          //  print_r($teamSplitted);
          //get array length
            $arrLength =  count($teamSplitted);

            $teamValue = '';

            //concatinate team values
            foreach ($teamSplitted as $key => $value) {
              $teamValue .= $value;
            }
          //  echo $teamValue;

            if($teamValue == '1'){
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddUsers/index">طلبات الإضافة</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addBooks/index">إضافة كتاب</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addArticle/index">إضافة مقال</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addActivity/index">إضافة نشاط</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addInfographic/index">إضافة انفوجرافيك</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>evaluation/index">إضافة تقييم</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>MentorshipTeam">عرض التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>DistributionArchive">أرشيف التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AmbassadorsJoining">عرض السفراء</a>
              </li>
              <?php
            }elseif ($teamValue == '2') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addBooks/index">إضافة كتاب</a>
              </li>
              <?php
            }elseif ($teamValue == '3') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addArticle/index">إضافة مقال</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addActivity/index">إضافة نشاط</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addInfographic/index">إضافة انفوجرافيك</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>evaluation/index">إضافة تقييم</a>
              </li>
              <?php
            }elseif ($teamValue == '4') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>MentorshipTeam">عرض التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>DistributionArchive">أرشيف التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AmbassadorsJoining">عرض السفراء</a>
              </li>
              <?php
            }elseif ($teamValue == '23') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addBooks/index">إضافة كتاب</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addArticle/index">إضافة مقال</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addActivity/index">إضافة نشاط</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addInfographic/index">إضافة انفوجرافيك</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>evaluation/index">إضافة تقييم</a>
              </li>
              <?php
            }elseif ($teamValue == '34') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addArticle/index">إضافة مقال</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addActivity/index">إضافة نشاط</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addInfographic/index">إضافة انفوجرافيك</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>evaluation/index">إضافة تقييم</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>MentorshipTeam">عرض التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>DistributionArchive">أرشيف التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AmbassadorsJoining">عرض السفراء</a>
              </li>
              <?php
            }elseif ($teamValue == '24') {
              ?>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>addBooks/index">إضافة كتاب</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>MentorshipTeam">عرض التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>DistributionArchive">أرشيف التوزيع</a>
              </li>
              <li>
                  <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AmbassadorsJoining">عرض السفراء</a>
              </li>
              <?php
            }
          }
              ?>
            <li>
                <a style="color:#FCFAEF;" class="nav-item nav-link logout" href="<?php echo base_url()?>login/logout">تسجيل خروج</a>
            </li>

        </div>
    </div>

</nav>
<!--
<li>
    <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddBooks/show_book">استعراض الكتب</a>
</li>
<li>
    <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>management_book/show_article">استعراض المقالات</a>
</li>
<li>
    <a style="color:#FCFAEF;" class="nav-item nav-link activ" href="<?php echo base_url()?>management_book/show_infographic">استعراض الانفوجرافيك</a>
</li>
-->
