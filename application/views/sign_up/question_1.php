<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 5;
    $this->StatisticsModel->incrementVisitors($page_id);
?>

    <div class="overlay bg-light header_padding" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-lg-8 col-sm-12 text-center">
                <h1 class="header_margin" data-aos="fade-up" dir="rtl">
                  ســـؤال
                </h1>
              </div>
              <div class="col-lg-4 col-sm-12 text-center">
                <img src="<?php echo base_url()?>assets/sign_up_assests/img/question_character.png" alt="Image" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center">
            <h2>
              هل تتذكر عدد الصفحات الأسبوعية
                التي عليك قراءتها للحصول على العلامة الكاملة في القراءة؟
            </h2>
          </div>
        </div>
        <div class="col-lg-12 ">
          <!--<span style="color: red; display: none;" id="error_msg">حاول مُجددًا</span> -->
          <div class="select-wrap">
              <select class="form-control rounded" name="" id="answer" dir="rtl">
                <option value="">اختر عدد الصفحات </option>
                <option value="30">ثلاثون صفحة أسبوعيًا</option>
                <option value="50">خمسون صفحة أسبوعيًا</option>
                <option value="60">ستون صفحة أسبوعيًا</option>
              </select>
          </div>
        </div>

          <div class="col-12 text-center mt-4">
            <a href="javascript:checkAnswer()" class="next_btn btn btn-primary rounded py-2 px-4 text-white">
            التــالي
            </a>
            <a href="javascript:next('page_4')" class="next_btn btn btn-primary rounded py-2 px-4 text-white">
              الســـابق
            </a>
          </div>
        </div>
      </div>
    </div>

<!-- <script type="text/javascript">
  document.querySelector('#answer').addEventListener('input', function(e) {
    if (document.getElementById('error_msg').style.display == "block") {
     document.getElementById('error_msg').style.display="none";
    }
  });
</script> -->
<?php include 'templates/footer.php';?>
