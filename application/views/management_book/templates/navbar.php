
    <!-- Navbar -->
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbar-collapse-main" aria-expanded="true" aria-label="Toggle navigation">
          <span class="sr-only">navegation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="<?php echo base_url()?>assets/img/logo_2.png">
        </a>

        <div class="navbar-brand" style="color: white">
        <p >|قسم الإدارة</p>
        </div>

      </div>
      <div   id="navbar-collapse-main" dir="rtl" style="padding: 0;">
        <ul class="nav navbar-nav navbar-right ml-auto nav-direct">
         
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>AddBooks/index">إضافة كتاب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>AddBooks/show_book">استعراض الكتب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_article">إضافة مقال</a></li>
           <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/show_article">استعراض المقالات</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_activity">إضافة نشاط</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_infographic">إضافة انفوجرافيك</a></li>
         
        </ul> 
      </div>
    </div>
  </nav>