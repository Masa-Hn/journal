
$(document).ready(function () {
    // Detect browser for css purpose
    if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        $('.form form label').addClass('fontSwitch');
    }

    // Label effect
    $('input').focus(function () {

        $(this).siblings('label').addClass('active');
    });

    // form switch
    $('a.switch').click(function (e) {
        $(this).toggleClass('active');
        e.preventDefault();

        if ($('a.switch').hasClass('active')) {
            $(this).parents('.form-peice').addClass('switched').siblings('.form-peice').removeClass('switched');
        } else {
            $(this).parents('.form-peice').removeClass('switched').siblings('.form-peice').addClass('switched');
        }
    });
});

function checkLoginEmail(){
  email=document.getElementById("loginemail").value;
  var msg="";
  var valid=true;
  if (loginEmailValidation(email)) {
        msg= "لطفًا أدخل بريدك الالكتروني بشكل صحيح";
        valid=false;
  } 
  if(! valid){
    document.getElementById('errorMsgLogin').innerHTML=msg; 

  }
  else{
    $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUp/checkAmbassador",
      data: {'email': email },
      success: function(data){
        $("body").html(data);

      }//success
    });
  }

}
function checkData(){

   var username=document.getElementById("username").value,
        email=document.getElementById("email").value,
        ambassadorGender=document.getElementsByName('amb_gender');
        leaderGender=document.getElementsByName('leader_gender');
        var valid=true;
        var req ='لطفًا أدخل المعلومات التالية ';
  if (!(ambassadorGender[0].checked || ambassadorGender[1].checked)) {
    req= req+"," + "جنسك";
    valid=false;
  }
  if (!(leaderGender[0].checked || leaderGender[1].checked || leaderGender[2].checked)) {
        req= req+ "," + "جنس قائدك ";
        valid=false;
  }
  if(checkUserName(username)){
        req= req+ "," + "اسمك الكامل";
        valid=false;

  }
  if (checkEmail(email)) {
        req= req+ "," +"بريدك الالكتروني";
        valid=false;
  }
  
  if(! valid){
    document.getElementById('errorMsgP').innerHTML=req; 
  }
  else{
    ambassadorGender=$('input[name="amb_gender"]:checked').val();
    leaderGender=$('input[name="leader_gender"]:checked').val();
    $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUp/checkAmbassador",
      data: {'ambassador_name':username,'ambassador_gender':ambassadorGender,'leader_gender': leaderGender,'email': email },
      success: function(data){
        $("body").html(data);

      }//success
    });
  }
}

function checkUserName(val){
  if (val.length == 0 || val.length < 3 ) {
    $("#usernameError").show();
    return true;
  }
  else {
    $("#usernameError").hide();
    return false;
  }
}
function checkEmail(val){
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (val.length == 0) {
    $("#emailError").show();
    return true;
  } 
  else if(! (val.match(mailformat))){
    $("#emailFormatError").show();
    return true;
  }
  else {
    $("#emailError").hide();
    $("#emailFormatError").hide();
    return false;
  }
}

function loginEmailValidation(val){
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (val.length == 0) {
    $("#loginemailError").show();
    return true;
  } 
  else if(! (val.match(mailformat))){
    $("#loginemailFormatError").show();
    return true;
  }
  else {
    $("#loginemailError").hide();
    $("#loginemailFormatError").hide();
    return false;
  }
}