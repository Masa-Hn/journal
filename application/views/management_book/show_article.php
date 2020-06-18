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
 <?php for ($i=1; $i <=3 ; $i++) { ?>
    
  <div class="mySlides" style="padding-right: 25%">
    
<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);
</script>
    <div class="numbertext" style="color: black"> <?php echo $i ?> / 3</div>
    <h5 class="heading">اسم المقال :</h5>
      <p>.............</p>
     <h5 class="heading">كاتب المقال</h5>
      <p>.............</p>

      <h5 class="heading">تم كتابة المقال بتاريخ :</h5>
      <p>.............</p>


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