<style>
.container_centered {
  position: relative;
  text-align: center;
}
.centered {
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
}

@media (min-width: 576px)
{
  .story-content{
    margin-top:5%; 
  }
}
@media (max-width: 1199px){}
.banner-left {
    margin-top: 100px;
}
   .story-content{
    margin-top:5%; 
  }

}
</style>
    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-12 col-sm-12">
            <div class="container_centered">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/laptop.png" alt="">
              <div class="centered">
                <h1 style="  font-weight: bold; color: darkred"><span class="sp-1" id="trial"></span> </h1>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-sm-12">
            <div class="story-content" dir="rtl" style="text-align: center;">
              <h1><span class="sp-1" style="font-size: 30px">
                  هذه تجربة وهمية لمدة <span class="sp-2">72</span> ساعة فقط  ليجربها سفراء أصبوحة  <span class="sp-2">180</span> 
                  <br> وليس المشتركين الجدد

              </span>
              </h1>
              <a href="<?php echo base_url()?>SignUp"  class="genric-btn primary circle arrow">متابعة </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->

<script>
// Set the date we're counting down to
var countDownDate = new Date("Nov 19, 2020 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("trial").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("trial").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
