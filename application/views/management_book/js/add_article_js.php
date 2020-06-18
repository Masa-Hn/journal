<script type="text/javascript">
    function validate2(val) {
v1 = document.getElementById("article");


flag1 = true;

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


flag = flag1

return flag;
}





function validate1(val) {
v1 = document.getElementById("article_name");
v2 = document.getElementById("writer");
v3 = document.getElementById("date");

flag1 = true;
flag2 = true;
flag3 = true;

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

if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}

flag = flag1 && flag2 && flag3;

return flag;
}






function next() {
  if (validate1(0))
  {
  document.getElementById('add1').style.display="none";
  document.getElementById('add2').style.display="block";
 document.getElementById('step2').className="step0";
    document.getElementById('step3').className="active step0";
}
}

function previous() {
  document.getElementById('add2').style.display="none";
  document.getElementById('add1').style.display="block";
   document.getElementById('step2').className="active step0";
    document.getElementById('step3').className="step0";
}

function success() {
    if(validate2(0))
    {
  document.getElementById('success').style.display="block";
  document.getElementById('add2').style.display="none";
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