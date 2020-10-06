function copyNames(className) {
  var lst = document.querySelectorAll( className );
  var i, x = "";
  for ( i = 0; i < lst.length; i++ ) {
    x += lst[ i ].textContent + "\n";
  }
  var copyText = document.createElement( 'textarea' );
  copyText.value = x;
  document.body.appendChild( copyText );
  copyText.select();
  document.execCommand( 'copy' );
  // Remove temporary textarea
  document.body.removeChild( copyText );
  Swal.fire( {
    icon: 'success',
    title: 'تم النسخ',
    text: 'تم نسخ أسماء السفراء',
    showConfirmButton: false,
    timer: 3000
  } );
  console.log( x );
}

function copyMsg( id, leaderName ) {
  var lst = document.getElementById( id ).querySelectorAll( ".names" );
  var i, x = "";
  x += "مرحباً قائد " + leaderName + "\n\n";
  x += "لطفا قم باستقبال الأعضاء التالية اسماؤهم :\n\n";
  for ( i = 0; i < lst.length; i++ ) {
    x += lst[ i ].textContent + "\n";
  }
  x += "\n\nشكراً جداً لحضرتك \n فريق الإدخال";
  var copyText = document.createElement( 'textarea' );
  copyText.value = x;
  document.body.appendChild( copyText );
  copyText.select();
  document.execCommand( 'copy' );
  // Remove temporary textarea
  document.body.removeChild( copyText );
  Swal.fire( {
    icon: 'success',
    title: 'تم نسخ الأسماء والرسالة',
    text: 'يمكنك إرسال الرسالة للقائد',
    showConfirmButton: false,
    timer: 3000
  } );
  console.log( x );
}

function send_to_leader( id ) {
  swal( {
      icon: 'warning',
      title: 'تأكيد الإرسال!',
      text: ' هل أنت متأكد من أنك راسلت القائد بالأسماء؟',
      type: "warning",
      showConfirmButton: true,
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText: 'نعم',
      cancelButtonText: 'إلغاء',
      confirmButtonColor: "#205d67",
      closeOnConfirm: false,
      closeOnCancel: true
    },
    function ( isConfirm ) {
      if ( isConfirm ) {
        var base_url = "<?php echo base_url()?>";

        $.ajax( {
          url: base_url + 'MentorshipTeam/send_to_leader',
          type: 'POST',
          data: {
            id: id
          },
          dataType: 'text',
          success: function () {
            /*	swal( {
          title: 'تم الحفظ',
          text: 'بوركت جهودك',
          type: "success",
          showConfirmButton: true,
          confirmButtonText: 'حسناً',
          confirmButtonColor: "#205d67"
        } );*/
            window.setTimeout( function () {}, 3000 );
            location.reload();
          },
          error: function ( error ) {
            console.log( error );
          }
        } );
      } else {
        console.log( "canceled" );
      }
    } );
}

$(document).ready(function()
{
var num =15;
if(sessionStorage.getItem("bookDisplayNum") != null) {
      document.getElementById("bookDisplay").value=sessionStorage.getItem("bookDisplayNum");
       num =sessionStorage.getItem("bookDisplayNum");
     }//if

  var items = $(".list-wrapper .list-item");
  var numItems = items.length;
  var perPage = num;

  items.slice(perPage).hide();

  $('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function (pageNumber) {
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      items.hide().slice(showFrom, showTo).show();
    }
  });
  $('#displaybtn').click(function(){
    console.log(document.getElementById("bookDisplay").value);
    sessionStorage.setItem('bookDisplayNum', document.getElementById("bookDisplay").value);
    window.location.reload()

  });

});
