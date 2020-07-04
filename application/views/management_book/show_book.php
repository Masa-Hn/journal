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
            	<div id="radio"> 
                    <h4 class="heading" style="text-align: right;" >نوع الكتب التي تود استعراضها</h4>
                    <div style="padding-right: 20%;padding-bottom: 15em;padding-top: 4em">
                        <label style="float: right; direction: rtl;">
                        <button class="mybutton" style="width: 300px" onclick="type_book()">كتب المنهج</button><br></label> 

                        <label style="float: right; direction: rtl;">
                        <button class="mybutton" style="width: 300px" onclick="type_book()">كتب المرحلة التحضيرية</button><br></label>

                        <label style="float: right; direction: rtl;">
                        <button class="mybutton" style="width: 300px" onclick="type_book()">كتب الأطفال</button><br></label>

                        <label style="float: right; direction: rtl;">
                        <button class="mybutton" style="width: 300px" onclick="type_book()">كتب رمضان</button><br></label>
                        
                        <label style="float: right; direction: rtl;">
                        <button class="mybutton" style="width: 300px" onclick="type_book()">كتب اليافعين</button><br></label>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table of books -->
                <!-- ============================================================== -->
                <div id="content" style="display: none;">
                    <div class="slideshow-container">
                        <div class="mySlides">
                            <script type="text/javascript">
                                var slideIndex = 1;
                                showSlides(slideIndex);
                            </script>
                            <!-- Full-width images with number and caption text -->
                            <table style="width: 100%;" >
                            <?php for ($i=1; $i <=30 ; $i+=4) { ?>

                                <tr style="background-color: #f2f2f2;">
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
                                </tr>
                                <tr>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
                                </tr>

                            <?php } ?>
                            </table>
                        </div>
                        <div class="mySlides">

                            <table style="width: 100%;" >
                            <?php for ($i=33; $i <=60 ; $i+=4) { ?>

                                <tr style="background-color: #f2f2f2;">
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
                                </tr>
                                <tr>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
                                    <td ><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
                                </tr>

                            <?php } ?>
                            </table>
                        </div>

                        <div class="mySlides">

                            <table style="width: 100%;" >
                            <?php for ($i=61; $i <=90 ; $i+=4) { ?>

                                <tr style="background-color: #f2f2f2;">
                                    <td><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i ?></button></td>
                                    <td><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+1 ?></button></td>
                                </tr>
                                <tr>
                                    <td><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+2 ?></button></td>
                                    <td><button class="book" style="float: right;" onclick="show_detailes()">إلى الجيل الصاعد <?php echo $i+3 ?></button></td>
                                </tr>

                            <?php } ?>
                            </table>
                        </div>
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
                <div id="content2" style="display: none;">
                    <li style="direction: rtl; float: right;"> اسم الكتاب : إلى الجيل الصاعد</li><br><br>
                    <li style="direction: rtl; float: right;"> اسم الكاتب : أحمد بن يوسف السيد</li><br><br>
                    <li style="direction: rtl; float: right;"> نوع الكتاب : كتاب منهج</li><br><br>
                    <li style="direction: rtl; float: right;"> صنف الكتاب : فكري ديني</li><br><br>
                    <li style="direction: rtl; float: right;"> رابط منشور الكتاب :</li><br><br>


                    <button style="float: right;width: 300px;" class="mybutton" onclick="change_pic()" > عرض صورة الكتاب </button>
                    <button style="float: left; width: 100px;" class="mybutton" onclick="back()" > رجوع </button>

                </div>
            </div>
        </div>
    </div>
</div>
</body>