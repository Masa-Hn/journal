<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>

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

<?php if (!$this->uri->segment(3)){?>

            	<div id="radio">  

                    <h4 class="heading" style="text-align: center;" >نوع الكتب التي تود استعراضها</h4>
                   
                    <div style=" text-align: center;  padding-bottom: 15em;padding-top: 4em">



                       <label style=" padding-bottom: 20px">                     
                        <a id="type" name="type" class="mybutton" style="width: 300px"  
                        href="<?php echo base_url()?>AddBooks/show_book/1"  >  
                         <label style="text-align: center; text-decoration: none; outline: none; color: #fff;">كتب المنهج</label> </a></label>

                        <label style=" padding-bottom: 20px">
                        <a id="type" name="type" class="mybutton" style="width: 300px" 
                        href="<?php echo base_url()?>AddBooks/show_book/2">  
                         <label style="text-align: center; text-decoration: none; outline: none; color: #fff;">كتب المرحلة التحضيرية</label> </a></label>

                        <label style="padding-bottom: 20px">
                         <a id="type" name="type" class="mybutton" style="width: 300px"  
                         href="<?php echo base_url()?>AddBooks/show_book/3">  
                         <label style="text-align: center; text-decoration: none; outline: none; color: #fff;">كتب الأطفال</label> </a></label>

                        <label style="padding-bottom: 20px">
                        <a id="type" name="type" class="mybutton" style="width: 300px"  
                        href="<?php echo base_url()?>AddBooks/show_book/4">  
                         <label style="text-align: center; text-decoration: none; outline: none; color: #fff;">كتب رمضان</label> </a></label>
                        
                        <label style="padding-bottom: 20px">
                         <a id="type" name="type" class="mybutton" style="width: 300px"  
                         href="<?php echo base_url()?>AddBooks/show_book/5" >  
                         <label style="text-align: center; text-decoration: none; outline: none; color: #fff;">كتب اليافعين</label> </a></label>
                    </div>
                            </div>
<?php } ?>
                <!-- ============================================================== -->
                <!-- Table of books -->
                <!-- ============================================================== -->
                <?php if ($this->uri->segment(3)){?>
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
<input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
<?php echo $type;?>
<div class="padding" id="section-one">
    <div class="container">
      <div class="row fade-in">
        <div class="text-center">
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row fade-in">
        <div class="container-fluid  col-container text-center" >
          <div>
            <div class="box">
              <input type="hidden" name="id" id="base_url" value="<?php echo base_url();?>">
              <input type="hidden" name="book_type" id="book_type" value="<?php echo $type;?>">

              <input class="s-text" dir="rtl" type="text" id="bookName" placeholder="ابحث عن كتابك " name="search2" align="center" oninput="search()">
                <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
                <ul id="searchList" style="display:contents !important;  list-style: none; justify-content: center;">
                  
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function search(input) {
  var input = document.getElementById("bookName");

  var bookName= document.getElementById("bookName").value;
  var type= document.getElementById("book_type").value;

    $.ajax({
      type: "POST",
        url:document.getElementById("base_url").value+"AddBooks/searchByName",
        data: {'bookName':bookName,'type': type},
            success: function(data){
            if (data != "") {              
            document.getElementById("hrLine").style.display='block';
           
            document.getElementById("searchList").style.display='contents';
            document.getElementById("searchList").innerHTML =data;
            // console.log(data);
            }
            else{
              document.getElementById("hrLine").style.display='none';
              document.getElementById("searchList").style.display='none';
              

            }             

            //console.log($scope.books);
            }//success
      });
  
 }//search

  </script>
                    <div class="slideshow-container">
                       <?php echo $this->session->flashdata('msg')?>  

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
                                        onclick="show_detailes(
                                           '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->id; ?> ',
                                           '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->name; ?> ',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->writer; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->type; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->level; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->section; ?>',
                                            '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->post; ?>',
                                             '<?php  if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->pic; ?>'
                                            )">
                                   <?php if(isset($book[$i]) && $book[$i]!=null) echo $book[$i]->name;?></button></td>
                                    
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>
                                    <td ><button class="book"  >&nbsp; </button></td>

                                    <td ><button class="book"  style="text-align: center;" 
                                        onclick="show_detailes(
                                        '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->id ?>',
                                        '<?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->name ?>',
                            ' <?php   if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->writer ?>',
                            '<?php  if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->type ?>',
                            '<?php  if(isset($book[$i+1]) && $book[$i+1]!=null) echo $book[$i+1]->level ?>',
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
                    <li style="direction: rtl; text-align: right;"> مستوى الكتاب : <br>  <input style="border: none;background-color: white;"  name="level" id="level" readonly></li>
                    <li style="direction: rtl; text-align: right;"> صنف الكتاب : <br> <input style="border: none;background-color: white;"  name="section" id="section" readonly></li>
                    
                    <li style="direction: rtl; text-align: right;"> رابط منشور الكتاب : <br>
                     <a name="post" id="post" style="padding-right: 2em; color: #A52A2A" > اضغط هنا<a></li>  <br><br>


                    <li style="direction: rtl; text-align: right;"> رابط صورة الكتاب : <br>

                        <a id="image" name="image" style="padding-right: 2em; color: #A52A2A" > اضغط هنا</a></li><br><br>
                         
                         <div style="float: right;">
                         <a id="update" class="mybutton" style="width: 190px;float: right;background-color: #A52A2A" >
                         <label style=" text-align: center; outline: none; color: #fff;">تعديل بيانات الكتاب
                         </label> </a></div>

                          <div style="float: right; padding-right: 10px">
                         <a id="delete" class="mybutton" style="width: 150px;float: right;background-color: #A52A2A" >
                         <label style=" text-align: center; outline: none; color: #fff;">حذف الكتاب
                         </label> </a></div>

                    <button style="float: left; width: 100px;" class="mybutton" onclick="back()" > رجوع </button>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>