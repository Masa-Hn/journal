<!DOCTYPE html>
<html lang="ar">
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  


</head>

<body >
  <!-- Navbar -->
  <div style="  padding-bottom: 5em;">
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <div class="container-fluid" >
      <div class="navbar-header">
        

        <a  class="navbar-brand" href="#" style="padding-left: 3em" >
          <img  src="<?php echo base_url()?>assets/img/logo_2.png">
        </a>
        <div class="navbar-brand" style="color: white">
        <p >|قسم الإدارة</p>
        </div>

      </div>
      <div  id="navbar-collapse-main" dir="rtl" style="padding: 0;">
        <ul class="nav navbar-nav navbar-right ml-auto nav-direct">
         
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/index">إدارة الكتب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_book">إضافة كتاب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/show_book">استعراض الكتب</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_article">إضافة مقال</a></li>
           <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/show_article">استعراض المقالات</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_activity">إضافة نشاط</a></li>
          <li style=" padding-right:15px;padding-left:15px;"><a class="nav-item" href="<?php echo base_url()?>management_book/add_infographic">إضافة انفوجرافيك</a></li>
         
        </ul> 
      </div>
    </div>
  </nav>
</div>