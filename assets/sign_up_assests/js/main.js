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
      title: ' لقد قمنا بنسخ الكود لك',
      text:'😉 فقط قُم بلصقه عندما يطلب منك ',
      imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/copyMsg.png',
      imageWidth: 300,
      imageAlt: 'Custom image',
      timer: 5000,
      confirmButtonText: "شكرا لكم",
      confirmButtonColor:'#9ed16f'
    }).then(function(){
          next('team_info');
    });

  }


 function copyMsg(link) {
    var msg =document.getElementById('msg');
    var copyText = document.createElement('textarea');
    copyText.value=msg.innerHTML;
    copyText.setAttribute('readonly', '');
    copyText.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(copyText);
    copyText.select();
    document.execCommand('copy');
    // Remove temporary textarea
    document.body.removeChild(copyText);

    Swal.fire({
      title: 'لقد قمنا بنسخ رقم الطلب لك',
      text:'😉 فقط قُم بلصقه وإرساله',
      imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/copyMsg.png',
      imageWidth: 300,
      imageAlt: 'Custom image',
      timer: 5000,
      confirmButtonText: "شكرا لكم",
      confirmButtonColor:'#9ed16f'
    }).then(function(){

      window.open(link, "_blank");

    });

  }
function checkAnswer() {
    answer=document.getElementById('answer').value;
    if (answer == 30){
      Swal.fire({
        title: 'رائـــع',
        text:"الآن صرت تعرف كيف تحصل على علامة (100/100)  في قراءتك الأسبوعية، وتذكر  بإمكانك دوما قراءة ما يناسبك ",
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
    else{
      if(count != 2){
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
function allocateAmbassador(){
  leader_gender =document.getElementById('leader_gender').value;
  country =document.getElementById('country').value;
  ambassador = JSON.parse(sessionStorage.getItem("ambassador_info"));
  if (leader_gender != "" &&  country !="") {

    $.ajax({
      type: "POST",
      url:document.getElementById("base_url").value+"SignUpWithFB/allocateAmbassador",
      data: {'ambassador':ambassador,'leader_gender': leader_gender,'country': country },
      success: function(data){
        $("body").html(data);

      }//success
    });
  }//if
  else{
    if(leader_gender == ""){
      msg= "يجب اختيار جنس القائد";
    }
    else{
      msg="يجب اختيار بلد الاقامة";
    }
    Swal.fire({
      title: 'انتبه',
      text:msg,
      imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/error_msg.png',
      imageWidth: 300,
      imageAlt: 'Custom image',
      timer: 4000,
      confirmButtonText: "حسنًا ",
      confirmButtonColor:'#9ed16f'
    });
  }
}//allocateAmbassador


function checkLogin(id) {
   if (! sessionStorage['ambassador_info']) {
      urlReallocate=document.getElementById("base_url").value+"ReallocateAmbassador",
      window.location.replace(urlReallocate);
  }
  else{
    urlReallocate=document.getElementById("base_url").value+"ReallocateAmbassador/checkAmbassador?fb_id="+id;
    window.location.replace(urlReallocate); 
  }
}//checkLogin

function reallocateAmbassador(leader_gender) {

  leader_gender =leader_gender;
  leader_id=document.getElementById('leader_id').value;
  request_id=document.getElementById('request_id').value;
  ambassador = JSON.parse(sessionStorage.getItem("ambassador_info"));

  $.ajax({
    type: "POST",
    url:document.getElementById("base_url").value+"ReallocateAmbassador/allocateAmbassador",
    data: {'ambassador':ambassador,'leader_gender': leader_gender,'leader_id':leader_id,'request_id':request_id},
    success: function(data){
      $("body").html(data);

    }//success
  });
}


function informLeader(leader_id,request_id){

  $.ajax({
    type: "POST",
    url:document.getElementById("base_url").value+"SignUp/informLeader",
    data: {'leader_id':leader_id,'request_id': request_id}
  });
}//allocateAmbassador

function  show (id,close){
  var modal = document.getElementById(id);
  //var captionText = document.getElementById("caption");
  modal.style.display = "block";
  header=document.getElementById('header');
  header.style.display = "none";
  var span =document.getElementById(close);

  span.onclick = function() {
    header.style.display = "block";
    modal.style.display = "none";

  }


}//end show()
