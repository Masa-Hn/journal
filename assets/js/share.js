  function fbShare()
  {
    var fb = 'https://www.facebook.com/sharer/sharer.php?u=';
    var displayLink ="file:///C:/Users/someO/Desktop/Design/display.html/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = fb+displayLink+displayID; 
    window.open(fullLink);
  }

  function twitterShare(){
    var twitter = 'http://twitter.com/share?text=Osboha180&url=';
    var displayLink ="file:///C:/Users/someO/Desktop/Design/display.html/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = twitter+displayLink+displayID; 
    window.open(fullLink);
  }
    function linkedinShare(){
    var linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=';
    var displayLink ="file:///C:/Users/someO/Desktop/Design/display.html/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = linkedin+displayLink+displayID; 
    window.open(fullLink);
  }
  function pin_it(){
    var pin_it="http://pinterest.com/pin/create/button/?url=";
    var displayLink ="file:///C:/Users/someO/Desktop/Design&media=";
    var id= document.getElementById("shareID").value;
    var img = document.getElementById(id).src; 

    var fullLink = pin_it+displayLink+img; 
    window.open(fullLink);
  }

    function copyLink(){
    var link = 'file:///C:/Users/someO/Desktop/Design/display.html/'+document.getElementById("shareID").value;
    
    var copyText = document.createElement('textarea');
    copyText.value=link;
    copyText.setAttribute('readonly', '');
    copyText.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(copyText);
    copyText.select();
    document.execCommand('copy');
    // Remove temporary textarea
    document.body.removeChild(copyText);
    Swal.fire({
      icon: 'success',
      title: 'تم نسخ الرابط',
      text:'يمكنك مشاركته مع أصدقائك',
      showConfirmButton: false,
      timer: 3000
    })
    console.log(copyText.value);
  }
