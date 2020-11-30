// Get the modal
function  show (id){
  console.log(id);
  var modal = document.getElementById("myModal");
  document.getElementById("shareID").value= id;
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var imgSrc = document.getElementById(id).src;
    console.log(imgSrc);
    console.log("k");

  var modalImg = document.getElementById("img");
   modal.style.display = "block";
    modalImg.src = imgSrc;
  //var captionText = document.getElementById("caption");

  var spanClose = document.getElementById("close");
  spanClose.onclick = function() { 
    modal.style.display = "none";
  }
}//show

function showPhotos(id){
  window.location.replace(document.getElementById("base_url").value+"Infographic/seriesPhotos?series_id="+id);
}//showPhotos

function returnToSeries(){
  window.location.replace(document.getElementById("base_url").value+"Infographic/seriesDisplay");
}//returnToSeries

function detailedView(){
  var id = document.getElementsByClassName("active")[0].id;
  var modal = document.getElementById("myModal");
  document.getElementById("shareID").value= id;
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var imgSrc = document.getElementById(id).src;
    console.log(imgSrc);
    console.log("k");

  var modalImg = document.getElementById("img");
   modal.style.display = "block";
    modalImg.src = imgSrc;
  //var captionText = document.getElementById("caption");

 var span = document.getElementById("detailedView");

  span.onclick = function() { 
    modal.style.display = "none";
  }

}//show