<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080; text-align: center;">إضافة صورة</h3>
                <br>
                <a href="<?php echo base_url()?>AddInfographic/add_series_form"><h6 class="heading" style="color:#dc3545;text-align: end">لإضافة سلسلة اضغط هنا</h6></a>
                <br>
                <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AddInfographic/add_infographic">

                    <fieldset class="show" id="add">
                        <div class="form-card">
                            <h5 class="sub-heading mb-4" >الرجاء إدخال بيانات الانفوجرافيك</h5>
                            <div>
                                <label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label>
                            </div>
                       
                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">عنوان الانفوجرافيك : * </li> 
                                </label> 
                                <input type="text" id="adress_info" name="adress_info" placeholder="" class="form-control" onblur="validate(1,'adress_info')"> 
                            </div>
                            <div class="form-group"> 
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">فئة الانفوجرافيك: * </li>
                                </label> 
                                <?php 
                                    if(!empty($sections)){
                                        echo '
                                            <select id="activity" name="section" class="form-control dropdown-toggle" onchange="addNew(this)" style="direction: rtl;">
                                                    <option value="0" selected=""> اختر الفئة</option>
                                        ';
                                        foreach ($sections as $section) {
                                            echo'<option value="'.$section->get_section().'">'.$section->get_section() .'</option>';
                                        }//foreach
                                        echo '
                                            <option value="-1">غير موجود</option>
                                            </select>
                                        ';
                                    }//if
                                    else{
                                        echo ' 
                                            <input type="hidden" id="show_new_section" value="1">
                                        ';
                                    }
                                ?>
                                    <li id="section_label" style="text-align: right; direction: rtl;display:none">أدخل الفئة الجديدة: * </li>
                                    <input type="text" id="new_section" name="new_section" placeholder="" class="form-control" onblur="validate(1,'section')" style="text-align: right; direction: rtl;display:none">
                            </div>
                        
                            <div class="form-group">
                                <label class="form-control-label" style="float:  right;">
                                    <li style="direction: rtl;">التاريخ : *</li> 
                                </label>
                                <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate(2,'date')" > 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" style="float: right;">
                                    <li style="direction: rtl;">الصورة :  </li>
                                </label>

                                <input type="file" id="info_pic" name="info_pic" onChange="onFileSelected(event)">
                                <br>
                                <div id="img2">
                                    <img id="myimage" height="200">
                                </div>
                            </div> 
                            <button id="save" class="mybutton" onclick="success()" >حفظ</button> 
                        </div>
                    </fieldset>
                </form>

                <fieldset id = "success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة صورة جديدة بنجاح</p>
                        <div class="check">
                            <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('document').ready(function(){
        if( document.getElementById('show_new_section').value == 1){
            document.getElementById('section_label').style.display = "block";
            document.getElementById('new_section').style.display = "block";
        }
    });

    
    function addNew(that) {
        if (that.value == -1) {
            document.getElementById('section_label').style.display = "block";
            document.getElementById('new_section').style.display = "block";

        }//if
        else{
            document.getElementById('section_label').style.display = "none";
            document.getElementById('new_section').style.display = "none";            
        }
    }//addNew
</script>