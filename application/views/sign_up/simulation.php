<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">

   <div style="margin: 50%">
    <div id="result"></div>
     <button id="val" >SOTP</button>
   </div> 


<script type="text/javascript">
  $(document).ready(function(){
   
    const gender=['female','male','any'];
   x=5000;
    //setInterval(reg(30000), 3000);
var myVar;

myVar=setInterval(function () {
      ambassadorGender=gender[Math.floor(Math.random() * gender.length)];
      leaderGender=gender[Math.floor(Math.random() * gender.length)];
      var username = "name"+x;
      var email = "email"+x+"@g.com";

      $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUp/checkAmbassador",
      data: {'ambassador_name':username,'ambassador_gender':ambassadorGender,'leader_gender': leaderGender,'email': email },
      success: function(data){
        document.getElementById("result").innerHTML =data;
        console.log(ambassadorGender + "  ..  " + leaderGender + " >>>RQ  " +x);
        //console.log(data);
      }//success
    });
      if (x<0) {
         clearInterval(myVar); 
      }
      else{
        return x--;  
      }
      
    }, 5000);

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



