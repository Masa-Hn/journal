<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Management Book</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
 <style>body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background: linear-gradient(-45deg, #008080 50%, #EEEEEE 50%);
    background-repeat: no-repeat
}

h3,h5,p {text-align: right;}
.card {
    background-color: #FFF;
    border-radius: 25px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    padding: 40px;
    z-index: 0
}

.heading {
    font-weight: normal
}

.desc {
    font-size: 14px
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    padding-left: 0px
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 50%;
    float: right;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    content: ""
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #E0E0E0;
    border-radius: 50%;
    margin: auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 10px;
    background: #E0E0E0;
    position: absolute;
    left: 0;
    top: 17px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #F9A825
}

.sub-heading {
    font-weight: 500
}

.yellow-text {
    color: #F9A825
}

fieldset.show {
    display: block
}

fieldset {
    display: none
}

.radio {
    display: inline-block;
    border-radius: 0;
    box-sizing: border-box;
    cursor: pointer;
    color: #BDBDBD;
    font-weight: 500;
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%)
}

.radio:hover {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.radio.selected {
    border: 1px solid #F9A825;
    box-shadow: 0px 8px 16px 0px #EEEEEE;
    color: #29B6F6 !important;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    filter: grayscale(0%)
}

.card-block {
    border: 1px solid #CFD8DC;
    width: 45%;
    margin: 2.5%;
    padding: 20px 25px 15px 25px
}

@media screen and (max-width: 768px) {
    .card-block {
        padding: 20px 20px 0px 20px;
        height: 250px
    }
}

.icon {
    width: 85px;
    height: 100px
}

.image-icon {
    width: 85px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px
}

select,
input,
textarea,
button {
    padding: 8px 15px 8px 15px;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    background-color: #ECEFF1;
    border: 1px solid #ccc;
    font-size: 16px;
    letter-spacing: 1px
}

select:focus,
input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid skyblue !important;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

textarea {
    height: 100px
}

button {
    width: 120px;
    letter-spacing: 2px
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.btn-block {
    border-radius: 5px;
    height: 50px;
    font-weight: 500;
    cursor: pointer
}

.fa-long-arrow-right {
    float: right;
    margin-top: 4px
}

.fa-long-arrow-left {
    float: right;
    margin-top: 4px
}
.mybutton {
  display: inline-block;
  padding: 15px 15px;
  width: 100px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #008080;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}


.mybutton:active {
  background-color: #2F4F4F;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
                            <script src="<?php echo base_url()?>assets/js/addbook.js"></script>
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
                            </head>

                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة مقال</h3>
                <ul id="progressbar" class="text-center">
                    <li class="active step0" id="step2"></li>
                    <li class="step0" id="step3"></li>
                </ul>
               

                <fieldset class="show" id="add1">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات المقال</h5>
                         <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label>
                           
                 <div class="form-group"> 
                    
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم المقال : * </li></label> <input type="text" id="article_name" name="article_name" placeholder="" class="form-control" onblur="validate1(1)"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم كاتب المقال : * </li></label> <input type="text" id="writer" name="writer" placeholder="" class="form-control" onblur="validate1(2)"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">التاريخ : *</li> </label> <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate1(3)" > </div>
                       
                        <button id="next" class="mybutton" onclick="next();">التالي</button> 
                    </div>
                </fieldset>



                <fieldset id="add2">
                    <div class="form-card">
                         <h5 class="sub-heading mb-4" style="padding-bottom: 4em;">الرجاء إدخال بيانات الكتاب</h5>
                         <div>
                       
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">المقال :  </li> </label> <input type="text" id="article" name="article" placeholder="" class="form-control" style="padding-bottom: 200px;" onblur="validate2(1)"> </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">صورة المقال :  </li> </label>

                        <input type="file" onChange="onFileSelected(event)"><br>
                        <div id="img2">
                        <img id="myimage" height="200">
                            </div>
 
                    
                     
                         </div>  
                      <button id="previous" class="mybutton" onclick="previous()" style="float: right;" >السابق</button> 

                      <button id="save" class="mybutton" onclick="success()" >حفظ</button> 

                </fieldset>


<fieldset id = "success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة مقال جديد بنجاح</p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
                            </body>
                        </html>