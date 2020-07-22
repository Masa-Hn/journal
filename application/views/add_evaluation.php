
                            <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
 <h3 class="heading" style="color:#008080;">إدخال التقييم الأسبوعي</h3>
 
  <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>Evaluation/add_evaluation">
<fieldset class="show" id="add">
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات التقييم </h5>

                         <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label></div>
                           
                                       <?php echo $this->session->flashdata('msg')?>   

              <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم الأسبوع : * </li></label>
             <input type="text" id="week" name="week" placeholder="" class="form-control" onblur="validate(1,'week')"> </div>
                        
                <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">صورة التقييم : * </li></label> 
                   <input type="file" id="pic" name="pic" onChange="onFileSelected(event)"><br>
                        <div id="img2">
                        <img id="myimage" height="200">
                            </div>
                             </div>
                       
               <button id="save" class="mybutton"  >حفظ</button> 
</div>
                </fieldset>
                <fieldset id = "success">
                    <div class="form-card">
                        <p class="message" >  تم إدخال التقييم الأسبوعي بنجاح  .. </p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
            </form>
</div>
</div>
</div>
</div>
</body>
</html>