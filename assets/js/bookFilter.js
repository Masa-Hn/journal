$(document).ready(function () {
  var level = [];
  var section = [];

  var type= document.getElementById("book_type").value;

  $(".section_checkbox").click(function () {
    url=document.getElementById("base_url").value+"bookSearch/sectionFilter";
    if (level.length != 0) {
      url=document.getElementById("base_url").value+"bookSearch/levelAndSectionFilter"
    }
    section = [];

    $.each($("input[name='section']:checked"), function(){
      var s="'"+$(this).val()+"'";
      section.push(s);
    });
    console.log("section " +section);
    console.log("level " +level.length);
    console.log("level type " +level);

    $.ajax({
      type: "POST",
      url:url,
      data: {'level':level,'type': type, 'section':section},
      success: function(data){
        document.getElementById("books_display").innerHTML =data;
        pagination();
      }//success
    });

  });

  $(".level_checkbox").click(function () {
    var url=document.getElementById("base_url").value+"bookSearch/levelFilter";

     if (section.length != 0) {
      url=document.getElementById("base_url").value+"bookSearch/levelAndSectionFilter"

    }
    level=[];
    $.each($("input[name='level']:checked"), function(){
      level.push($(this).val());
    });
    console.log("section " +section);
    console.log("level " +level.length);
    console.log("level type " +level);

    $.ajax({
      type: "POST",
      url:url,
      data: {'level':level,'type': type, 'section':section},
      success: function(data){
        document.getElementById("books_display").innerHTML =data;
        pagination();
      }//success
    });
  });

function pagination(){
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
}//pagination

});