                               

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
                       
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">عنوان الانفوجرافيك : * </li> </label> <input type="text" id="adress_info" name="adress_info" placeholder="" class="form-control" onblur="validate(1,'adress_info')"> </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">التاريخ : *</li> </label> <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate(2,'date')" > </div>
                       

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