  <!-- Who We Are -->
  <div class="padding" id="section-one">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 slide-in from-left">
          <img src="<?php echo base_url()?>assets/img/who.png">
        </div>
        <div class="col-sm-6 text-center slide-in from-right ">
          <h2> من نحن؟</h2>
          <div class="heading-underline"></div>
          <p style="font-size: 25px">
            المشروع الأكبر عربيا لصناعة القراء <br>
            عن طريق استثمار القراءة المنهجية ونواتجها <br>
            لصناعة مجتمع واع قادر على الوصول للنهضة <br>
              وتحقيق التنمية مستعينين بالتكنولوجيا الحديثة
          </p>
        </div>
      </div>
    </div>
  </div> 
  <!-- End Who We Are -->
 
  <!-- Our Vision -->
  <div class="padding">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center fade-in ">
          <h2>رؤيتنا </h2>
          <div class="heading-underline"></div>
          <p>
            <i class="fas fa-quote-right fa" style="color: #205d67"></i>
             تمكين الأمة من صناعة مجتمع صاحب وعي وفكر قويم، يرتفع عنده التعليم الصفري لمرحلة تتعدى ما يضر الفرد الجهل به من الثقافة الجمعية الفكرية و التعاملية .
          </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 fade-in">
          <h2>  رسالتنا </h2>
          <div class="heading-underline"></div>
          <p>
            <i class="fas fa-quote-right fa" style="color: #205d67"></i>
            المشروع الأكبر عالميا في صناعة الوعي الفردي و المجتمعي عن طريق استثمار القراءة المنهجية و الاستخدام الأمثل لنتاجها.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Vision -->
  <div id="fixed">
  </div>

  <div class="padding">
    <div class="container">
    </div>
  </div>
  
  <!-- Video -->
  <div class="padding" id="video">
    <div class="container">
      <div class="row fade-in">
        <div class="container-fluid text-center">
          <img src="<?php echo base_url()?>assets/img/video.png" class="video_icon">
          <br>
          <h2> فيديو تعريفي للمشروع </h2>
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row fade-in">
        <div class="video">
            <div class="video-wrap text-center">
              <iframe width="800" height="450" src="https://www.youtube.com/embed/G7kvdsbt8Fo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <!--<video class="video_play" controls="button" poster='<?php echo base_url()?>assets/img/who.png' playinline>
                <source src="<?php echo base_url()?>assets/vedio/Osboha.mp4" type="">
              </video>-->
            </div>
        </div>
      </div>    
    </div>    
  </div>
  <!--End Video -->

  <!-- Owner -->
  <div class="col-12 text-center">
    <h2> مؤسس المشروع </h2>
    <div class="heading-underline"></div>
  </div>
  <div class="padding">
    <div class="container">
      <div class="col-md-12 owner">
        <div class="row">
          <div class="col-md-3 fade-in">
            <img class="owner-img" src="<?php echo base_url()?>assets/img/owner.png">
          </div>      
          <div class="col-md-9 fade-in">
            <p>
            <b> الاسم </b> : أحمد علاء الشمري.
            <br>
            <b>مواليد  </b>: مواليد العاصمة بغداد بتاريخ (١٩٩٢م).
            <br>
           <b> االتخصص العلمي  </b>: أخصائي في جراحة وأمراض اللثة و زراعة الأسنان بحمله لشهادة الماجستير 
            <br>
            كما أنه يحمل بكلوريوس طب وجراحة الأسنان من جامعة العلوم والتكنولوجيا الأردنية.
            </p>
            <b><h4> تجارب قيادية </h4></b>
            <ul>
              <li> عضو في بعض الأفرقة الشبابية في مرحلة الجامعة كما أنه كان جزءً من العمل الطلابي بكونه عضوًا في اتحادات الطلبة داخل الجامعات الأردنية  </li>
              <li>  ممثلًا لكلية طب الأسنان حيث أسس هناك تكتلًا للعمل الطلابي الذي عرف بمجلس طب الأسنان . </li>
            </ul>
            <h4><b> مؤلفاته : </b></h4>
            <p>
             كتاب "كن قائدًا " وكتاب "خلقٌ كخلقهم" .
            </p>
            <p>
              
             <b> الايميل الرسمي: </b>
              dr.ahmed@osboha180.com
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Owner -->
  <!-- Evaluation --> 
  <div class="padding">
    <div class="container">
      <div class="row fade-in">
          <div class="container-fluid text-center">
            <h2> احصائيات الأسبوع</h2>
            <div class="heading-underline"></div>
            <h3>
              <?php 
                echo $evaluation[0]->title;

              ?>  
            </h3>
          </div>
        <div class="row fade-in">
          <div class="container-fluid text-center">
            <?php 
                echo'
                <img id="evaluation-img" src="'.base_url().'assets/img/'.$evaluation[0]->pic .'">';
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Evaluation -->

  <!-- Join Us -->
  <div class="padding">
    <div class="container">
      <div class="row fade-in">
        <div class="container-fluid text-center">
          <h2>انضم الى المشروع الأكبر لصناعة القراء </h2>
          <div class="heading-underline"></div>
        </div>
      </div>
      <div class="row fade-in">
        <div class="container-fluid text-center">
            <a href="<?php echo base_url()?>home/join_us"> <button class="button btn btn-outline-dark "> للانضمام اضغط هنا  </button></a>
        </div>
      </div>    
    </div>    
  </div>
  <!--End Join Us -->