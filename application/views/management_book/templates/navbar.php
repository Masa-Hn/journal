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

 <nav  class="navbar navbar-expand-lg navbar-light " style="background-color: #205d67;" >
 
  <a class="navbar-brand" href="#">
          <img src="<?php echo base_url()?>assets/img/logo_2.png">
        </a>  
    

        <button class="navbar-toggler right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup" dir="rtl">
    <div class="navbar-nav">
      <li ><a style=" color: #FCFAEF;" class="nav-item nav-link activ" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a></li>
          <li ><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddBooks/index">إضافة كتاب</a></li>
          <li ><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddBooks/show_book">استعراض الكتب</a></li>
          <li><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddArticle/index">إضافة مقال</a></li>
           <li ><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>management_book/show_article">استعراض المقالات</a></li>
          <li ><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>management_book/add_activity">إضافة نشاط</a></li>
          <li ><a style=" color: #FCFAEF;" class="nav-item nav-link" href="<?php echo base_url()?>AddInfographic/index">إضافة انفوجرافيك</a></li>
           <li ><a style=" color: #FCFAEF;" class="nav-item nav-link activ" href="<?php echo base_url()?>management_book/show_infographic">استعراض الانفوجرافيك</a></li>
           
           <li ><a style=" color: #FCFAEF;" class="nav-item nav-link logout" href="<?php echo base_url()?>login/logout">تسجيل خروج</a></li>
         
    </div>
  </div>

</nav>
