
$(document).ready(function () {
  // Label effect
  $('input').focus(function () {

    $(this).siblings('label').addClass('active');
  });

});


function checkData() {

  email = document.getElementById("email").value,
    leaderGender = document.getElementsByName('leader_gender');
  var valid = true;
  var req = 'لطفًا أدخل المعلومات التالية ';
  if (!(leaderGender[0].checked || leaderGender[1].checked || leaderGender[2].checked)) {
    req = req + "," + "جنس قائدك ";
    valid = false;
  }
  if (checkEmail(email)) {
    req = req + "," + "بريدك الالكتروني";
    valid = false;
  }

  if (!valid) {
    document.getElementById('errorMsgP').innerHTML = req;
  }
  else {
    leaderGender = $('input[name="leader_gender"]:checked').val();
    var x = 10;
    var counter = setInterval(function () {
      $("#loading").show();
      document.getElementById('loadingMsg').innerHTML =
        "   " +
        ' يتم الأن تجهيز طلبك' +
        " " + x;
      x--;
      if (x < 0) {
        clearInterval(counter);
      }
    }, 1000);

    setTimeout(function () {
      clearInterval(counter);
      $.ajax({
        type: "POST",
        url: document.getElementById("base_url").value + "ReallocateAmbassador/checkAmbassador",
        data: { 'leader_gender': leaderGender, 'email': email },
        success: function (data) {
          document.body.innerHTML = '';
          $("body").html(data);
        }//success
      });

    }, 5000);
  }
}
function checkEmail(val) {
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (val.length == 0) {
    $("#emailError").show();
    return true;
  }
  else if (!(val.match(mailformat))) {
    $("#emailFormatError").show();
    return true;
  }
  else {
    $("#emailError").hide();
    $("#emailFormatError").hide();
    return false;
  }
}
