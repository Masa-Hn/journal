
                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
 <h3 class="heading" style="color:#008080;">إضافة نشاط</h3>
<fieldset class="show" id="add">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات النشاط(الإنجاز) </h5>

                         <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label></div>
                           
                                      

                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم النشاط : * </li></label> <input type="text" id="activity_name" name="activity_name" placeholder="" class="form-control" onblur="validate(1,'activity_name')"> </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">التاريخ : * </li></label> 
                          <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate(2,'date')"> </div>
                       
               <button id="save" class="mybutton" onclick="success()" >حفظ</button> 
</div>
                </fieldset>
                <fieldset id = "success">
                    <div class="form-card">
                        <p class="message" >  تم إضافة نشاط جديد بنجاح  .. </p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
</div>
</div>
</div>
</div>
</body>
</html>