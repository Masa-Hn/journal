<style type="text/css">
  .active, .dot:hover {
      background-color: #717171;
}
</style>
<body><?php //foreach($books->result() as $row){ } ?>
<div class="container-fluid px-1 py-5 mx-auto" >
    <div class="row d-flex justify-content-center" >
        <div class="col-xl-5 col-lg-6 col-md-7" >
            <div class="card b-0">
                

                <div id="content" >

<?php 
 $num=$books->num_rows();
 $book=$books->result();
if ($num % 26!=0)
$slides_num=((int) ($num/26)+1);
else
$slides_num=$num/26;
 $s=26; 
 $h=0;
?>  
                    <div class="slideshow-container">
                        <?php for ($j=1;$j<=$slides_num;$j++){
                           
                            ?>   

                        <div class="mySlides" >
                            <script type="text/javascript">
                                var slideIndex = 1;
                                showSlides(slideIndex);
                            </script>        
                      <div class="numbertext" style="color: black; "> <?php echo $j ?> / <?php echo $slides_num ?> </div>

                          <!-- Full-width images with number and caption text -->
                          <div style="padding-top: 30px;">
                            <table style="width: 100%;empty-cells: show;" >
                            <?php for ($i=$h; $i <$s ; $i+=2) { 
                                 
                                ?>
                                <tr style="background-color: #f2f2f2;">
                                    
                                    <td  ><button class="book" style="text-align: right;" 
                                        onclick="show_detailes(
                                           '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->id; ?> ',
                                           '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->name; ?> ',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->writer; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->type; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->section; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->post; ?>',
                                             '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->pic; ?>'
                                            )">
                                   <?php if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->name;?></button></td>
                                    
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>

                                    <td ><button class="book"  style="text-align: right;" 
                                        onclick="show_detailes(
                                        '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->id ?>',
                                        '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->name ?>',
                            ' <?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->writer ?>',
                            '<?php  if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->type ?>',
                            '<?php  if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->section ?>',
                            '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->post ?>',
                            '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->pic ?>'
                            )">      
                            <?php if (isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->name;  ?></button></td>
                                    

                                </tr>
                                <tr>
                                   
                                    <td ><button class="book"  > </button></td>
                                    <td ><button class="book"  > </button></td> 
                                    <td ><button class="book" > </button></td> 
                                    <td ><button class="book" > </button></td> 
                                    <td ><button class="book" > </button></td>
                                </tr>

                            <?php } ?>

                            </table>
<?php
    $h=$h+26;
    $s=$s+26;
?>
                        </div>
                    </div>
                        <?php } ?>
                        <!-- ============================================================== -->
                        <!-- Next and previous buttons -->
                        <!-- ============================================================== -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div><br>
                    <!-- ============================================================== -->
                    <!-- The dots/circles -->
                    <!-- ============================================================== -->

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Book details -->
                <!-- ============================================================== -->
              
                <div id="content2" style="display: none; ">
                   

                   
                         
                    <li style="direction: rtl; text-align: right;">اسم الكتاب : <br>
                        <input   name="name" id="name" readonly style="border: none;background-color: white;"> </li>
                    
                    <li style="direction: rtl; text-align: right;"> اسم الكاتب :<br>
                     <input style="border: none;background-color: white;"  name="writer" id="writer" readonly></li>
                    <li style="direction: rtl; text-align: right;"> نوع الكتاب : <br>  <input style="border: none;background-color: white;"  name="type" id="type" readonly></li>
                    <li style="direction: rtl; text-align: right;"> صنف الكتاب : <br> <input style="border: none;background-color: white;"  name="section" id="section" readonly></li>
                    <li style="direction: rtl; text-align: right;"> رابط منشور الكتاب : <br> <input style="border: none;background-color: white"  name="post" id="post" readonly></li>


                        <a id="image" name="image" class="mybutton" style="width: 190px;float: right;" >
                         <label style="float: right;text-align: center; outline: none; color: #fff;">عرض صورة الكتاب
                         </label> </a>
                         
                         <div style="padding-right: 210px;">
                         <a id="update" class="mybutton" style="width: 190px;float: right;" >
                         <label style=" text-align: center; outline: none; color: #fff;">تعديل بيانات الكتاب
                         </label> </a></div>

                    <button style="float: left; width: 100px;" class="mybutton" onclick="back()" > رجوع </button>

                </div>
            </div>
        </div>
    </div>
</div>
</body>