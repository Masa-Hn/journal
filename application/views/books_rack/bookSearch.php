<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link href="<?php echo base_url()?>assets/css/animation.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<script src="<?php echo base_url()?>assets/js/pagination.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>

<input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">

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
        </div>
      </div>
    </div>
  </div>

  <div class="container" dir="ltr">
    <div class="row direct fade-in">
      <div class="container-fluid text-center col-md-4 col-lg-4 col-sm-12 vl ">
        <h3>تخصيص البحث</h3>
        <div class="heading-underline"></div>
        <div class="row" style="text-align: -webkit-center">
          <button id="filtersToggel" class="cusBtn btn" data-toggle="collapse" data-target="#filters">اضغط لاظهار خيارات التخصيص </button>
        </div>
        <div  id="filters" class=" collapse custom-control custom-checkbox ">
            <h3 class="clear" style="margin-bottom: 10%; text-align: right;"> فئة الكتاب  </h3>
            <div class="row filterRow">
              <div class="col-sm-3">
                <span class="no-of-books">52</span>
              </div>
              <div class="col-sm-6">
                <span> دينية </span>
              </div>
              <div class="col-sm-3">
                <input type="checkbox" >
              </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
                </div>
                <div class="col-sm-6">
                  <span> علوم </span>
                </div>
                <div class="col-sm-3">
                  <input type="checkbox" >
                </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> تنمية بشرية </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>

          <h3  class="clear" style="margin-bottom: 10%; text-align: right;"> اللغة</h3>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> العربية  </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> الانجليزية </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
        </div>

        <div  id="firstFilters" class=" ais-refinement-list--item custom-control custom-checkbox ">
          <h3 style="margin-bottom: 10%; text-align: right;"> فئة الكتاب  </h3>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> دينية </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> علوم </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> تنمية بشرية </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
          <h3 style="margin-bottom: 10%; text-align: right;"> اللغة</h3>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> العربية  </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
          <div class="row filterRow">
            <div class="col-sm-3">
              <span class="no-of-books">52</span>
            </div>
            <div class="col-sm-6">
              <span> الانجليزية </span>
            </div>
            <div class="col-sm-3">
              <input type="checkbox" >
            </div>
          </div>
        </div>
      </div>

      <div class="padding "></div>
      <div class="container">
        <div class="row displayDiv section-margin  container-flui" style="text-align: right; margin-right: 3%" >
           <button class="btn cusBtn" id="displaybtn">   عرض </button>  <input type="text" id="bookDisplay" name="bookDisplay" value="3">
        </div>
        <div class="contents">


          <?php
           foreach($data as $row)
           {
               echo '
               <div class="row">
                 <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct">
                   <div class="col-4 col-md-3">
                     <img  src="'.$row->pic.'" class="bookImg" >
                   </div>
                   <div class="container-fluid text-center col-8 col-md-9">
                     <h3 >'.$row->name.'</h3>
                     <div class="heading-underline"></div>

                     <div class=" row">
                       <p> '.$row->brief.' <a href="'. base_url().'bookDesc?id='.$row->id.'" style="color: #BB6854">المزيد</a></p>
                       <button class="btn cusBtn" id="'.$row->id.'" onClick="downloadAlert(this.id)">تحميل الكتاب </button>
                        <input type="hidden" name="id" id="download_link_'.$row->id.'" value="'.$row->link.'">
                       <button class="btn cusBtn" ><a target="_blank" href="'.$row->post.'" style="color: #FCFAEF"> أطروحات الكتاب</a></button>
                       <h5>لمن يعاني من ضعف الانترنت قم بتحميل الكتب من
                         <a href="telegram.html">هنا </a></h5>
                     </div>
                   </div>
                 </div>
                 <div class="heading-underline col-sm-12"></div>
               </div>
               ';
               // اطروحات الكتاب $row->post
               //تحميل الكتاب $row->link
           }
         ?>




        </div>

      </div>
    </div>
  </div>

  <div class=" flower">
    <div class="row" style="width: 93%; text-align: right;margin-bottom: 10px" >
      <img src="<?php echo base_url()?>assets/img/flower.png" style="width: 15%">
    </div>
  </div>

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

 function downloadAlert(id){

  Swal.fire({
  title: 'ملاحظة هامة',
  text: 'في مشروعنا لن لا نقوم أبدًا بتصوير الكتب المطبوعة ولا نقوم بنسب هذه الكتب للمشروع أو محاولة إخفاء أسماء دور النشر وحقوقها . إنما كل ما نقوم به هو عملية البحث عن هذه الكتب في مواقع الانترنت و إحضار روابط الحصول عليها للاستفادة منها . علمًا أننا لا نقوم بعملية بيع للكتب أو الاستفادة المادية منها مطلقًا ولكننا نؤمن أن من حق دور النشر إيجاد وسائل لمنع تصوير كتبها ووضعها على مواقع الانترنت ولكن أن يتواجد الكتاب على الانترنت مجانًا سواء عن طريق موقع لديه أذن بالنشر ، أو عن طريق كاتب الكتاب أو غيرهم ، ثم لا نقوم بقراءة هذه الكتب ونمنع أنفسنا من العلم فهذا الأمر لن يساهم في عملية ايقاف الكتب الالكترونية إنما سوف يساهم فقط بمنع أنفسنا عن علم مطروح وتقييد أنفسنا بظروف تدفعنا للجهل والتوقف عن التعلم . علمًا أن المشروع يتعهد دومًا بحذف أي كتاب من المنهج إذا لم يناسب وجوده كاتب الكتب أو دار النشر الخاصة بالكتاب ، فبإمكان كل شخص إما قراءة الكتاب مطبوعًا أو الاستفادة من النسخ التي نجمعها من مواقع الكتب المنتشرة مع إخلاء مسؤوليتنا حول إن كانت هذه المواقع لديها أذن بالنشر والتوزيع من عدمه فنترك هذا الأمر لدور النشر . هذا ونسأل الله أن يصلح نوايانا ويجعلها خالصة لوجهه الكريم وتطبيقًا لأمره لنا بالقراءة لأجل التعلم والتفكر . والله أعلم .',
  imageUrl:document.getElementById("base_url").value+'assets/img/logo.png',
  imageWidth: 150,
  imageAlt: 'Custom image',
}).then(function (result) {
    if (result.value) {
       window.open(document.getElementById("download_link_"+id).value);
    }
})

 }

  function getBook(){    
    var bookName= document.getElementById("bookName").value;
    var type= document.getElementById("book_type").value;

    if(bookName != ""){
      window.location.href = document.getElementById("base_url").value+"bookSearch/getByName?name="+bookName+"&type="+type;
    }//if
    else{
         window.location.href = document.getElementById("base_url").value+"bookSearch";
    }

  }//getBook
</script>
