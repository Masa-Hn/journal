<div class="container padding" id="section-one">
      <h2 style="text-align: center;"> مقالات تثقيفية</h2>
      <div class="heading-underline"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="" >
              <div class="container ">
                <div class="row text-center articleView ">
                  <?php
                    foreach ($articles as $article) {
                      echo '
                      <div class="col-md-3 col-sm-12  articleDiv fade-in" >
                        <a href="'. base_url().'Article/articleView?id='.$article->id.'" >
                          <div class="card">
                            <img  class="card-img-top" src="'. base_url() .'assets/img/'.$article->pic .'">
                            <div class="card-body">
                              <h1 class="artical-title-small">'.$article->title .' </h1>
                              <p class="card-text artical-description">'. substr($article->article,0,80).'</p>
                            </div>
                          </div> 
                        </a>
                      </div>
                      '; 
                    }//foreach
                    
                  ?>
             
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div> 
    </div>
  