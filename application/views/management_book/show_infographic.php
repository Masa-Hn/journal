<style type="text/css">
  .active, .dot:hover {
      background-color: #717171;
}
</style>
<body><?php //foreach($books->result() as $row){ } ?>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <!-- ============================================================== -->
                <!-- Type of books -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Table of books -->
                <!-- ============================================================== -->
                  <div id="content" >

<?php 
 $num=$imgs->num_rows();
 $img=$imgs->result();
if ($num % 26!=0)
$slides_num=((int) ($num/26)+1);
else
$slides_num=$num/26;
 $s=26; 
 $h=0;
?>  
 <?php echo $this->session->flashdata('msg')?>  

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
                                    
                                    <td  ><button class="book" style="text-align: center;" 
                                        onclick="show_detailes_graphic(

                                           '<?php  if(isset($img[$i]) && $img[$i]!=null) echo $img[$i]->id; ?> ',
                                           '<?php  if(isset($img[$i]) && $img[$i]!=null) echo $img[$i]->pic; ?> ',
                                            '<?php  if(isset($img[$i]) && $img[$i]!=null) echo $img[$i]->date; ?>',
                                            '<?php  if(isset($img[$i]) && $img[$i]!=null) echo $img[$i]->title; ?>'

                                           
                                            )">
                                   <?php if(isset($img[$i]) && $img[$i]!=null) echo $img[$i]->title;?></button></td>
                                    
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>

                                    <td ><button class="book"  style="text-align: center;" 
                                        onclick="show_detailes_graphic(
                                        '<?php   if(isset($img[$i+1]) && $img[$i+1]!=null) echo $img[$i+1]->id ?>',
                                        '<?php   if(isset($img[$i+1]) && $img[$i+1]!=null) echo $img[$i+1]->pic ?>',
                                       ' <?php   if(isset($img[$i+1]) && $img[$i+1]!=null) echo $img[$i+1]->date ?>',
                                       ' <?php   if(isset($img[$i+1]) && $img[$i+1]!=null) echo $img[$i+1]->title ?>'

                            
                            )">      
                            <?php if (isset($img[$i+1]) && $img[$i+1]!=null) echo $img[$i+1]->title;  ?></button></td>
                                    

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
                   

                   
                         
                    <li style="direction: rtl; text-align: right;">عنوان الانفوجرافيك : <br>
                        <input   name="title" id="title" readonly style="border: none;background-color: white;"> </li>
                    
                    <li style="direction: rtl; text-align: right;"> تاريخ الإضافة :<br>
                     <input style="border: none;background-color: white;"  name="date" id="date" readonly></li>
                    <li style="direction: rtl; text-align: right;"> الصورة : <br>                       
                <img name="pic" id="pic" style=" height: 40%;width: 50%" onclick="window.open(this.src)" > </li>  <br><br>
</li>
                   
                         
                         <div style="float: right;">
                         <a id="delete" class="mybutton" style="width: 190px;float: right;background-color: #A52A2A" >
                         <label style=" text-align: center; outline: none; color: #fff;">حذف الانفوجرافيك
                         </label> </a></div>

                    <button style="float: left; width: 100px;" class="mybutton" onclick="back()" > رجوع </button>

                </div>
            </div>
        </div>
    </div>
</div>
</body>