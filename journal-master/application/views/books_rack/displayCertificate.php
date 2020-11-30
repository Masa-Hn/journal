<div class="padding" id="section-one">
    <div class="container">
      <div class="row">
          <div class="container-fluid text-center">
            <h2><?php echo $activity[0]->name . ' - ' . $activity[0]->copy ?></h2>
            <div class="heading-underline"></div>
          </div>
        <div class="row">
          <div class="container-fluid text-center">
          	<?php
          		if($exist){
            		foreach ($certificates as $certificate) {
              		echo
                	'<img src="'. base_url().'assets/img/certificate/'.$certificate->pic .'" class=" fade-in" style="border: 4px solid #205D67;width: 50%;" id="'.$certificate->id.'" onClick="show(this.id)"></div>';
            }//foreach
          }//if
          else{
            echo "<h2 style='text-align: center;'>لا يوجد نتائج </h2>";
          }//else       
        ?>
          </div>
        </div>
      </div>
    </div>
</div>