<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">

   <div style="margin: 50%">
    <div id="result"></div>
     <button id="val" >SOTP</button>
   </div> 


<script type="text/javascript">
  $(document).ready(function(){
   x=1000;
    //setInterval(reg(30000), 3000);
var myVar;

myVar=setInterval(function () {
     if((x%2) == 0){
        ambassadorGender="female"
      }
      else if((x%3) == 0){
        ambassadorGender="male"
      }
      else{
        ambassadorGender="any"
      }

      if((x%2) == 0){
        leaderGender="male"
      }
      else if((x%3) == 0){
        leaderGender="any"
      }
      else{
        leaderGender="female"
      }
      var username = "name"+x;
      var email = "email"+x+"@g.com";

      $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUp/checkAmbassador",
      data: {'ambassador_name':username,'ambassador_gender':ambassadorGender,'leader_gender': leaderGender,'email': email },
      success: function(data){
        document.getElementById("result").innerHTML =data;
        console.log(x);
      }//success
    });
      return x--;
    }, 3000);

$('#val').click(function(){
  clearInterval(myVar);
});

  });

function stopCount() {

}
  function reg(x){
      if((x%2) == 0){
        ambassadorGender="female"
      }
      else{
        ambassadorGender="male"
      }
      var username = "name"+x;
      var email = "email"+x+"@g.com";
      var leaderGender = "any"; 

      $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUp/checkAmbassador",
      data: {'ambassador_name':username,'ambassador_gender':ambassadorGender,'leader_gender': leaderGender,'email': email },
      success: function(data){
        console.log('success');
      }//success
    });
  }

</script>

</html>

