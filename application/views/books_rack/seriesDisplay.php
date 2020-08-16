<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/infographicCarousel.css">
<input type="hidden" name="id" id="base_url" value="<?php echo base_url(); ?>">

<div class="container padding" id="section-one">
      <h2 style="text-align: center;"> سلاسل الانفوجرافك</h2>
      <div class="heading-underline"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="" >
              <div class="container ">
                <div class="row text-center articleView " id="articleView">
                  <?php
                    if (!empty($series)) {
                      echo '<input type="hidden" id="exist" value="1">';
                      foreach ($series as $series) {
                        echo '
                        <div class="col-md-3 col-sm-12  articleDiv fade-in" id="'.$series->id .'">  
                
                            <a href="javascript:showPhotos('.$series->id .')" id="'.$series->id.'" >
                              <div class="card">
                                <img  class="card-img-top" src="'. base_url() .'assets/img/infographic/'.$series->pic .'">
                                <div class="card-body">
                                  <h1 class="artical-title-small">'.$series->title .' </h1>
                                  <p class="card-text artical-description">عدد الصور '. $series->num_of_photos.'</p>
                                </div>
                              </div> 
                            </a>
              
                        </div>
                        '; 
                      }//foreach
                    }//if
                    else{
                      echo '
                        <input type="hidden" id="exist" value="0">
                        <div class="col-md-3 col-sm-12 fade-in">
                          <h3>لا يوجد نتائج لعرضها </h3>
                        </div>
                      ';
                    }
                    
                    
                  ?>
             
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div> 
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/gallary.js"></script>

