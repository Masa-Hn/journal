
 
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
                            <script src="<?php echo base_url()?>assets/js/addbook.js"></script>
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
                            </head>

                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة صورة</h3>
               

                <fieldset class="show" id="add">
                    <div class="form-card">
                         <h5 class="sub-heading mb-4" >الرجاء إدخال بيانات الانفوجرافيك</h5>
                             <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label>

                         <div>
                       
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">عنوان الانفوجرافيك : * </li> </label> <input type="text" id="adress_info" name="adress_info" placeholder="" class="form-control" onblur="validate1(1)"> </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">التاريخ : *</li> </label> <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate1(2)" > </div>
                       

                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">الصورة :  </li> </label>

                        <input type="file" onChange="onFileSelected(event)"><br>
                        <div id="img2">
                        <img id="myimage" height="200">
                            </div>
                         </div> 
                         
                      <button id="save" class="mybutton" onclick="success()" >حفظ</button> 

                </fieldset>


<fieldset id = "success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة صورة جديدة بنجاح</p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
                            </body>
                        </html>