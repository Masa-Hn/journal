
                      

                    
    <body>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;">إضافة مقال</h3>
               
   
                <fieldset class="show" id="add">
         <form  enctype="multipart/form-data" method="post" action="<?=base_url()?>Management_book/add_article2">   


              <div class="form-card">
                        <h5 class="sub-heading mb-4">الرجاء إدخال بيانات المقال</h5>
                         <div><label style="padding-bottom: 4em;" class="text-danger mb-3" >* مطلوب</label></div>
                           
                 <div class="form-group"> 
                    
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم المقال : * </li></label> <input type="text" id="article_name" name="article_name" placeholder="" class="form-control" onblur="validate(1,'article_name')"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">اسم كاتب المقال : * </li></label> <input type="text" id="writer" name="writer" placeholder="" class="form-control" onblur="validate(2,'writer')"> </div>
                        <div class="form-group"> <label class="form-control-label" style="float:  right;"><li style="direction: rtl;">التاريخ : *</li> </label> <input type="date" id="date" name="date" placeholder="" class="form-control" onblur="validate(3,'date')" > </div>
                       
                   
                         <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

                    
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">المقال :  </li> </label> <input type="text" id="article" name="article" placeholder="" class="form-control" style="padding-bottom: 200px;" onblur="validate(1,'article')"> </div>
                        
                        <div class="form-group"> <label class="form-control-label" style="float: right;"><li style="direction: rtl;">صورة المقال :  </li> </label>

                        <input type="file" id="article_img" name="article_img" onChange="onFileSelected(event)"><br>
                        <div id="img2">
                        <img id="myimage" height="200">
                            </div>
  
                         </div>  
                 
</div>
</div>

                      <button  id="save"  name="save" class="mybutton" onclick="success()" >حفظ</button>
                    
    </form>
</fieldset>

            </div>
        </div>
    </div>
</div>
                            </body>
                        </html>