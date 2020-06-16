<script type="text/javascript">
   
function validate1(val) {
v1 = document.getElementById("adress_info");
v2 = document.getElementById("date");

flag1 = true;
flag2 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}


flag = flag1 && flag2;

return flag;
}



function success() {
    if(validate1(0))
    {
  document.getElementById('success').style.display="block";
  document.getElementById('add').style.display="none";
 }
}
function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);  
  document.getElementById('img2').style.display="block";




}
</script>