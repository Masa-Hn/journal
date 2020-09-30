<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">

<style>


</style>
<div class="padding" id="section-one">
  <div class="container">
<div class="row">
          <div class="container-fluid text-center">
          <h2 style="text-align: right;"> 
          	اقترح كتاباً          
          <input type="image" class="s-btn" style="float: right;width: 100px;height: 100px"  src="<?php echo base_url()?>assets/img/suggest_book.png" > 
      </h2>
    </div>
      </div>

          <div class="heading-underline" style="width: 100%"></div>

  </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  function save()
  {
    swal("Hello world!");
  }
</script>
<?php echo $this->session->flashdata('msg')?>  
              <?php echo $this->session->flashdata('msg2')?>  

      <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>Suggest_book/add" onsubmit="return validate(5,'bookName','writer','brief','type','found')">
      	<div class="padding" id="section-one">
    <div class="container">
      <div class="row">
          <div class="container-fluid text-center">
      		
              <input class="box" style="text-align: center;font-size: 25px" dir="rtl" type="text" id="bookName" name="bookName"   align="right" onblur="validate(1,'bookName')" placeholder="اسم الكتاب ">

               	
<h2></h2>
              <input class="box" style="text-align: center;font-size: 25px" dir="rtl" type="text" id="writer" name="writer"   align="right" onblur="validate(2,'writer')" placeholder="اسم الكاتب ">

<h2></h2>

              <textarea class="box" style="text-align: center;font-size: 25px"  id="brief" name="brief" rows="5" onblur="validate(3,'brief')" placeholder="نبذة عن الكتاب "></textarea>
</div>
</div>
 <div class="row">
          <div class="container-fluid text-center">
<h2></h2>
<select  class="box"  type="text" id="type" name="type"  align="center"  style="text-align: center; font-size: 25px" onblur="validate(4,'type')" >
          <option  value="" disabled selected hidden>صنف الكتاب</option>
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
<h2></h2>


<select  class="box"  type="text" id="found" name="found"   align="right" style="text-align: center; font-size: 25px"  onchange = "ShowHideDiv()" onblur="validate(5,'found')">
   <option  value="" disabled selected hidden>متوفر الكترونياً ؟</option>
                                     <option value=0>لا</option>
                                     <option value=1>نعم</option>
                                </select>
<h2></h2>
<div style="display: none;" id="div_link" >
              <input class="box" style="text-align: center;font-size: 25px" dir="rtl" type="text" id="link" name="link"   align="right" placeholder="رابط تحميل الكتاب " >
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
          <div class="container-fluid text-center" "> 
 <button class="btn cusBtn " id="save" style="font-size: 25px"  onclick="save()">   حفظ الاقتراح </button>  
  </div>
</div>
</div>
</div>


  </form>
  </div>
