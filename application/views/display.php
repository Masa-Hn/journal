<div class="padding" id="section-one">
    <div class="container">
      <div class="row">
          <div class="container-fluid text-center">
            <h2> اسم النشاط</h2>
            <div class="heading-underline"></div>
            <p class="lead">
              النسخة
            </p>
          </div>
        <div class="row">
          <div class="container-fluid text-center">
          	<?php
          		if($exist){
            		foreach ($infographic as $row) {
              		echo
                	'<img src="'. base_url().'assets/img/infographic/'.$row->pic .'" class=" fade-in" style="border: 4px solid #205D67;width: 50%;" id="'.$row->id.'" onClick="show(this.id)"></div>';
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