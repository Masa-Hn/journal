<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="card b-0">
                    <h3 class="heading" style="color:#008080;">إضافة سلسلة</h3>
                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AddInfographic/add_series">
                        <fieldset class="show" id="add">
                            <div class="form-card">
                                <h5 class="sub-heading mb-4">أدخل بيانات السلسة</h5>
                                <div>
                                    <label style="padding-bottom: 2em;" class="text-danger mb-3" >مطلوب *</label>
                                </div>
                                
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">عنوان  السلسلة : * </li> 
                                    </label> 
                                    <input type="text" id="title" name="title" placeholder="" class="form-control" onblur="validate(1,'title')"> 
                                </div>
                                <div class="form-group"> 
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">فئة  السلسلة: * </li>
                                    </label> 
                                    <?php 
                                        if(!empty($sections)){
                                            echo '
                                                <select id="activity" name="section" class="form-control dropdown-toggle" onchange="addNew(this)" style="direction: rtl;">
                                                        <option value="0" selected=""> اختر الفئة</option>
                                            ';
                                            foreach ($sections as $section) {
                                                echo'<option value="'.$section->section.'">'.$section->section .'</option>';
                                            }//foreach
                                            echo '
                                                <option value="-1">غير موجود</option>
                                            </select>
                                            ';
                                        }//if
                                    ?>
                                                
                                    <li id="section_label" style="text-align: right; direction: rtl;display:none">أدخل الفئة الجديدة: * </li>
                                    <input type="text" id="new_section" name="new_section" placeholder="" class="form-control" onblur="validate(1,'section')" style="text-align: right; direction: rtl;display:none">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">صور السلسلة * </li>
                                    </label> 
                                    <input type='file' name='files[]' multiple > <br/><br/>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">االصورة الأولى للسلسلة:  *</li>
                                    </label>

                                    <input type="file" id="first_pic" name="first_pic" onChange="onFileSelected(event)">
                                    <br>
                                    <div id="img2">
                                        <img id="myimage" height="200">
                                    </div>
                                </div>
                                <button id="save" class="mybutton" >حفظ</button> 
                            </div>
                        </fieldset>
                        <fieldset id = "success">
                            <div class="form-card">
                                <p class="message" > تم إضافة السلسلة بنجاح  ..</p>
                                <div class="check"> 
                                    <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
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