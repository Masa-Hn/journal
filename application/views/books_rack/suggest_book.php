<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link href="<?php echo base_url()?>assets/css/animation.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<style>


</style>
<div class="padding" id="section-one">
  <div class="container">
<div class="row">
          <div class="container-fluid text-center">
          <h2 style="text-align: right;"> 
          	اقترح كتاباً   
          <input type="image" class="s-btn" style="float: right;"  src="<?php echo base_url()?>assets/img/suggest_book.png" > 
      </h2>

          <div class="heading-underline"></div>
            <div style="text-align: left;"><label  class="text-danger mb-3">* مطلوب</label></div>

      </div>
    </div>
  </div>
</div>

<?php echo $this->session->flashdata('msg')?>  
      <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>Suggest_book/add" onsubmit="return validate(5,'bookName','writer','brief','type','found')">
      	<div class="padding" id="section-one">
    <div class="container">
      <div class="row">
          <div class="container-fluid text-center">
      		<li style="font-size: 30px; text-align: right;" > اسم الكتاب : *</li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="bookName" name="bookName"   align="right" onblur="validate(1,'bookName')">
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
               	
      		<li style="font-size: 30px;text-align: right;" > اسم الكاتب : *</li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="writer" name="writer"   align="right" onblur="validate(2,'writer')">
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">

      		<li style="font-size: 30px;text-align: right;" > نبذة عن الكتاب : *</li>
          
              <textarea class="box" style="font-size: 25px"  id="brief" name="brief" rows="5" onblur="validate(3,'brief')" ></textarea>
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
</div>
</div>
 <div class="row">
          <div class="container-fluid text-center">
	<li style="font-size: 30px;text-align: right;" > صنف الكتاب : *</li>
<select  class="box"  type="text" id="type" name="type"  align="right"  style="font-size: 25px"  >
                                    <option value="تاريخي">تاريخي</option>
                                    <option value="ديني">ديني</option>
                                    <option value="إقتصادي">إقتصادي</option>
                                    <option value="أدبي">أدبي</option>
                                    <option value="اجتماعي">اجتماعي</option>
                                    <option value="تنمية">تنمية</option>
                                    <option value="تربية">تربية</option>
                                    <option value="سير الصحابة">سير الصحابة</option>
                                    <option value="سياسي">سياسي</option>
                                    <option value="فكري">فكري</option>
                                    <option value="علمي">علمي</option>
                                    <option value="عسكري">عسكري</option>
                                    <option value="خيال علمي/ أطفال">خيال علمي/ أطفال</option>
                                    <option value="قصص صحابة/ أطفال">قصص صحابة/ أطفال</option>
                                    <option value="انجليزي">انجليزي</option>
                                </select>
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
<br>
  <li style="font-size: 30px;text-align: right;" >متوفر الكترونياً ؟ *</li>
<select  class="box"  type="text" id="found" name="found"   align="right" style="font-size: 25px"  onchange = "ShowHideDiv()">
                                     <option value=0>لا</option>
                                     <option value=1>نعم</option>
                                </select>
<div style="display: none;" id="div_link" >
                                <li style="font-size: 30px;text-align: right;" >رابط تحميل الكتاب : </li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="link" name="link"   align="right" >
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
</div>
 <script type="text/javascript">
    function ShowHideDiv() {
        var d1 = document.getElementById("found");
        var d2 = document.getElementById("div_link");
        d2.style.display = d1.value == 1 ? "block" : "none";
    }

     function validate(val,v1,v2,v3,v4,v5) {
v1 = document.getElementById(v1);
v2 = document.getElementById(v2);
v3 = document.getElementById(v3);
v4 = document.getElementById(v4);
v5 = document.getElementById(v5);


flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;


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

if(val>=4|| val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}


if(val>=5 || val==0) {
if(v5.value == "") {
v5.style.borderColor = "red";
flag5 = false;
}
else {
v5.style.borderColor = "green";
flag5 = true;
}
}

flag = flag1 && flag2 && flag3 && flag4 && flag5;

return flag;
}


</script>
                            </div>
</div>
</div>
</div>

 <div class="padding" id="section-one">
  <div class="container">
<div class="row">
          <div class="container-fluid text-center" >
 <button class="btn cusBtn " id="save" style="font-size: 25px" >   حفظ الاقتراح </button>  
  </div>
</div>
</div>
</div>


  </form>
  </div>
