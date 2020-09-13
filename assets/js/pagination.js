$(document).ready(function()
{
var num =3;
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
