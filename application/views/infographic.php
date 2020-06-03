<link href="<?php echo base_url()?>assets/css/gallary.css" rel="stylesheet">

 <!-- infografic -->
  <div class="padding" id="section-one">
    <div class="container">
      <h2 style="text-align: center;"> إنجازات فريق أُطروحتك انفوغرافيك</h2>
      <div class="heading-underline"></div>

      <div class="row" id="gallaryRow"> 
        <div class="column" id="gallaryCol">
          <img src="img/infographic/1.png" class="gallaryImg fade-in " id="1" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/2.png" class="gallaryImg fade-in" id="2" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/3.png" class="gallaryImg fade-in" id="3" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/4.png" class="gallaryImg fade-in" id="4" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/5.png" class="gallaryImg fade-in" id="5" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/6.png" class="gallaryImg fade-in" id="6" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/1.png" class="gallaryImg fade-in" id="7" onClick="show(this.id)" style="width:100%">
        </div>
        <div class="column" id="gallaryCol">
          <img src="img/infographic/1.png" class="gallaryImg fade-in" id="8" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/3.png" class="gallaryImg fade-in" id="9" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/2.png" class="gallaryImg fade-in" id="10" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/6.png" class="gallaryImg fade-in" id="11" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/5.png" class="gallaryImg fade-in" id="12" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/4.png" class="gallaryImg fade-in" id="13" onClick="show(this.id)" style="width:100%">
        </div>  
        <div class="column" id="gallaryCol">
          <img src="img/infographic/5.png" class="gallaryImg fade-in" id="14" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/1.png" class="gallaryImg fade-in" id="15" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/6.png" class="gallaryImg fade-in" id="16" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/2.png" class="gallaryImg fade-in" id="17" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/4.png" class="gallaryImg fade-in" id="18" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/5.png" class="gallaryImg fade-in" id="19" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/3.png" class="gallaryImg fade-in" id="20" onClick="show(this.id)" style="width:100%">
        </div>
        <div class="column" id="gallaryCol">
          <img src="img/infographic/3.png" class="gallaryImg fade-in" id="21" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/4.png" class="gallaryImg fade-in" id="22" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/2.png" class="gallaryImg fade-in" id="23" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/5.png" class="gallaryImg fade-in" id="24" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/1.png" class="gallaryImg fade-in" id="25" onClick="show(this.id)" style="width:100%">
          <img src="img/infographic/6.png" class="gallaryImg fade-in" id="26" onClick="show(this.id)" style="width:100%">
        </div>
        <div id="myModal" class="modal">
          <input type="hidden" name="id" id="shareID">
          <span class="close">&times;</span>
          <img class="modal-content" id="img">
          <h2 style="color:#ebe6d5;">مشاركة </h2>
          <hr style="width: 20%">
          <i onclick="fbShare()" class=" btn fa fa-facebook" id="share" style="background: unset;"></i>
          <i onclick="twitterShare()" class=" btn fa fa-twitter" id="share" style="background: unset;"></i>
          <i onclick="pin_it()" class=" btn fa fa-pinterest-square" id="share" style="background: unset;"></i>
          <i onclick="linkedinShare()" class=" btn fa fa-linkedin" id="share" style="background: unset;"></i>
          <i title="copy link" onclick="copyLink()" class=" btn fa fa-copy" id="share" style="background: unset;"></i>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/gallary.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/share.js"></script>

