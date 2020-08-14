$(document).ready(function () {
  
    $(".section_checkbox").click(function () {
    url=document.getElementById("base_url").value+"Infographic/sectionFilter";
    section = [];
    $.each($("input[name='section']:checked"), function(){
      var s="'"+$(this).val()+"'";
      section.push(s);
    });

    $.ajax({
      type: "POST",
      url:url,
      data: {'section':section},
      success: function(data){
        document.getElementById("gallaryRow").innerHTML =data;
      }//success
    });
  });

  $("#series").click(function () {
    window.location.replace(document.getElementById("base_url").value+"Infographic/seriesDisplay");

  });
  $("#series_2").click(function () {
    window.location.replace(document.getElementById("base_url").value+"Infographic/seriesDisplay");

  });
});