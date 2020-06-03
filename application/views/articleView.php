<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<style type="text/css">
  #share{
    color: #205d67
  }
</style>

 <div class="container padding" id="section-one">
    <h2 style="text-align: center;">عنوان المقال</h2>
    <div class="heading-underline"></div>
    <div class=" row direct fade-in" style="text-align: center;">
      <div class="col-sm-6">
       <h3>كاتب المقال </h3>
      </div>
      <div class="col-sm-6">
       <h3> تاريخ النشر </h3>
      </div>
    </div>
    <div class="padding"></div>
    <div class="row direct">
      <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct" >
            <div class="col-5 col-md-4 slide-in from-right">  
              <img  src="img/maqal.jpg" class="bookImg" >
            </div>    

            <div class="container-fluid text-center col-7 col-md-8 slide-in from-left">
              <div class="row">
                <p style="padding: 0 3% 0 3%"> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nam aliquam sem et tortor consequat id porta. Eu facilisis sed odio morbi quis commodo odio aenean sed. Facilisis leo vel fringilla est ullamcorper. Maecenas ultricies mi eget mauris pharetra et. Imperdiet sed euismod nisi porta. Arcu dictum varius duis at consectetur lorem donec massa sapien. Sed faucibus turpis in eu. Massa id neque aliquam vestibulum morbi blandit cursus. Diam donec adipiscing tristique risus nec feugiat in fermentum posuere. Eget arcu dictum varius duis at consectetur lorem donec massa. Volutpat odio facilisis mauris sit amet massa vitae.

                  Cursus metus aliquam eleifend mi. Tempor orci dapibus ultrices in. Laoreet sit amet cursus sit amet dictum sit. Vitae suscipit tellus mauris a diam maecenas sed. Purus ut faucibus pulvinar elementum integer. Varius sit amet mattis vulputate enim nulla. Ipsum dolor sit amet consectetur adipiscing elit. Mi quis hendrerit dolor magna eget. Egestas quis ipsum suscipitpendisse ultrices gravida dictum. Scelerisque eu ultrices vitae auctor eu augue ut.
                </p>
              </div>
            </div>
      </div>
    </div>
      <div class="row text-center">
      <h2 >مشاركة المقال </h2>
          <hr style="width: 20%">
          <i onclick="fbShare()" class=" btn fa fa-facebook" id="share"></i>
          <i onclick="twitterShare()" class=" btn fa fa-twitter" id="share"></i>
          <i onclick="linkedinShare()" class=" btn fa fa-linkedin" id="share"></i>
          <i title="copy link" onclick="copyLink()" class=" btn fa fa-copy" id="share"></i>
    </div>
  </div>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/shareArcticle.js"></script>
