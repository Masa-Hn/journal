<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link href="<?php echo base_url()?>assets/css/animation.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<style>

.container {right: 0; text-align: center; }

.container .left, .container .center, .container .right { display: inline-block; }

.container .left { float: left; }
.container .center { margin: 0 auto; }
.container .right { float: right; }
.clear { clear: both; }
</style>
<div class="padding" id="section-one">
      <div class="row fade-in">

          <h2 style="padding-right: 200px"> 
          	اقترح كتاباً   
           <input type="image" class="s-btn" style="float: right;padding-left: 20px"  src="<?php echo base_url()?>assets/img/suggest_book.png" > 

      </h2>

          <div class="heading-underline"></div>
      </div>
      <form>
      	<div class="container">
      		<div class="right" style="width: 50%">
      		<li style="font-size: 30px; text-align: right;" > اسم الكتاب : </li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="bookName"   align="right" >
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
               	
      		<li style="font-size: 30px;text-align: right;" > اسم الكاتب : </li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="writer"   align="right" >
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">

      		<li style="font-size: 30px;text-align: right;" > نبذة عن الكتاب : </li>
          
              <textarea class="box" style="font-size: 25px" type="text" id="brief" rows="5"  >
              </textarea>
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
</div>
<div class="left" style="width: 40%"> 
	<li style="font-size: 30px;text-align: right;" > صنف الكتاب : </li>
<select  class="box"  type="text" id="type"   align="right" style="font-size: 25px"  >
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
  <li style="font-size: 30px;text-align: right;" >متوفر الكترونياً ؟ </li>
<select  class="box"  type="text" id="found"   align="right" style="font-size: 25px"  onchange = "ShowHideDiv()">
                                     <option value=0>لا</option>
                                     <option value=1>نعم</option>
                                </select>
<div style="display: none;" id="div_link" >
                                <li style="font-size: 30px;text-align: right;" >رابط تحميل الكتاب : </li>
              <input class="box" style="text-align: right;font-size: 25px" dir="rtl" type="text" id="link"   align="right" >
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
</div>
 <script type="text/javascript">
    function ShowHideDiv() {
        var d1 = document.getElementById("found");
        var d2 = document.getElementById("div_link");
        d2.style.display = d1.value == 1 ? "block" : "none";
    }
</script>
                            </div>
</div>
<div class="container">
<div class="center">
 <button class="btn cusBtn " id="save" style="text-align: center;width: 200px;font-size: 25px">   حفظ الاقتراح </button>  
  </div>
</div>
  </form>
  </div>
