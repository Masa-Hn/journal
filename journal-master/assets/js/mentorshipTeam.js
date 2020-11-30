function toggle(btnID, eIDs) {
  // Feed the list of ids as a selector
  var theRows = document.querySelectorAll(eIDs);
  // Get the button that triggered this
  var theButton = document.getElementById(btnID);
  // If the button is not expanded...
  if (theButton.getAttribute("aria-expanded") == "false") {
    // Loop through the rows and show them
    for (var i = 0; i < theRows.length; i++) {
      theRows[i].classList.add("shown");
      theRows[i].classList.remove("hidden");
    }
    // Now set the button to expanded
    theButton.setAttribute("aria-expanded", "true");
  // Otherwise button is not expanded...
  } else {
    // Loop through the rows and hide them
    for (var i = 0; i < theRows.length; i++) {
      theRows[i].classList.add("hidden");
      theRows[i].classList.remove("shown");
    }
    // Now set the button to collapsed
    theButton.setAttribute("aria-expanded", "false");
  }
}//toggle

  $(".checkbox").click(function () {
    //url=document.getElementById("base_url").value+"bookSearch/sectionFilter";
    section = [];

    $.each($("input[name='checkbox']:checked"), function(){
      var s="'"+$(this).val()+"'";
      section.push(s);
    });
    if (section.length != 0) {
      document.getElementById('submit').style.display="block";
    }
    else{
      document.getElementById('submit').style.display="none";

    }
    console.log("section " +section);
  });
