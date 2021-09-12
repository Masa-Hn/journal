<?php
$type="";
if ($book->get_type()==1) $type="كتاب منهج";
if ($book->get_type()==2) $type="كتاب مرحلة تحضيرية";
if ($book->get_type()==3) $type="كتاب أطفال";
if ($book->get_type()==4) $type="كناب رمضان";
if ($book->get_type()==5) $type="كتاب يافعين";
$level="";
if ($book->get_level()==1) $level="بسيط";
if ($book->get_level()==2) $level="متوسط";
if ($book->get_level()==3) $level="عميق";



 ?>
<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">


<div id="content2" >
                   

                         
                    <li style="direction: rtl; text-align: right;">اسم الكتاب : <br>
                        <input  value="<?php echo $book->get_name(); ?>" name="name" id="name" readonly style="border: none;background-color: white; "> </li>
                    
                    <li style="direction: rtl; text-align: right;"> اسم الكاتب :<br>
                     <input value="<?php  echo $book->get_writer();?>" style="border: none;background-color: white;"  name="writer" id="writer" readonly></li>
                    <li style="direction: rtl; text-align: right;"> نوع الكتاب : <br>  <input value="<?php  echo $type;?>" style="border: none;background-color: white;"  name="type" id="type" readonly></li>
                    <li style="direction: rtl; text-align: right;"> مستوى الكتاب : <br>  <input value="<?php  echo $level; ?>" style="border: none;background-color: white;"  name="level" id="level" readonly></li>
                    <li style="direction: rtl; text-align: right;"> صنف الكتاب : <br> <input value="<?php  echo $book->get_section();?>" style="border: none;background-color: white;"  name="section" id="section" readonly></li>
                    
                    <li style="direction: rtl; text-align: right;"> رابط منشور الكتاب : <br>
                     <a href="<?php  echo $book->get_post();?>" name="post" id="post" style="padding-right: 2em; color: #A52A2A" > اضغط هنا<a></li>  <br><br>


                    <li style="direction: rtl; text-align: right;"> رابط صورة الكتاب : <br>

                        <a href="<?php  echo $book->get_pic();?>" id="image" name="image" style="padding-right: 2em; color: #A52A2A" > اضغط هنا</a></li><br><br>
                         
                         <div style="float: right;">
                         <a href="<?php echo base_url()?>AddBooks/index/<?php echo $id?>" id="update" class="mybutton" style="width: 190px;float: right;background-color: #A52A2A" >
                         <label style=" text-align: center; outline: none; color: #fff;">تعديل بيانات الكتاب
                         </label> </a></div>

                          <div style="float: right; padding-right: 10px">
                         <a href="<?php echo base_url()?>AddBooks/delete/<?php echo $book->get_type()?>/<?php echo $id?>" id="delete" class="mybutton" style="width: 150px;float: right;background-color: #A52A2A" >
                         <label style=" text-align: center; outline: none; color: #fff;">حذف الكتاب
                         </label> </a></div>

                   

                </div>
                </div>
                </div>
                </div>
                </div>
                </body>
               