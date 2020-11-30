<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="card b-0">
                    <h3 class="heading" style="color:#008080;">إضافة نشاط</h3>
                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>AddActivity/add_activity">
                        <fieldset class="show" id="add">
                            <div class="form-card">
                                <h5 class="sub-heading mb-4">الرجاء إدخال بيانات النشاط(الإنجاز) </h5>
                                <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label></div>
                                
                                <div class="form-group" dir="rtl">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">اسم النشاط : * </li>
                                    </label>
                                    <?php 
                                        if(!empty($allActivities)){
                                            echo '
                                                <select id="activity" name="activity_name" class="form-control dropdown-toggle" onchange="addNew(this)">
                                                    <option value="0" selected=""> اختر النشـاط</option>
                                                ';
                                            foreach ($allActivities as $activity) {
                                                echo'<option value="'.$activity->name.'">'.$activity->name .'</option>';
                                            }//foreach
                                        
                                        }//if
                                    ?>
                                                <option value="-1">غير موجود</option>
                                                </select>
                                    <li id="activity_name_label" style="direction: rtl;display:none">أدخل اسم النشاط : * </li>
                                    <input type="text" id="new_activity_name" name="new_activity_name" placeholder="" class="form-control" onblur="validate(1,'activity_name')" style="display:none">
                                </div>
                                <div class="form-group">    
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">رقم نسخة النشاط : * </li>
                                    </label> 
                                    <input type="number" id="copy" name="copy" placeholder="" class="form-control" onblur="validate(2,'copy')">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" style="float: right;">
                                        <li style="direction: rtl;">صور التكريمات : * </li>
                                    </label> 
                                    <input type='file' name='files[]' multiple > <br/><br/>
                                </div>

                                <button id="save" class="mybutton" >حفظ</button> 
                            </div>
                        </fieldset>
                        <fieldset id = "success">
                            <div class="form-card">
                                <p class="message" >  تم إضافة نشاط جديد بنجاح  .. </p>
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
            document.getElementById('activity_name_label').style.display = "block";
            document.getElementById('new_activity_name').style.display = "block";

        }//if
        else{
            document.getElementById('activity_name_label').style.display = "none";
            document.getElementById('new_activity_name').style.display = "none";            
        }
    }//addNew
</script>