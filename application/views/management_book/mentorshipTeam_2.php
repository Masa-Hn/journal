<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/teamsCarousel.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-7">
        <div class="card b-0">
            <div class="slideshow-container">
              <div class="carousel-container w3-display-container " id="seriesPhotos">
                  <div class="mySlides carousel-slide">
                    <h4 class="heading" style="text-align:right;"> Team A01 - Leader 1</h4>
                    <p> Total members: 20  -  New members: 4</p>
                    <ul style="text-align: center;list-style: none;">
                      <li>member 01 - Female</li>
                      <li>member 02 - Female</li>
                      <li>member 03 - Female</li>
                      <li>member 04 - Female</li>
                    </ul>
  
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="deleteAlert(this.id)" >Done</button>
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="background-color: #205d67;" onclick="deleteAlert(this.id)" >Copy</button>
                  </div>
                  <div class="mySlides carousel-slide">
                   <h4 class="heading" style="text-align:right;"> Team A02 - Leader 2</h4>
                    <p> Total members: 20  -  New members: 2</p>
                    <ul style="text-align: center;list-style: none;">
                      <li>member 01 - Female</li>
                      <li>member 02 - Female</li>
                    </ul>
  
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="deleteAlert(this.id)" >Done</button>
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="background-color: #205d67;" onclick="deleteAlert(this.id)" >Copy</button>
                  </div>
                  <div class="mySlides carousel-slide">
                   <h4 class="heading" style="text-align:right;"> Team A03 - Leader 3</h4>
                    <p> Total members: 20  -  New members: 1</p>
                    <ul style="text-align: center;list-style: none;">
                      <li>member 01 - Male</li>
                    </ul>
  
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="deleteAlert(this.id)" >Done</button>
                    <button id="'.$team->team .'"  name="delete" class="mybutton" style="background-color: #205d67;" onclick="deleteAlert(this.id)" >Copy</button>
                  </div>
              </div>  


            </div>
            <div>
              <a class="prev w3-display-left" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next w3-display-right" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
      </div>
    </div>
  </div>  

<script type="text/javascript" src="<?php echo base_url()?>assets/js/teamCarousel.js"></script>

