<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">

<style>
    #sug-img{
        width:100%; 
        height:120%
    }
    @media (max-width: 768px){
        #sug-img{
            width:50%; 
            height:50%;
            padding-bottom: 10%;
            margin-left: 25%;
            margin-top: -100px
        }
    }
</style>

<div class="padding" id="section-one">
    <div class="container">
        <div class="row">
            <div class="container-fluid text-center">
                <h2 style="text-align: center;"> 
                    اقترح كتاباً          
                    
                </h2>
            </div>
        </div>
        <div class="heading-underline" style="width: 100%"></div>
    </div>
</div>
 

<form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>suggestBook/add" onsubmit="return validate(5,'bookName','writer','brief','type','found')">
    <div class="">
        <div class="container">
            <?php echo $this->session->flashdata('msg')?>  
            <?php echo $this->session->flashdata('msg2')?> 
            <div class="row">
                <div class="container-fluid text-center col-md-4 col-4 col-sm-12" dir="rtl" style="padding-top:120px">
                    <input type="image" class="s-btn" src="<?php echo base_url()?>assets/img/Suggest_a_book.png" id="sug-img"> 
                </div>
                <div class="container-fluid text-center col-md-8 col-8 col-sm-12" dir="rtl">
                    <div class="box" style="text-align: center;font-size: 20px">
                        <input class="s-text" type="text" id="bookName" name="bookName" align="right" onblur="validate(1,'bookName')" placeholder="اسم الكتاب " required>
                    </div><br><br><!--
                    <div class="box">
                        <input class="s-text" style="text-align: center;font-size: 25px"  type="text" id="writer" name="writer" align="right" onblur="validate(2,'writer')" placeholder="اسم الكاتب">
                    </div><br><br>-->
                    <div class="box" style="text-align: center;font-size: 20px" >
                        <textarea class="s-text" id="brief" name="brief" rows="5" onblur="validate(3,'brief')" placeholder="أضف نبذة عن الكتاب" required></textarea>
                    </div><br><br>
                    
                
                    <div class="box" style="text-align: center; font-size: 20px;">
                        <select class="s-text" id="type" name="type" align="center" style="color:#767676" onblur="validate(4,'type')">
                            <option value="" disabled selected hidden>صنف الكتاب</option>
                            <option value="تنمية بشرية">تنمية بشرية</option>
                            <option value="فكري ثقافي">فكري ثقافي</option>
                            <option value="علمي">علمي</option>
                            <option value="تاريخي">تاريخي</option>
                            <option value="أدبي">أدبي</option>
                            <option value="اقتصادي">اقتصادي</option>
                            <option value="عسكري">عسكري</option>
                            <option value="اجتماع وعلم نفس">اجتماع وعلم نفس</option>
                            <option value="سير الصحابة">سير الصحابة</option>
                            <option value="ديني">ديني</option>
                            <option value="سياسي">سياسي</option>
                            <option value="تربوي">تربوي</option>
                            <option value="غير ذلك">غير ذلك</option>
                        </select>
                    </div><br><br>
                    
                    <div class="box" style="text-align: center;font-size: 20px">
                        <input class="s-text" type="text" id="publisher" name="publisher" align="right" placeholder="دار النشر">
                    </div><br><br>
                    
                    <div class="box" style="text-align:center; font-size:20px;">
                        <select class="s-text" type="text" id="found" name="found" align="center" style="color:#767676" onchange="ShowHideDiv()" onblur="validate(5,'found')">
                            <option value="" disabled selected hidden>متوفر الكترونياً ؟</option>
                            <option value=0>لا</option>
                            <option value=1>نعم</option>
                        </select>
                    </div><br><br>
                    
                    <div style="display: none;" id="div_link">
                        <div class="box" style="text-align: center;font-size: 20px">
                            <input class="s-text" dir="rtl" type="text" id="link" name="link" align="right" placeholder="رابط تحميل الكتاب ">
                        </div><br><br>
                        <hr style="width: 70%; border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
                    </div>
                 
                    <button class="btn cusBtn" id="save" style="font-size: 20px" onclick="save()"> حفظ الاقتراح </button><br><br> 
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    function save()
    {
        swal("Hello world!");
    }
    
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