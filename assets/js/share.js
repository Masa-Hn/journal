//Infographics
  function infographic_fbShare()
  {
    var fb = 'https://www.facebook.com/sharer/sharer.php?u=';
    var displayLink =document.getElementById("base_url").value+"infographicDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = fb+displayLink+displayID; 
    console.log(fullLink);
    window.open(fullLink);
  }

  function infographic_twitterShare(){
    var twitter = 'http://twitter.com/share?text=Osboha180&url=';
    var displayLink =document.getElementById("base_url").value+"Infographic/infographicDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = twitter+displayLink+displayID; 
    console.log(fullLink);

    window.open(fullLink);
  }
    function infographic_linkedinShare(){
    var linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=';
    var displayLink =document.getElementById("base_url").value+"Infographic/infographicDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = linkedin+displayLink+displayID; 
    console.log(fullLink);

    window.open(fullLink);
  }
  function infographic_pin_it(){
    var pin_it="http://pinterest.com/pin/create/button/?url=";
    var displayLink =document.getElementById("base_url").value+"&media=";
    var id= document.getElementById("shareID").value;
    var img = document.getElementById(id).src; 

    var fullLink = pin_it+displayLink+img; 
    console.log(fullLink);
    window.open(fullLink);
  }

    function infographic_copyLink(){
    var link =document.getElementById("base_url").value+"Infographic/infographicDisplay/"+document.getElementById("shareID").value;
    
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
//Accomplishments

function accomp_fbShare()
  {
    var fb = 'https://www.facebook.com/sharer/sharer.php?u=';
    var displayLink =document.getElementById("base_url").value+"accompDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = fb+displayLink+displayID; 
    console.log(fullLink);
    window.open(fullLink);
  }

  function accomp_twitterShare(){
    var twitter = 'http://twitter.com/share?text=Osboha180&url=';
    var displayLink =document.getElementById("base_url").value+"Accomplishment/accompDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = twitter+displayLink+displayID; 
    console.log(fullLink);

    window.open(fullLink);
  }
    function accomp_linkedinShare(){
    var linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=';
    var displayLink =document.getElementById("base_url").value+"Accomplishment/accompDisplay/";
    var displayID=document.getElementById("shareID").value; 
    var fullLink = linkedin+displayLink+displayID; 
    console.log(fullLink);

    window.open(fullLink);
  }
  function accomp_pin_it(){
    var pin_it="http://pinterest.com/pin/create/button/?url=";
    var displayLink =document.getElementById("base_url").value+"&media=";
    var id= document.getElementById("shareID").value;
    var img = document.getElementById(id).src; 

    var fullLink = pin_it+displayLink+img; 
    console.log(fullLink);
    window.open(fullLink);
  }

    function accomp_copyLink(){
    var link =document.getElementById("base_url").value+"Accomplishment/accompDisplay/"+document.getElementById("shareID").value;
    
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