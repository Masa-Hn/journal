<div class="container padding" id="section-one">
      <h2 style="text-align: center;"> مقالات تثقيفية</h2>
      <div class="heading-underline"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="" >
              <div class="container ">
                <div class="row text-center articleView " id="articleView">
                  <?php
                    if (!empty($articles)) {
                      echo '<input type="hidden" id="exist" value="1">';
                      foreach ($articles as $article) {
                        echo '
                        <div class="col-md-3 col-sm-12  articleDiv fade-in" id="'.$article->id .'">  
                
                            <a href="'. base_url().'Article/articleView?id='.$article->id.'" >
                              <div class="card">
                                <img  class="card-img-top" src="'. base_url() .'assets/img/article/'.$article->pic .'">
                                <div class="card-body">
                                  <h1 class="artical-title-small">'.$article->title .' </h1>
                                  <p class="card-text artical-description">'. substr($article->article,0,80).'</p>
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
                          <h3> لا يوجد مقالات لعرضها  </h3>
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

<script>
     jQuery(document).ready(function($) {
        
            
        var delay=0;
        var url="<?php echo base_url();?>Article/getmore";
        $("body").scroll(function(){
          delay++;
          var exist = document.getElementById("exist").value;
          if(delay == 20 && exist == 1 ){
            var last_id= $('#articleView').children().last().attr('id');
            $.ajax({
              type: "POST",
              url:url,
              data: {'id':last_id},
              success: function(data){
                $('#articleView').append(data);

              }
            });
            delay=0;
          }//if
          console.log(delay);
      });

    });

</script>
  