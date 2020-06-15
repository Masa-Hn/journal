<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة كتاب</h3>
                <ul id="progressbar" class="text-center">
                    <li class="active step0" id="step2"></li>
                    <li class="step0" id="step3"></li>
                    <li class="step0" id="step4"></li>
                </ul>
               

                <fieldset class="show" id="add1">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5>
                        <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label></div>
                           
                 <div class="form-group"> 
                    
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم الكتاب : * </li></label> <input type="text" id="book_name" name="book_name" placeholder="" class="form-control" onblur="validate1(1)"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم الكاتب : * </li></label> <input type="text" id="writer" name="writer" placeholder="" class="form-control" onblur="validate1(2)"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">نبذة عن الكتاب : *</li> </label> <input type="text" id="story" name="story" placeholder="" class="form-control" onblur="validate1(3)" style="padding-bottom: 200px;"> </div>
                       
                        <button id="next2" class="mybutton" onclick="next1();">التالي</button> 
                    </div>
                    </div>
                </fieldset>


                <fieldset  id="add2">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5> <label class="text-danger mb-3">* مطلوب</label>
                        
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">مستوى الكتاب : *</li> </label>
                            <select style="text-align: right;" name="level" id="level" class="form-control" onblur="validate2(1)">
                        <option value="simple">بسيط</option>
                        <option  value="middle">متوسط</option>
                        <option value="hard">عميق</option>
                      </select>
                        </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">تصنيف الكتاب : *</li></label>
                            <select style="text-align: right;" name="class" id="class" class="form-control" onblur="validate2(1)">
                        <option value="history">تاريخي</option>
                        <option  value="islamic">ديني</option>
                      </select>
                        </div>

                         <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">نوع الكتاب : *</li></label>
                            <select style="text-align: right;" name="type" id="type" class="form-control" onblur="validate2(1)">
                        <option value="course">كتاب منهج</option>
                        <option  value="starting">مرحلة تحضيرية</option>
                        <option value="childs">الأطفال</option>
                        <option value="ramadan">رمضان</option>
                        <option value="volanteers">اليافعين</option>

                      </select>
                        </div>


                        <button id="next3" class="mybutton" onclick="next2()">التالي</button> 
                        <button class="mybutton" style="float: right;" onclick="previous2()">السابق</button>
                    </div>
                </fieldset >


                <fieldset id="add3">
                    <div class="form-card">
                         <h5 class="sub-heading mb-4" style="padding-bottom: 4em;">الرجاء إدخال بيانات الكتاب</h5>
                         <div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"> <li style="direction: rtl;">رابط منشور الكتاب : </li></label> <input type="text" id="post_link" name="post_link" placeholder="" class="form-control" > </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">رابط تحميل الكتاب :  </li> </label> <input type="text" id="download_link" name="download_link" placeholder="" class="form-control"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">صورة الكتاب :  </li> </label>

                        <input type="file" onChange="onFileSelected(event)"><br>
                        <div id="img2">
                        <img id="myimage" height="200">
                            </div>
 
                    
                     
                         </div>  
                      <button id="save" class="mybutton" onclick="success()" >حفظ</button> 

                </fieldset>


<fieldset id = "success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة كتاب جديد بنجاح</p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
                            </body>
                     