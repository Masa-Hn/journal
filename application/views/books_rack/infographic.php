<link href="<?php echo base_url()?>assets/css/gallary.css" rel="stylesheet">


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
<!-- infografic -->
<div class="padding" id="section-one">
  <div class="container">
    <h2 style="text-align: center;"> إنجازات فريق أُطروحتك انفوغرافيك</h2>
    <div class="heading-underline"></div>
    <div class="row" id="gallaryRow"> 
      <div class="masonryholder" id="masonryholder">
        <?php
          if($exist){
            foreach ($infographic as $row) {
              echo
                '<div class="masonryblocks"><img src="'. base_url().'assets/img/infographic/'.$row->pic .'" class="my-masonry-grid-item gallaryImg fade-in" id="'.$row->id.'" onClick="show(this.id)"></div>';
            }//foreach
          }//if
          else{
            echo "<h2 style='text-align: center;'>لا يوجد نتائج </h2>";
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
   


<script type="text/javascript" src="<?php echo base_url()?>assets/js/gallary.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>
<script>
     jQuery(document).ready(function($) {
        
        var delay=0;
        var url="<?php echo base_url();?>Infographic/getmore";

        $("body").scroll(function(){
          delay++;

          if(delay == 20){
            var last_id=$('#masonryholder').children().last().children().last().attr('id');

              $.post(url,
              {
                id: last_id              
              },
              function(data, status){
                $('#masonryholder').append(data);

                console.log("Data: " + data + "\nStatus: " + status);
              });

            console.log(url)
            console.log("delay is " + delay)

            console.log('-------------------')

            delay=0;
            console.log("delay is " + delay)
          }
});

    });

</script>
