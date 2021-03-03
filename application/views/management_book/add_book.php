<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة كتاب</h3>
                <ul id="progressbar" class="text-center">
                    <li style="width: 33%;" class="active step0" id="step2"></li>
                    <li style="width: 33%;" class="step0" id="step3"></li>
                    <li style="width: 33%;" class="step0" id="step4"></li>
                </ul>


  
                <div style="text-align: right;">
                    للحصول على ملف الكتب المقترحة 
                    <a href="<?php echo base_url()?>/Export/GetSuggestions">اضغط هنا </a>
                </div>
                <!-- ============================================================== -->
                <!-- Start Form Add Book  -->
                <!-- ============================================================== --><?php if(!isset($book)){ ?>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AddBooks/insert">
                
                    <fieldset class="show" id="add1">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5>
                            <div><label style="padding-bottom: 4em;" class="text-danger mb-3">* مطلوب</label></div>
                            <?php echo $this->session->flashdata('msg')?>   
                            
                            <div class="form-group"> 
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">اسم الكتاب : *</li>
                                    </label> 
                                    <input type="text" id="book_name" name="name" placeholder="" class="form-control" onblur="validate(1,'book_name')"> 
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">اسم الكاتب : *</li>
                                    </label> 
                                    <input type="text" id="writer" name="writer" placeholder="" class="form-control" onblur="validate(2,'writer')"> 
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float:  right;">
                                        <li style="direction: rtl;">نبذة عن الكتاب : *</li> 
                                    </label>
                                    <textarea id="story" name="brief" class="form-control"onblur="validate(3,'story')" rows="8"></textarea> 
                                </div>
                                
                                <button id="next2" class="mybutton" onclick="next1();" type="button">التالي</button> 
                            </div>
                        </div>
                    </fieldset>
                    <!-- ============================================================== -->
                    <!-- Section 2 -->
                    <!-- ============================================================== -->
                    <fieldset id="add2">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5> 
                            <label class="text-danger mb-3">* مطلوب</label>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">مستوى الكتاب : *</li> 
                                </label>
                                <select style="text-align: right;" name="level" id="level" class="form-control" onblur="validate(1,'level')">
                                    <option value="1">بسيط</option>
                                    <option value="2">متوسط</option>
                                    <option value="3">عميق</option>
                                </select>
                            </div>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">نوع الكتاب : *</li>
                                </label>
                                <select style="text-align: right;" name="section" id="class" class="form-control" onblur="validate(2,'class')">
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
                            </div>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">تصنيف الكتاب : *</li>
                                </label>
                                <select style="text-align: right;" name="type" id="type" class="form-control" onblur="validate(3,'type')">
                                    <option value="1">كتاب منهج</option>
                                    <option value="2">المرحلة التحضيرية</option>
                                    <option value="3">الأطفال</option>
                                    <option value="4">رمضان</option>
                                    <option value="5">اليافعين</option>
                                </select>
                            </div>

                            <button id="next3" class="mybutton" onclick="nextnext()" type="button">التالي</button> 
                            <button class="mybutton" style="float: right;" onclick="previous2()" type="button">السابق</button>
                        </div>
                    </fieldset>
                    <!-- ============================================================== -->
                    <!-- Section 3 -->
                    <!-- ============================================================== -->
                    <fieldset id="add">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4" style="padding-bottom: 4em;">الرجاء إدخال بيانات الكتاب</h5>
                            <div>
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;"> 
                                        <li style="direction: rtl;">رابط منشور الكتاب :</li>
                                    </label> 
                                    <input type="text" id="post_link" name="post_link" placeholder="" class="form-control" > 
                                </div>

                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">رابط تحميل الكتاب :</li> 
                                    </label> 
                                    <input type="text" id="download_link" name="download_link" placeholder="" class="form-control"> 
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">رابط صورة الكتاب :</li> 
                                    </label>
                                    <input type="text" id="img_link" name="img_link" placeholder="" class="form-control"> 
                                </div>  
                                <!--
                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">ارفع الكتاب :</li> 
                                    </label>
                                    <input type="text" id="img_link" name="img_link" placeholder="" class="form-control"> 
                                    <input type="file" onChange="onFileSelected(event)"><br>
                                    <div id="img2">
                                        <img id="myimage" height="200">
                                    </div>
                                </div> -->

                                <button id="save" class="mybutton"  name="insert10">حفظ</button> 
                            </div>
                        </div>
                    </fieldset>
                </form><?php }?>
                <!-- ============================================================== -->
                <!-- End Form Add Book  -->
                <!-- ============================================================== --><?php 
                if(isset($book)){  
 ?>
                    
                <!-- ============================================================== -->
                <!-- Start Form Edit Book  -->
                <!-- ============================================================== --> 
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AddBooks/update" dir="rtl">
                
                    <fieldset class="show" id="add1">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5>
                            <div><label style="padding-bottom: 4em;" class="text-danger mb-3">* مطلوب</label></div>
                            <?php echo $this->session->flashdata('msg')?>   
                            
                            <div class="form-group"> 
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">اسم الكتاب : *</li>
                                    </label> 
                                    <input type="text" id="book_name" name="name" value="<?php echo $book->get_name()?>" class="form-control" onblur="validate(1,'book_name')"> 
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">اسم الكاتب : *</li>
                                    </label> 
                                    <input type="text" id="writer" name="writer" value="<?php echo $book->get_writer()?>" class="form-control" onblur="validate(2,'writer')"> 
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float:  right;">
                                        <li style="direction: rtl;">نبذة عن الكتاب : *</li> 
                                    </label>
                                    <textarea id="story" name="brief" class="form-control"onblur="validate(3,'story')" rows="8"><?php echo $book->get_brief()?></textarea>
                                </div>
                                
                                <button id="next2" class="mybutton" onclick="next1();" type="button">التالي</button> 
                            </div>
                        </div>
                    </fieldset>
                    <!-- ============================================================== -->
                    <!-- Section 2 -->
                    <!-- ============================================================== -->
                    <fieldset id="add2">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4">الرجاء إدخال بيانات الكتاب</h5> 
                            <label class="text-danger mb-3">* مطلوب</label>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">مستوى الكتاب : *</li> 
                                </label>
                                <select style="text-align: right;" name="level" id="level" class="form-control" onblur="validate(1,'level')">
                                    <option value="1" <?php if($book->get_level() == 1) echo 'selected';?>>بسيط</option>
                                    <option value="2" <?php if($book->get_level() == 2) echo 'selected';?>>متوسط</option>
                                    <option value="3" <?php if($book->get_level() == 3) echo 'selected';?>>عميق</option>
                                </select>
                            </div>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">نوع الكتاب : *</li>
                                </label>
                                <select style="text-align: right;" name="section" id="class" class="form-control" onblur="validate(2,'class')">
                                    <option <?php if($book->get_section() == 'تاريخي') echo 'selected';?> value="تاريخي">تاريخي</option>
                                    <option <?php if($book->get_section() == 'ديني') echo 'selected';?> value="ديني">ديني</option>
                                    <option <?php if($book->get_section() == 'إقتصادي') echo 'selected';?> value="إقتصادي">إقتصادي</option>
                                    <option <?php if($book->get_section() == 'أدبي') echo 'selected';?> value="أدبي">أدبي</option>
                                    <option <?php if($book->get_section() == 'اجتماعي') echo 'selected';?> value="اجتماعي">اجتماعي</option>
                                    <option <?php if($book->get_section() == 'تنمية') echo 'selected';?> value="تنمية">تنمية</option>
                                    <option <?php if($book->get_section() == 'تربية') echo 'selected';?> value="تربية">تربية</option>
                                    <option <?php if($book->get_section() == 'سير الصحابة') echo 'selected';?> value="سير الصحابة">سير الصحابة</option>
                                    <option <?php if($book->get_section() == 'سياسي') echo 'selected';?> value="سياسي">سياسي</option>
                                    <option <?php if($book->get_section() == 'فكري') echo 'selected';?> value="فكري">فكري</option>
                                    <option <?php if($book->get_section() == 'علمي') echo 'selected';?> value="علمي">علمي</option>
                                    <option <?php if($book->get_section() == 'عسكري') echo 'selected';?> value="عسكري">عسكري</option>
                                    <option <?php if($book->get_section() == 'خيال علمي/ أطفال') echo 'selected';?> value="خيال علمي/ أطفال">خيال علمي/ أطفال</option>
                                    <option <?php if($book->get_section() == '>قصص صحابة/ أطفال') echo 'selected';?> value="قصص صحابة/ أطفال">قصص صحابة/ أطفال</option>
                                    <option <?php if($book->get_section() == 'انجليزي') echo 'selected';?> value="انجليزي">انجليزي</option>
                                </select>
                            </div>

                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">تصنيف الكتاب : *</li>
                                </label>
                                <select style="text-align: right;" name="type" id="type" class="form-control" onblur="validate(3,'type')">
                                    <option value="1" <?php if($book->get_type() == 1) echo 'selected';?>>كتاب منهج</option>
                                    <option value="2" <?php if($book->get_type() == 2) echo 'selected';?>>المرحلة التحضيرية</option>
                                    <option value="3" <?php if($book->get_type() == 3) echo 'selected';?>>الأطفال</option>
                                    <option value="4" <?php if($book->get_type() == 4) echo 'selected';?>>رمضان</option>
                                    <option value="5" <?php if($book->get_type() == 5) echo 'selected';?>>اليافعين</option>
                                </select>
                            </div>

                            <button id="next3" class="mybutton" onclick="nextnext()" type="button">التالي</button> 
                            <button class="mybutton" style="float: right;" onclick="previous2()" type="button">السابق</button>
                        </div>
                    </fieldset>
                    <!-- ============================================================== -->
                    <!-- Section 3 -->
                    <!-- ============================================================== -->
                    <fieldset id="add">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4" style="padding-bottom: 4em;">الرجاء إدخال بيانات الكتاب</h5>
                            <div>
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;"> 
                                        <li style="direction: rtl;">رابط منشور الكتاب :</li>
                                    </label> 
                                    <input type="text" id="post_link" name="post_link" value="<?php echo $book->get_post()?>" class="form-control" > 
                                </div>

                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">رابط تحميل الكتاب :</li> 
                                    </label> 
                                    <input type="text" id="download_link" name="download_link" value="<?php echo $book->get_link()?>" class="form-control"> 
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">رابط صورة الكتاب :</li> 
                                    </label>
                                    <input type="text" id="img_link" name="img_link" value="<?php echo $book->get_pic()?>" class="form-control"> 
                                </div>  
                                <!--
                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">ارفع الكتاب :</li> 
                                    </label>
                                    <input type="text" id="img_link" name="img_link" placeholder="" class="form-control"> 
                                    <input type="file" onChange="onFileSelected(event)"><br>
                                    <div id="img2">
                                        <img id="myimage" height="200">
                                    </div>
                                </div> -->
                                <input type="hidden" name="bid" value="<?php echo $book->get_id()?>">
                                <input type="hidden" name="update">
                                <button id="save" class="mybutton" >حفظ</button> 
                            </div>
                        </div>
                    </fieldset>
                </form>
                <!-- ============================================================== -->
                <!-- End Form Add Book  -->
                <!-- ============================================================== -->   
                <?php }?>    
                    
                <fieldset id="success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة كتاب جديد بنجاح</p>
                        <div class="check"><img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"></div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
</body>
                     