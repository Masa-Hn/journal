function reallocateLogin(){
  let email = document.getElementById("loginemail").value;
  let getDataUrl=document.getElementById("base_url").value+"ReallocateAmbassador/getAmbassadorData";
  $.ajax( {
            type: "POST",
            url:getDataUrl,
            data: {
                email: email
            },
            success: function ( data ) {
              console.log(data)
              if (data === 'unregistered') {
                //window.location.replace(document.getElementById("base_url").value+"SignUp");
              }
              else{
                response = JSON.parse(data);
                ambassador = {name:response[0].name,gender:response[0].gender,profile_link:response[0].link,fb_id:response[0].fb_id};
                sessionStorage.setItem("ambassador_info", JSON.stringify(ambassador));  
                window.location.replace(document.getElementById("base_url").value+"ReallocateAmbassador/checkAmbassador?fb_id="+response[0].fb_id);

              }
              
            },
            error: function ( error ) {
                console.log( error );
            }
        } );

 // window.location.replace(document.getElementById("base_url").value+"ReallocateAmbassador/checkAmbassador?fb_id="+response.id);

}

window.fbAsyncInit = function() {
    FB.init({
      appId      : '423417075295764',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v8.0' 
    });

  };

function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api(
              '/me',
              'GET',
              {"fields":"id,name,email,gender,link"},
              function(response) {
                ambassador = {name:response.name, email:response.email,gender:response.gender,profile_link:response.link,fb_id:response.id};
                sessionStorage.setItem("ambassador_info", JSON.stringify(ambassador));
                window.location.replace(document.getElementById("base_url").value+"ReallocateAmbassador/checkAmbassador?fb_id="+response.id);
              }
            );

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'public_profile,email,user_gender,user_link'
    });
}
(function() {
    // var e = document.createElement('script');
    // e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    // e.async = true;
    // document.getElementById('fb-root').appendChild(e);
}());
