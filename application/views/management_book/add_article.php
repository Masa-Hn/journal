

                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة مقال</h3>
                <ul id="progressbar" class="text-center">
    
                    <li style="width: 50%;" class="active step0" id="step2"></li>
                    <li style="width: 50%;" class="step0" id="step3"></li>
                </ul>
               

                <fieldset class="show" id="add1">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات المقال</h5>
                         <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label>
                           
                 <div class="form-group"> 
                    
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم المقال : * </li></label> <input type="text" id="article_name" name="article_name" placeholder="" class="form-control" onblur="validate(1,'article_name')"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم كاتب المقال : * </li></label> <input type="text" id="writer" name="writer" placeholder="" class="form-control" onblur="validate(2,'writer')"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">التاريخ : *</li> </label> <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate(3,'date')" > </div>
                       
                        <button id="next" class="mybutton" onclick="next();">التالي</button> 
                    </div>
                </fieldset>



                <fieldset id="add">
                    <div class="form-card">
                         <h5 class="sub-heading mb-4" style="padding-bottom: 4em;">الرجاء إدخال بيانات الكتاب</h5>
                         <div>
                       
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">المقال :  </li> </label> <input type="text" id="article" name="article" placeholder="" class="form-control" style="padding-bottom: 200px;" onblur="validate(1,'article')"> </div>
                        
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