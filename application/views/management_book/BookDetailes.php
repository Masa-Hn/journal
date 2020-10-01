
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                
                <!-- ============================================================== -->
                <!-- Book details -->
                <!-- ============================================================== -->
          <?php  $book=$book->result(); ?>
    
                <div id="content2" >
                    <li style="direction: rtl; text-align: right;">اسم الكتاب : <br>
                        <label  name="name" id="name" > <?php echo $book[0]->name ?> </label></li>
                    
                    <li style="direction: rtl; text-align: right;"> اسم الكاتب :<br>
                     <label   name="writer" id="writer" ><?php echo $book[0]->writer?> </label></li>
                    <li style="direction: rtl; text-align: right;"> نوع الكتاب : <br>  
                      <label  name="type" id="type" ><?php  
                                if($book[0]->type==1) echo 'كتاب منهج';
                                 if($book[0]->type==2)   echo'كتاب مرحلة تحضيرية';
                                if($book[0]->type==3)    echo'كتاب أطفال';
                                if($book[0]->type==4)    echo'كتاب رمضان';
                                if($book[0]->type==5)    echo'كتاب يافعين';?></label></li>
                    <li style="direction: rtl; text-align: right;"> مستوى الكتاب : <br>  
                      <label   name="level" id="level" ><?php 
                      if($book[0]->level==1)  echo 'بسيط';
                 if($book[0]->level==2)   echo 'متوسط';
                if($book[0]->level==3)   echo 'عميق'; ?> </label></li>
                    <li style="direction: rtl; text-align: right;"> صنف الكتاب : <br>
                     <label   name="section" id="section" ><?php echo $book[0]->section ?></label></li>
                    
                    <li style="direction: rtl; text-align: right;"> رابط منشور الكتاب : <br>
                     <a href="<?php echo $book[0]->post ?>" name="post" id="post" style="padding-right: 2em; color: #A52A2A" > اضغط هنا<a></li>  <br><br>


                    <li style="direction: rtl; text-align: right;"> رابط صورة الكتاب : <br>

                        <a href="<?php echo $book[0]->pic ?>" id="image" name="image" style="padding-right: 2em; color: #A52A2A" > اضغط هنا</a></li><br><br>
                         
                        
                    <a style="float: left; width: 100px;" class="mybutton" href="javascript:window.history.go(-1);" > رجوع </a>

                </div>
            </div>
        </div>
    </div>
</div>
</body>