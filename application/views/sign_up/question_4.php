<?php 
  include 'templates/header.php';
  include 'templates/navbar.php';

    $page_id = 10;
    $this->StatisticsModel->addVisitor($page_id);
?>
    <!-- Start Banner Area -->
    <section class="banner-area relative bgImg2">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-left col-lg-8 col-sm-12 story-content left-text" dir="rtl">
            <h1>
              <span class="sp-1" style="font-size: 50px">
                سؤال
              </span>
            <br>
            <br>
            <h1>
              أي الفئات التالية ترغب البدء بها  
            </h1>
            <br>
            <div class="col-lg-12 book-div">
              <div class="" >
                <div class="container ">
                  <div class="row text-center">
                    <?php
                      foreach ($sections as $section ) {
                        echo'
                          <div class="col-md-3 col-sm-12 book-section">';
                          echo '<img src="'.base_url().'assets/sign_up_assests/img/book.png" class="book-div-img" onclick="nextWithMsg('
                          ;
                          echo "'activity',".$section->num_of_books.")".'"
                          ><br><h1>'. $section->section.'</h1> 
                          </div>
                        ';
                      }//foreach
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
              <img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/wonder.png" alt="" style="width: 80%">
          </div>
        </div>
      </div>
    </section>
    <!-- End Banner Area -->
<?php include 'templates/footer.php';?>
