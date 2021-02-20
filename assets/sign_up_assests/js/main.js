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
          title: "أحسنت",
          text:fullMsg,
          imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/right.png',
          imageWidth: 300,
          imageAlt: 'Custom image',
          confirmButtonText: "استمرار ",
          confirmButtonColor:'#87d69a'
    }).then((result) => {
      setTimeout(function() {
        next(page);
      },400);

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
      confirmButtonText: "شكرا لكم",
      confirmButtonColor:'#87d69a'
    }).then((result) => {
      setTimeout(function() {
        next('team_info');
      },400);

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
      confirmButtonText: "شكرا لكم",
      confirmButtonColor:'#87d69a'
    }).then((result) => {
      setTimeout(function() {
        window.open(link, "_blak");
      },400);

    });
  }
function checkAnswer() {
  answer=document.getElementById('answer').value;
  if (answer == 30){
    Swal.fire({
          title: "أحسنت",
          text:"الآن صرت تعرف كيف تحصل على علامة (100/100)  في قراءتك الأسبوعية، وتذكر  بإمكانك دوما قراءة ما يناسبك ",
          imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/right.png',
          imageWidth: 300,
          imageAlt: 'Custom image',
          confirmButtonText: "استمرار ",
          confirmButtonColor:'#87d69a'
    }).then((result) => {
      setTimeout(function() {
        next('question_2');
      },400);

    });
  }//if    
  else if(count != 2){
    Swal.fire({
            title: 'هل أنت متأكد؟',
            text:"إجابتك غير صحيحة، حاول مرةً أخرى",
            imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/wrong.png',
            imageWidth: 300,
            imageAlt: 'Custom image',
            confirmButtonText: "حسنًا ",
            confirmButtonColor:'#87d69a'
    });
    count++;
  }//else if
  else{
    Swal.fire({
            title: 'للأسف',
            text:"إجابة غير صحيحة، ما رأيك أن نُراجع هذا الجزء معًا؟",
            imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/wrong.png',
            imageWidth: 300,
            imageAlt: 'Custom image',
            confirmButtonText: "لنُراجع هذا الجزء معًا ",
            confirmButtonColor:'#87d69a'
    }).then((result) => {
      setTimeout(function() {
        next('page_4');
      },400);

    });
  }//else

  }//checkAnswer

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
    swal({
      title: 'انتبه',
      text:msg,
      imageUrl: document.getElementById("base_url").value+'assets/sign_up_assests/img/wrong.png',
      imageWidth: 300,
      imageAlt: 'Custom image',
      timer: 4000,
      confirmButtonText: "حسنًا ",
      confirmButtonColor:'#87d69a'
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
