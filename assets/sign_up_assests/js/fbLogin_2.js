// function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
//     console.log('statusChangeCallback');
//     console.log(response);                   // The current login status of the person.
//     if (response.status === 'connected') {   // Logged into your webpage and Facebook.
//       testAPI();  
//     } else {                                 // Not logged into your webpage or we are unable to tell.
//       document.getElementById('status').innerHTML = 'Please log ' +
//         'into this webpage.';
//     }
//   }


//   function checkLoginState() {               // Called when a person is finished with the Login Button.
//     FB.getLoginStatus(function(response) {   // See the onlogin handler
//       statusChangeCallback(response);
//     });
//   }


//   window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '1186653575034058',
//       cookie     : true,                     // Enable cookies to allow the server to access the session.
//       xfbml      : true,                     // Parse social plugins on this webpage.
//       version    : 'v8.0'           // Use this Graph API version for this call.
//     });


//     FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
//       statusChangeCallback(response);        // Returns the login status.
//     });
//   };
 
//   function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
//     console.log('Welcome!  Fetching your information.... ');
//     FB.api(
//       '/me',
//       'GET',
//       {"fields":"id,name,email,gender,link"},
//       function(response) {
//         document.getElementById("information").innerHTML ="Name "+response.name +"</br> Email "+response.email +"</br> Gender  "+response.gender +" </br> Link "+response.link;
//           console.log(response.email);
//       }
//     );
//   }//testAPI

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
              
                // sessionStorage.setItem("ambassador_info", JSON.stringify(ambassador));
                // window.location.replace(document.getElementById("base_url").value+"SignUp/checkAmbassador?fb_id="+response.id);
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
