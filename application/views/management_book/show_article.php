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
      <script type="text/javascript">
$(function(){ /* to make sure the script runs after page load */

  $('.item').each(function(event){ /* select all divs with the item class */
  
    var max_length = 150; /* set the max content length before a read more link will be added */
    
    if($(this).html().length > max_length){ /* check for content length */
      
      var short_content   = $(this).html().substr(0,max_length); /* split the content in two parts */
      var long_content  = $(this).html().substr(max_length);
      
      $(this).html(short_content+
             '<a href="#" id="rm" class="read_more"><br/>قراءة المزيد</a>'+
             '<span class="more_text" style="display:none;">'+long_content+'</span>'); /* Alter the html to allow the read more functionality */
             
      $(this).find('a.read_more').click(function(event){ /* find the a.read_more element within the new html and bind the following code to it */
 
        event.preventDefault(); /* prevent the a from changing the url */
        $('.read_more').hide(); /* hide the read more button */


        $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
      });
    }
  });
});

</script>

      <p class="item"> <?php echo $row->get_article() ?></p>
 <form  enctype="multipart/form-data" method="post" style="padding-bottom: 5em;padding-top: 5em;padding-left: 47%" action="<?=base_url()?>Management_book/show_article">   
<input type="number" name="id" id="id" value="<?php echo $row->get_id() ?>" style="display: none;"   >  
<button  id="delete"  name="delete" class="mybutton" style="width: 150px;background-color: #A52A2A;" >حذف المقال</button>
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