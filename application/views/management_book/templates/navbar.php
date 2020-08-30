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
        <img src="<?php echo base_url()?>assets/img/logo_2.png" height="45">
    </a>  

    <button class="navbar-toggler right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" dir="rtl">
        <div class="navbar-nav">
            <li>
                <a style="color:#FCFAEF;" class="nav-item nav-link activ" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a>
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
                <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>management_book/mentorshipTeam_2">عرض التوزيع</a>
            </li>
            <li>
                <a style="color:#FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>management_book/mentorshipTeam">أرشيف التوزيع</a>
            </li>

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
