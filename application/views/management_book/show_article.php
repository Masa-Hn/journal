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
  $row=$articles->row($i);   ?>
    
  <div class="mySlides" style="padding-right: 25%">
    
<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);
</script>
    <div class="numbertext" style="color: black"> <?php echo $i+1 ?> / <?php echo $n ?></div>
    <h5 class="heading">: اسم المقال </h5>
      <p><?php echo $row->title ?></p>
     <h5 class="heading">: كاتب المقال</h5>
      <p><?php echo $row->writer ?></p>

      <h5 class="heading"> : تم كتابة المقال بتاريخ</h5>
      <p><?php echo $row->date ?></p>
 <form  enctype="multipart/form-data" method="post" style="padding-bottom: 5em;padding-top: 5em" action="<?=base_url()?>Management_book/show_article">   
<input type="number" name="id" id="id" value="<?php echo $row->id ?>" style="display: none;"   >  
<button  id="delete"  name="delete" class="mybutton" style="width: 200px" >حذف المقال</button>
</form>

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