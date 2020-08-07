  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                $i=1;
                foreach($activites as $activity) {
                  echo '              
                    <div class="mySlides" style="padding-right: 10%">
                      <script type="text/javascript">
                        var slideIndex = 1;
                        showSlides(slideIndex);
                      </script>'
                      .$this->session->flashdata('msg').  
                      '<div class="numbertext" style="color: black">'.$i .'/'.$n .' </div>
                        <h4 class="heading" style="text-align:right;"> '. $activity->name .'</h4>
                        <p> نسخة '. $activity->copy .'</p>
                        <div style="padding-bottom: 5em;padding-top: 5em;">   
                          <input type="number" name="id" id="id" value="'.$activity->id .'" style="display: none;"   >  
                          <button id="'.$activity->id .'"  name="delete" class="mybutton" style="width: 150px;background-color: #A52A2A; margin-right:23px;" onclick="deleteAlert(this.id)" >حذف  </button>
                          <button id="'.$activity->id .'" name="more" class="mybutton more" style="width: 150px;background-color: #A52A2A;"  onclick="more(this.id)">المزيد </button>
                          
                        </div>
                      </div>';
                      $i++;
                }//foreach
              ?>
  <!-- Next and previous buttons -->
  <div>
  <a class="prev w3-display-left" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next w3-display-right" onclick="plusSlides(1)">&#10095;</a>
  </div>
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
<script type="text/javascript">

 function deleteAlert(id){
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
  title: 'هل أنت متأكد؟',
  text: '! لن تتمكن من التراجع عن الحذف', 
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'حذف',
  cancelButtonText: 'تراجع',
  reverseButtons: true
    }).then((result) => {
    if (result.value) {
        var url="<?php echo base_url();?>Activities/deleteActivity";
        $.ajax({
            type: "POST",
            url:url,
            data: {'id':id},
            success: function(data){
                swalWithBootstrapButtons.fire(
                    'تم',
                    'تم الحذف بنجاح',
                    'success'
                )
                location.reload();
            }
        });
        
    }

})
 }//deleteAlert
function more(id){
 window.location.replace("<?php echo base_url();?>Management_book/show_activity?id="+id);

}

</script>