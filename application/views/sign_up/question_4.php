<?php
  include 'templates/header.php';
  include 'templates/navbar.php';
  $page_id = 10;
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
            <img src="images/question_character.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section" dir="rtl">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8 text-center">
        <h2>
        أي الفئات التالية ترغب البدء بها
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <?php
            foreach ($sections as $section ) {
              if ($section->section == "سير الصحابة") {
                $img = "24";
              }
              else{
                $img=$section->section;
              }
              echo
              ' <div class="col-lg-3 cursor_display">
                  <div class="d-block d-md-flex listing vertical text-center" onclick="nextWithMsg('
              ;
              echo "'activity',".$section->num_of_books.")".'">'
              ;
              echo '<img src="'.base_url().'assets/sign_up_assests/img/'. $img.'.png" alt="Image" class="img-fluid">'
              ;
              echo 
                '   <div class="lh-content text-center">
                      <h3>'. $section->section.' </h3>
                    </div>
                  </div>
                </div>
            ';
          }//foreach
        ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'templates/footer.php';?>