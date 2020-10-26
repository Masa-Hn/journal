var count=0;
//var base_url=document.getElementById("base_url").value+"SignUp/nextPage?next=";

function next(page) {
	$.ajax({
        type: "POST",
        url:document.getElementById("base_url").value+"SignUp/nextPage",
        data: {'next':page},
        success: function(data){
          $("body").html(data);
          $("body").css('overflow-y',' auto');
          $('html, body').animate({ scrollTop: 0 }, 'slow');


        }//success
  });
  //window.location.replace(base_url+page);

}//next

function nextWithMsg(page,msg){
  var fullMsg;

  if(page =="activity"){
    fullMsg="هذه الفئة تحتوي على" +  msg + " كتابًا، يمكنك تصفحها لاحقًا واختيار ما يناسبك منها";
  }

  else if (msg==0) {
    fullMsg="اختيار موفق  "
  }
  else if (msg==2) {
    fullMsg="اختيار موفق، يُمكنك سؤال قائدك عنها فور انضمامك"
  }
  else if(msg == 3){
    fullMsg=" حتى أنا أقوم بقرائتها دفعةً واحدة ";
  } 
  else if(msg == 4){
    fullMsg= " حتى أنا أقوم بتقسيمها ";
  }
  
  Swal.fire({
    title: 'رائـــع',
    text:fullMsg,
    imageUrl:document.getElementById("base_url").value+'assets/sign_up_assests/img/msg.png',
    imageWidth: 300,
    imageAlt: 'Custom image',
    timer: 4000,
    confirmButtonText: "استمرار ",
    confirmButtonColor:'#9ed16f'
  })
  .then((result) => {
  if (result.isConfirmed) {
    next(page);
  } 
  else {
    next(page);
  }
});

}//nextWithMsg

  function copyCode() {
    var Code =document.getElementById('code');
    var copyText = document.createElement('textarea');
    copyText.value=code.innerHTML;
    copyText.setAttribute('readonly', '');
    copyText.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(copyText);
    copyText.select();
    document.execCommand('copy');
    // Remove temporary textarea
    document.body.removeChild(copyText);

    Swal.fire({
      icon: 'success',
      title: 'تم  النسخ ',
      text:'لطفًا قم بارسال هذا الكود لقائد الفريق الخاص بك',
      type: "success",
      timer: 3000,
      confirmButtonText: "استمرار ",
      confirmButtonColor:'#9ed16f'
    });
         
  }
function checkAnswer() {
    answer=document.getElementById('answer').value; 
    answer = answer.replace(/[٠١٢٣٤٥٦٧٨٩]/g, function (d) { return d.charCodeAt(0) - 1632; }).replace(/[۰۱۲۳۴۵۶۷۸۹]/g, function (d) { return d.charCodeAt(0) - 1776; });
    if (answer == 30){
      Swal.fire({
        title: 'رائـــع',
        text:"أحسنت الاجابة",
        imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/msg.png',
        imageWidth: 300,
        imageAlt: 'Custom image',
        timer: 4000,
        confirmButtonText: "استمرار ",
        confirmButtonColor:'#9ed16f'
      }).then(function(){
          next('question_2');
      });
    }//if
    else if(document.getElementById('answer').value == "ثلاثين" || document.getElementById('answer').value == "ثلاثون"){
      Swal.fire({
        title: 'رائـــع',
        text:"أحسنت الاجابة",
        imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/msg.png',
        imageWidth: 300,
        imageAlt: 'Custom image',
        timer: 4000,
        confirmButtonText: "استمرار ",
        confirmButtonColor:'#9ed16f'
      }).then(function(){
        next('question_2');
      });
    }//elseif
    else{
      if(count != 3){
        Swal.fire({
          title: 'للأسف',
          text:"إجابة غير صحيحة، حاول مرةً أخرى",
          imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/error_msg.png',
          imageWidth: 300,
          imageAlt: 'Custom image',
          timer: 4000,
          confirmButtonText: "حسنًا ",
          confirmButtonColor:'#9ed16f'
        });
        count++;
        document.getElementById('error_msg').style.display="block";
      }//if
      else{
        Swal.fire({
          title: 'للأسف',
          text:"إجابة غير صحيحة، ما رأيك أن نُراجع هذا الجزء معًا؟",
          imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/error_msg.png',
          imageWidth: 300,
          imageAlt: 'Custom image',
          timer: 6000,
          confirmButtonText: "لنُراجع هذا الجزء معًا ",
          confirmButtonColor:'#9ed16f'
        }).then(function(){
          next('page_4');
        });
      }
       
    }//else

  }//checkAnswer


function question2(msg) {
  if(msg == 3){
    fullMsg=" حتى أنا أقوم بقرائتها دفعةً واحدة ";
  } 
  else{
    fullMsg= " حتى أنا أقوم بتقسيمها ";
  }
 
}
function allocateAmbassador(leader_gender){
  leader_gender =leader_gender;
  ambassador = JSON.parse(sessionStorage.getItem("ambassador_info"));

  $.ajax({
    type: "POST",
    url:document.getElementById("base_url").value+"SignUp/allocateAmbassador",
    data: {'ambassador':ambassador,'leader_gender': leader_gender},
    success: function(data){
      $("body").html(data);

    }//success
  });
}//allocateAmbassador

function informLeader(leader_id,request_id){

  $.ajax({
    type: "POST",
    url:document.getElementById("base_url").value+"SignUp/informLeader",
    data: {'leader_id':leader_id,'request_id': request_id}
  });
}//allocateAmbassador