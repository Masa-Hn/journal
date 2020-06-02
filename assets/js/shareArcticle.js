  function fbShare()
  {
    var fb = 'https://www.facebook.com/sharer/sharer.php?u=';
    var currentUrl =window.location.href;
    var fullLink = fb+currentUrl; 
    window.open(fullLink);
    console.log(fullLink)
  }

  function twitterShare(){
    var twitter = 'http://twitter.com/share?text=Osboha180&url=';
    var currentUrl =window.location.href; 
    var fullLink = twitter+currentUrl; 
    window.open(fullLink);
    console.log(fullLink)
  }
    function linkedinShare(){
    var linkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=';
    var currentUrl =window.location.href;
    var fullLink = linkedin+currentUrl; 
    window.open(fullLink);
    console.log(fullLink)
  }


    function copyLink(){
    var link =  window.location.href;
    
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
    console.log(link);
  }
