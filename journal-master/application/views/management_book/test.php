<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link href="<?php echo base_url()?>assets/css/management_book.css" rel="stylesheet" />

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/teamsCarousel.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-7">
        <div class="card b-0">
            <div class="slideshow-container">
              <div class="carousel-container w3-display-container " id="seriesPhotos">
                 <?php
$ci =& get_instance();
$ci->load->model('GeneralModel');
				  foreach($request as $req)
				  {
					  $id = $req->id;
					  
			  
					  ?>
				  
				    <div class="mySlides carousel-slide">
                    <h4 class="heading" style="text-align:right;direction: rtl;"> <?php echo "الفريق: " . $req->team_name . " - " . "القائد: " . $req->leader_name; ?></h4>
                    <p> Total members: 20  -  New members: 4</p>
                    <ul style="text-align: center;list-style: none;" id="<?php echo $id;?>">
                      <?php
						foreach($ambassador as $amb){
							?>
						<li><?php echo $amb->name;?> </li>
						<?php
						}
					  $leaderName = $req->leader_name;
						?>
                    </ul>
  
                    <button id="<?php echo $id; ?>"  name="done" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="deleteAlert(this.id)" >Done</button>
                    <button id="<?php echo $id; ?>"  name="copy" class="mybutton" style="background-color: #205d67;" onclick="copyMsg('<?php echo $id;?>', '<?php echo $leaderName;?>')" >Copy</button>
                  </div>
				  <?php
				  
				  }
				  ?>
				  
				
              </div>  


            </div>
            <div>
              <a class="prev w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
              <a class="next w3-display-right" onclick="plusDivs(1)">&#10095;</a>
            </div>
        </div>
      </div>
    </div>
  </div>  

<script type="text/javascript" src="<?php echo base_url()?>assets/js/teamCarousel.js"></script>

<script>
  function copyMsg(id, leaderName){
	  var lst = document.getElementById(id).querySelectorAll("li");
	  
    var i ,x = "";
			x += "مرحباً قائد "+ leaderName + "\n\n";
	  		x += "لطفا قم باستقبال الأعضاء التالية اسماؤهم :\n\n";
			for(i=0; i<lst.length; i++){
				x += lst[i].textContent + "\n";
			}
	  x += "\n\nشكراً جداً لحضرتك \n فريق الإدخال";
    var copyText = document.createElement('textarea');
    copyText.value=x;
    document.body.appendChild(copyText);
    copyText.select();
    document.execCommand('copy');
    // Remove temporary textarea
    document.body.removeChild(copyText);
    Swal.fire({
      icon: 'success',
      title: 'تم نسخ الأسماء',
      text:'يمكنك إرسال الرسالة للقائد',
      showConfirmButton: false,
      timer: 3000
    })
    console.log(link);
  }
</script>