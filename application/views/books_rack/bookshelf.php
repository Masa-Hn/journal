<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">

   <!-- Book Search -->
  <div class="padding" id="section-one">
    <div class="container">
      <div class="row fade-in">
        <div class="text-center">
          <h2> ابحث عن كتابك </h2>
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row fade-in">
        <div class="container-fluid  col-container text-center" >
          <div>
              <div class="box">
                <input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
                <input type="hidden" name="book_type" id="book_type" value="<?php echo $type?>">

                <input class="s-text" dir="rtl" type="text" id="bookName" placeholder="ابحث عن كتابك " name="search2" align="center" oninput="search()">
                  <hr style="width: 70%;    border-top: 1px solid #205d67 !important; display: none;" id="hrLine">
                  <ul id="searchList" style="display: none; list-style: none;">
                    
                  </ul>
                <input type="image" class="s-btn" id="s-btn" src="<?php echo base_url()?>assets/img/img_6.png" onclick="getBook()" >            
              </div>
          </div>
          <div style="text-align: center; margin-top: 5%">
            <span id="choice"> أو </span>
            <a href="<?php echo base_url()?>bookDesc/randomBook?type=<?php echo $type?>"><button id="button" class="btn btn-outline btn-lg button" style="margin-top: 0;margin-bottom: 2%;"> اختر لي كتابًا </button> </a>
          </div>
        </div>
      </div>
    </div>    
  </div>
  <!-- End Book Search -->

  <!-- Most Read -->
  <div class="padding">
    <div class="container">
      <div class="row text-center">
        <h2> الكتب الأكثر قراءة </h2>
        <div class="heading-underline"></div>
      </div>
      <div class="row text-center">
        <div class="col-sm-6 fade-in">
          <img src="<?php echo base_url()?>assets/img/most.png" style="margin-bottom: 3%">
        </div>
        <div class="col-sm-6 text-center ">
        <div id="most" class="carousel slide text-center" data-ride="carousel">
            <div class="carousel-inner">
              <?php
              $active =true; 
              foreach ($mostRead as $row) {
                if($active){
                    echo
                  '<div class="item active">
                    <div class="card" style="text-align: center;">
                      <img class="card-img-top" src="'.$row->pic.'" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title">'.$row->name.'</h3>
                        <a href="'. base_url().'bookDesc?id='.$row->id.'" class="btn book_download">المزيد عن الكتاب </a>
                      </div>
                    </div>
                </div>';   
                $active=false; 
                }
                else{
                    echo
                  '<div class="item">
                    <div class="card" style="text-align: center;">
                      <img class="card-img-top" src="'.$row->pic.'" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title">'.$row->name.'</h3>
                        <a href="'. base_url().'bookDesc?id='.$row->id.'" class="btn book_download">المزيد عن الكتاب </a>
                      </div>
                    </div>
                </div>';
                }
              }
              
              ?>
          
             
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- End Most Read --> 
  
  <div id="fixed">
  </div>

  <!-- New Books -->
  <div class="padding">
    <div class="container">
      <div class="row text-center">
        <h2> آخر الكتب المُضافة</h2>
        <div class="heading-underline"></div>
      </div>
      <div class="row text-center">
        <div class="col-sm-6 fade-in">
          <img src="<?php echo base_url()?>assets/img/new_book.png" style="padding-bottom: 3%; width:90%;">
        </div>
        <div class="col-sm-6 text-center">
        <div id="most" class="carousel slide text-center " data-ride="carousel">
            <div class="carousel-inner">
                <?php
              $active =true; 
              foreach ($newBook as $row) {
                if($active){
                    echo
                  '<div class="item active">
                    <div class="card" style="text-align: center;">
                      <img class="card-img-top" src="'.$row->pic.'" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title">'.$row->name.'</h3>
                        <a href="'. base_url().'bookDesc?id='.$row->id.'" class="btn book_download">المزيد عن الكتاب </a>
                      </div>
                    </div>
                </div>';   
                $active=false; 
                }
                else{
                    echo
                  '<div class="item">
                    <div class="card" style="text-align: center;">
                      <img class="card-img-top" src="'.$row->pic.'" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title">'.$row->name.'</h3>
                        <a href="'. base_url().'bookDesc?id='.$row->id.'" class="btn book_download">المزيد عن الكتاب </a>
                      </div>
                    </div>
                </div>';
                }
              }
              
              ?>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>  
  <!--End New Books -->

<script src="<?php echo base_url()?>assets/js/search.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#bookName").keyup(
        function (e) {
            if (e.keyCode === 13) {
                $("#s-btn").trigger("click");
            }
        }
    );
})
</script>
<script type="text/javascript">
  function getBook(){    
    var bookName= document.getElementById("bookName").value;
    var type= document.getElementById("book_type").value;

    if(bookName != ""){
      window.location.href = document.getElementById("base_url").value+"bookSearch/getByName?name="+bookName+"&type="+type
    }//if
    else{
         window.location.href = document.getElementById("base_url").value+"bookSearch";
    }

}//getBook
</script>