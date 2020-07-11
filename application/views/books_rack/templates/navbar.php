<body dir="rtl">
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
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse-main" dir="rtl" style="padding: 0;">
        <ul class="nav navbar-nav navbar-right ml-auto nav-direct">
          <li><a class="nav-item" href="<?php echo base_url()?>home/index">الرئيسية</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo base_url()?>bookshelf?type=1" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              رف الكتب
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: #205d67; text-align: inherit;padding: 0 7%">
              <a class="dropdown-item" href="<?php echo base_url()?>bookshelf?type=1">المنهج</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>bookshelf?type=3">الأطفال</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>bookshelf?type=5">اليافعين</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>bookshelf?type=4">كتب رمضان</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>bookshelf?type=2">المرحلة التحضيرية</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="<?php echo base_url()?>booksearch?type=1" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              البحث عن كتب
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: #205d67; text-align: inherit;padding: 0 7%">
              <a class="dropdown-item" href="<?php echo base_url()?>booksearch?type=1">المنهج</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>booksearch?type=3">الأطفال</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>booksearch?type=5">اليافعين</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>booksearch?type=4">كتب رمضان</a></br>
              <a class="dropdown-item" href="<?php echo base_url()?>booksearch?type=2">المرحلة التحضيرية</a>
            </div>
          </li>
          <!-- <li><a class="nav-item" href="<?php echo base_url()?>bookshelf">رف الكتب </a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>booksearch">البحث عن الكتب </a></li> -->
          <li><a class="nav-item" href="<?php echo base_url()?>infographic">انفوجرافيك</a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>Article">مقالات تثقيفية</a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>home/accomp">آخر الانجازات</a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>home/join_us">انضم إلينا</a></li>
          <li><a class="nav-item" href="<?php echo base_url()?>home/donate"> ادعمنا</a></li>
        </ul> 
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
    <!-- Home -->
  <div id="home">
    <div class="landing-text">
      <h1>
        أصبوحة  180
      </h1>
      <h3>
        لأن القراءة ضرورة وليست هواية 
      </h3>
    </div>
    <div class="arrow">
        <span></span>
        <span></span>
        <span></span>
    </div>
  </div>
  <!-- End Home -->
