<style type="text/css">
  .active, .dot:hover {
  background-color: #717171;
}
</style><!-- Slideshow container -->

                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
<div>
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
 <?php 
$n=$num_rows;
 for ($i=0; $i <$n ; $i++) {
  $row=$articles[$i];   ?>
    
  <div class="mySlides" style="padding-right: 10%">
    
<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);
</script>
 <?php echo $this->session->flashdata('msg')?>  
    <div class="numbertext" style="color: black" > <?php echo $i+1 ?> / <?php echo $n ?></div>
    <h5 class="heading">: اسم المقال </h5>
      <p><?php echo $row->get_title() ?></p>
     <h5 class="heading">: كاتب المقال</h5>
      <p><?php echo $row->get_writer() ?></p>

      <h5 class="heading"> : تم كتابة المقال بتاريخ</h5>
      <p><?php echo $row->get_date() ?></p>

      <h5 class="heading"> : المقال</h5>
     

      <p style="text-align: justify;padding-left: 30px;"> <?php echo $row->get_article() ?></p>
      <h5 class="heading"> : رابط صورة المقال <br>

          <a id="image" name="image" href="<?php echo base_url()?>assets/img/article/<?php echo $row->get_pic()?> " style="padding-right: 2em; color: #A52A2A" > اضغط هنا</a><br><br> </h5>
 <div style="padding-bottom: 8em;padding-top: 1em;">
 <form  enctype="multipart/form-data" method="post" style="float: right;" action="<?=base_url()?>Management_book/show_article">   
<input type="number" name="id" id="id" value="<?php echo $row->get_id() ?>" style="display: none;"   >  
<button  id="delete"  name="delete" class="mybutton" style="width: 150px;background-color: #A52A2A;" >حذف المقال</button>
</form>
<form  enctype="multipart/form-data" method="post" style="float: left;" action="<?=base_url()?>AddArticle/index/<?php echo $row->get_id()?>">   
<input type="number" name="id" id="id" value="<?php echo $row->get_id() ?>" style="display: none;"   >  
<button  id="update"  name="update" class="mybutton" style="width: 175px;background-color: #A52A2A;" >تعديل المقال</button>
</form>
</div>
</div>
<?php } ?>
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<br>
<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>