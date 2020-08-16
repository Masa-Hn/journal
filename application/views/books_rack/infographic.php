<link href="<?php echo base_url()?>assets/css/gallary.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<style>
 
  .masonryholder{
    column-count: 4;
    column-gap: 20px;
    max-width: 1600px;
    margin: 0 auto;
    }

  .masonryblocks{
    display: inline-block;
    width: 100%;
    box-sizing: border-box;
    }

  .masonryblocks img{
    width: 100%;
    }

  @media screen and (max-width:768px){
    .masonryholder{
      column-count: 1;
    }
    }

  @media screen and (min-width:769px){
    .masonryholder{
      column-count: 2;
    }
    }

  @media screen and (min-width:1080px){
    .masonryholder{
      column-count: 3;
    }
    }

  @media screen and (min-width:1200px){
    .masonryholder{
      column-count: 4;
    }
    }
</style>
<input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
<!-- infografic -->
<div class="padding" id="section-one">
  <div class="container">
    <h2 style="text-align: center;"> إنجازات فريق أُطروحتك انفوجرافيك </h2>
    <div class="heading-underline"></div>
    <div class="container" dir="ltr">
      <div class="row direct fade-in">
        <div class="container-fluid text-center col-md-3 col-lg-3 col-sm-12 vl ">
          <h3>تخصيص العرض</h3>
          <div class="heading-underline"></div>
            <div class="row" style="text-align: -webkit-center">
              <button id="filtersToggel" class="cusBtn btn" data-toggle="collapse" data-target="#filters">تخصيص العرض</button>
            </div>  
          <div  id="filters" class=" collapse custom-control custom-checkbox ">
              <h3 style="margin-bottom: 10%; text-align: right;"> سلاسل الانفوجرافيك </h3>
            <?php
               foreach ($num_of_series as $num_of_series ) {
                echo'
                <div class="row filterRow">
                  <div class="col-sm-3">
                    <span class="no-of-books">'.$num_of_series->num_of_series .'</span>
                  </div>
                  <div class="col-sm-6">
                    <span>عرض السلاسل </span>
                  </div>
                  <div class="col-sm-3">
                    <input type="checkbox" class="section_checkbox" id="series_2" value="series">
                  </div>
                </div>';
              }//foreach

              echo '</br><h3 style="margin-bottom: 10%; text-align: right; clear:both"> فئة الانفوجرافيك</h3>';
              foreach ($sections as $section ) {
                echo'
                  <div class="row filterRow">
                    <div class="col-sm-3">
                      <span class="no-of-books">'.$section->num_of_infographics .'</span>
                    </div>
                    <div class="col-sm-6">
                      <span> '.$section->section .' </span>
                    </div>
                    <div class="col-sm-3">
                      <input type="checkbox" class="section_checkbox" name="section" value="'.$section->section .'">
                    </div>
                  </div>';
              }//foreach
            ?>  
          </div>

          <div  id="firstFilters" class=" ais-refinement-list--item custom-control custom-checkbox ">
            <h3 style="margin-bottom: 10%; text-align: right;"> سلاسل الانفوجرافيك </h3>
            <?php

                echo'
                <div class="row filterRow">
                  <div class="col-sm-3">
                    <span class="no-of-books">'.$num_of_series->num_of_series.'</span>
                  </div>
                  <div class="col-sm-6">
                    <span>عرض السلاسل </span>
                  </div>
                  <div class="col-sm-3">
                    <input type="checkbox" class="section_checkbox" id="series" value="series">
                  </div>
                </div>';
       
              echo '<h3 style="margin-bottom: 10%; text-align: right;"> فئة الانفوجرافيك</h3>';
               foreach ($sections as $section ) {
                echo'
                <div class="row filterRow">
                  <div class="col-sm-3">
                    <span class="no-of-books">'.$section->num_of_infographics .'</span>
                  </div>
                  <div class="col-sm-6">
                    <span> '.$section->section .' </span>
                  </div>
                  <div class="col-sm-3">
                    <input type="checkbox" class="section_checkbox" name="section" value="'.$section->section .'">
                  </div>
                </div>';
              }//foreach
            ?>
          </div>
        </div>

        <div class="padding "></div>
        <div class="container direct">
          <div class="row" id="gallaryRow"> 
            <?php
              if($exist){
                echo "<input type='hidden' id='exist' value='1'>";
                echo '<div class="masonryholder" id="masonryholder">';
                foreach ($infographic as $row) {
                  echo
                    '<div class="masonryblocks"><img src="'. base_url().'assets/img/infographic/'.$row->pic .'" class="my-masonry-grid-item gallaryImg fade-in" id="'.$row->id.'" onClick="show(this.id)"></div>';
                }//foreach
                echo "</div>";
              }//if
              else{
                echo "
                  <input type='hidden' id='exist' value='0'>
                  <div class='col-md-3 col-sm-12 fade-in' style='margin:0 auto'>
                  <h2 style='text-align: center;'>لا يوجد نتائج </h2> </div>";
              }//else       
            ?>    
          </div>
          <div id="myModal" class="modal">
            <input type="hidden" name="id" id="shareID">
            <input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
            <span class="close">&times;</span>
            <img class="modal-content" id="img">
            <h2 style="color:#ebe6d5;">مشاركة </h2>
            <hr style="width: 20%">
            <i onclick="infographic_fbShare()" class=" btn fa fa-facebook" id="share"></i>
            <i onclick="infographic_twitterShare()" class=" btn fa fa-twitter" id="share"></i>
            <i onclick="infographic_pin_it()" class=" btn fa fa-pinterest-square" id="share"></i>
            <i onclick="infographic_linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
            <i title="copy link" onclick="infographic_copyLink()" class=" btn fa fa-copy" id="share"></i>
          </div>
        </div>
      </div>
  </div>
</div>
</div>


<script src="<?php echo base_url()?>assets/js/search.js"></script>
<script src="<?php echo base_url()?>assets/js/infographicFilter.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/gallary.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>
<script>
     jQuery(document).ready(function($) {
        var section = [];
        var delay=0;
        var url="<?php echo base_url();?>Infographic/getmore";

        $("body").scroll(function(){
          delay++;
          var exist = document.getElementById("exist").value;
          $.each($("input[name='section']:checked"), function(){
            var s="'"+$(this).val()+"'";
            section.push(s);
          });
          if(delay == 20 && exist == 1 && (section.length == 0) ){
            var last_id=$('#masonryholder').children().last().children().last().attr('id');

              $.post(url,
              {
                id: last_id              
              },
              function(data, status){
                $('#masonryholder').append(data);
              });


            delay=0;
          }
});

    });

</script>
