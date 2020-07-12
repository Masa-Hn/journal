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
  <?php
    foreach ($article as $article) {
      echo '
        <h2 style="text-align: center;">'.$article->title.'</h2>
        <div class="heading-underline"></div>
        <div class=" row direct fade-in" style="text-align: center;">
          <div class="col-sm-6">
            <h3> كاتب المقال: '.$article->writer.'</h3>
          </div>
          <div class="col-sm-6">
           <h3>'. date( 'Y-m-d', strtotime($article->date) ).'</h3>
          </div>
        </div>
        <div class="padding"></div>
        <div class="row direct" dir="ltr">
          <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct" >
              <div class="col-5 col-md-4 slide-in from-right">  
                <img  src="'.base_url().'assets/img/'.$article->pic.'" class="bookImg" >
              </div>    

              <div class="container-fluid text-center col-7 col-md-8 slide-in from-left">
                <div class="row">
                  <p style="padding: 0 3% 0 3%"> '.
                    $article->article
                  .'</p>
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
        ';
    }//foreach
  ?>
</div>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/shareArcticle.js"></script>
