<script type="text/javascript">
    function validate(val,v1,v2,v3) {
v1 = document.getElementById(v1);
v2 = document.getElementById(v2);
v3 = document.getElementById(v3);

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




function next1() {
  if (validate(0,'book_name','writer','story'))
  {
  document.getElementById('add1').style.display="none";
  document.getElementById('add2').style.display="block";
    document.getElementById('step2').className="step0";
    document.getElementById('step3').className="active step0";
}
}


function previous2() {
  document.getElementById('add2').style.display="none";
  document.getElementById('add1').style.display="block";
   document.getElementById('step2').className="active step0";
    document.getElementById('step3').className="step0";
}
function nextarticle() {
  if (validate(0,'article_name','writer','date'))
  {
  document.getElementById('add1').style.display="none";
  document.getElementById('add').style.display="block";
 document.getElementById('step2').className="step0";
 document.getElementById('step3').className="active step0";
}
}
function previous() {
  document.getElementById('add').style.display="none";
  document.getElementById('add1').style.display="block";
   document.getElementById('step2').className="active step0";
    document.getElementById('step3').className="step0";
}
function success(val,p1,p2) {
 
  document.getElementById('success').style.display="block";
  document.getElementById('add').style.display="none";
 
}
function nextnext() {
  
document.getElementById('add2').style.display="none";
  document.getElementById('add').style.display="block";
 document.getElementById('step3').className="step0";
 document.getElementById('step4').className="active step0";
 
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
  document.getElementById('img1').style.display="none";
  document.getElementById('img2').style.display="block";
}


// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
} 

function type_book() {
 
  document.getElementById('radio').style.display="none";
  document.getElementById('content').style.display="block";
 

}

function back() {
 
  document.getElementById('content2').style.display="none";
  document.getElementById('content').style.display="block";

 
}
function show_detailes(id,name,writer,type,level,section,post,pic) {
 
  document.getElementById('content').style.display="none";
  document.getElementById('content2').style.display="block";
  document.getElementById('name').value=name;
  document.getElementById('writer').value=writer;

  if(type==1)  document.getElementById('type').value='كتاب منهج';
 if(type==2)   document.getElementById('type').value='كتاب مرحلة تحضيرية';
if(type==3)    document.getElementById('type').value='كتاب أطفال';
if(type==4)    document.getElementById('type').value='كتاب رمضان';
if(type==5)    document.getElementById('type').value='كتاب يافعين';
 
 if(level==1)  document.getElementById('level').value='بسيط';
 if(level==2)   document.getElementById('level').value='متوسط';
if(level==3)    document.getElementById('level').value='عميق';
  
  document.getElementById('section').value=section;
 
  p = document.getElementById('post');
p.setAttribute("href", post);

a = document.getElementById('image');
a.setAttribute("href", pic);

b = document.getElementById('update');
b.setAttribute("href", "<?php echo base_url()?>AddBooks/index/"+id);

s = document.getElementById('delete');
s.setAttribute("href", "<?php echo base_url()?>AddBooks/delete/"+type+"/"+id);
  
}

function show_detailes_graphic(id,pic,date,section,title) {
 
  document.getElementById('content').style.display="none";
  document.getElementById('content2').style.display="block";
  document.getElementById('title').value=title;
  document.getElementById('section').value=section;
  document.getElementById('date').value=date;
  document.getElementById('info_id').value=id;

 
  a=document.getElementById('pic');
  a.setAttribute("src","<?php echo base_url()?>assets/img/infographic/"+pic);
 
  
b = document.getElementById('delete');
b.setAttribute("href", "<?php echo base_url()?>Management_book/show_infographic/"+id);
  
}

</script>