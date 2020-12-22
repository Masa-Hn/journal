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
              {"fields":"id,name,email,gender"},
              function(response) {
                ambassador = {name:response.name, email:response.email,gender:response.gender,profile_link:"none",fb_id:response.id};

                window.location.replace(document.getElementById("base_url").value+"Registration/teamInfo?email="+response.email+"&name="+response.name+"&gender="+response.gender);
              }
            );

        } else {
            //user hit cancel button
            //document.getElementById('errorMsgP').innerHTML='إذا واجهتك مشكلة بالتسجيل بواسطة الفيسبوك، قم بتسجيل معلوماتك من هُنا';
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'public_profile,email,user_gender'
    });
}
(function() {
    // var e = document.createElement('script');
    // e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    // e.async = true;
    // document.getElementById('fb-root').appendChild(e);
}());
