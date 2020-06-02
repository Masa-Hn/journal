// Get the modal
function  show (id){

  var modal = document.getElementById("myModal");
  document.getElementById("shareID").value= id;
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var imgSrc = document.getElementById(id).src;
     console.log(imgSrc);

  var modalImg = document.getElementById("img");
   modal.style.display = "block";
    modalImg.src = imgSrc;
  //var captionText = document.getElementById("caption");

  var span = document.getElementsByClassName("close")[0];

  span.onclick = function() { 
    modal.style.display = "none";
  }

}

