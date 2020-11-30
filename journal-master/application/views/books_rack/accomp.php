<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css">

  <div class="padding" id="section-one">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 fade-in">
          <img src="<?php echo base_url()?>assets/img/special.png" style="width: 90%">
        </div>
        <div class="col-sm-6 text-center vertical-center fade-in">
          <h2>
            في أصبوحة لمعت لدينا أسماء
            بذلت  من الجهد الكثير 
            لتصل إلى مرادها 
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div id="fixed">
  </div> 
  <div class="padding" >
    <div class="container">
      <div class="row fade-in">
        <div class="container-fluid text-center">
          <h2> <?php echo $activity[0]->name . ' - ' . $activity[0]->copy ?></h2>
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row">
          <?php
            if(! empty($certificates)){
              echo '<div class="carousel-container w3-display-container ">';
              foreach ($certificates as $certificate) {
                echo '
                  <img class="mySlides carousel-slide" src="'.base_url().'assets/img/certificate/'.$certificate->pic.'" id="'.$certificate->id.'" onClick="show(this.id)">
                ';
              }//foreach
              echo '
                <button class="btn carousel-btn w3-display-left" onclick="plusDivs(-1)">&#10095;</button>
                <button class="btn carousel-btn w3-display-right" onclick="plusDivs(1)">&#10094;</button>
              </div>
              <!-- View Images -->
              <div id="myModal" class="modal">
                <input type="hidden" name="id" id="shareID">
                <input type="hidden" name="id" id="base_url" value="'.base_url().'">
                <input type="hidden" name="id" id="base_url" value="'.$activity[0]->id.'">
                <span class="close">&times;</span>       
                <img class="modal-content" id="img01">       
                <h2 style="color:#ebe6d5;">مشاركة </h2>
                <hr style="width: 20%">
                <i onclick="accomp_fbShare()" class=" btn fa fa-facebook" id="share"></i>
                <i onclick="accomp_twitterShare()" class=" btn fa fa-twitter" id="share"></i>
                <i onclick="accomp_pin_it()" class=" btn fa fa-pinterest-square" id="share"></i>
                <i onclick="accomp_linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
                <i title="copy link" onclick="accomp_copyLink()" class=" btn fa fa-copy" id="share"></i>
              </div>
              <!-- End View Images -->
              ';
            }//if
            else{
              echo 
              '<div class="col-md-3 col-sm-12 fade-in">
                <h3> للا يوجد شهادات لعرضها  </h3>
              </div>';
            }//else
            ?>
        
      </div>
      <!-- Search -->
      <?php
        if(!empty($allActivity)){
          echo '
            <div class="padding">
              <div class="container-fluid text-center fade-in">
                <form action="#">
                  <select id="activity" name="activity" class="btn select-btn dropdown-toggle" data-toggle="dropdown" style="color: #fcfaef;">
                    <option value="0" selected=""> اختر النشـاط</option>
                    ';
                    foreach ($allActivity as $activity) {
                      echo'<option value="'.$activity->name.'">'.$activity->name .'</option>';
                    }//foreach
                  echo
                  '</select>
                  <select id="copy" name="copy" class="btn select-btn dropdown-toggle" data-toggle="dropdown" style="color: #fcfaef;">
                    <option value="0" selected="">عليك اختيار النشاط أولًا </option>
                  </select>
                  </form>
              </div>  
            </div>
          ';
        }//if
      ?>
      <!-- End Search -->
    </div>
  </div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    var getCopies="<?php echo base_url();?>Activities/getCopies";
    var display="<?php echo base_url();?>Activities?id=";
    $('#activity').change(function(){
      $.ajax({
        type: 'POST',
        url: getCopies,
        data: {activity: $('#activity').val()},
        success: function(data){
          $('#copy').html(data);
        }
      });
    });
    $('#copy').change(function(){
      var url = display + $('#copy').val();
      location.replace(url)

    });
});
</script>