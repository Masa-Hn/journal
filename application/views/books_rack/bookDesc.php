<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">
<input type="hidden" name="id" id="base_url" value="<?php echo base_url()?>">
<?php
 foreach($data as $row)
 {
   echo '
<div class="container padding" id="section-one">
    <input type="hidden" name="id" id="book_id" value="'.$row->id.'">

    <h2 style="text-align: center;"> '.$row->name.'</h2>
    <div class="heading-underline"></div>
    <div class=" row direct fade-in" style="text-align: center;">
      <div class="col-sm-3">
       <h3>اسم الكاتب :'.$row->writer.'</h3>
      </div>
      <div class="col-sm-3">
       <h3>عدد مرات التحميل :'.$row->numdownload.' </h3>
      </div>
      <div class="col-sm-3">
       <h3>مستوى الكتاب:';
        if($row->level == 1){
          echo "بسيط";
        }
        elseif($row->level == 2){
          echo "متوسط";
        }
        elseif($row->level == 3){
          echo "عميق";
        }
        else{
          echo "غير محدد";
        }

        echo '</h3>
      </div>
      <div class="col-sm-3">
       <h3>الفئة :'.$row->section.' </h3>
      </div>
    </div>
    <div class="padding"></div>
    <div class="row direct" dir="ltr">
      <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct">
            <div class="col-5 col-md-4 slide-in from-right">
              <img  src="'.$row->pic.'" class="bookImg" >
            </div>

            <div class="container-fluid text-center col-7 col-md-8 slide-in from-left">
              <h3>وصف الكتب </h3>
              <div class="heading-underline"></div>
              <div class="row">
                <p style="padding: 0 3% 0 3%"> '.$row->brief.'  </p>
                <button class="btn cusBtn" onclick="downloadAlert()">تحميل الكتاب </button>
                <input type="hidden" name="id" id="download_link" value="'.$row->link.'">
                <button class="btn cusBtn" value="'.$row->post.'" ><a target="_blank" href="'.$row->post.'" style="color: #FCFAEF"> أطروحات الكتاب</a></button>
              </div>
            </div>
      </div>
    </div>
  </div>';

 
}
?>

<script type="text/javascript">

 function downloadAlert(){
  Swal.fire({
  title: 'ملاحظة هامة',
  text: 'في مشروعنا لن لا نقوم أبدًا بتصوير الكتب المطبوعة ولا نقوم بنسب هذه الكتب للمشروع أو محاولة إخفاء أسماء دور النشر وحقوقها . إنما كل ما نقوم به هو عملية البحث عن هذه الكتب في مواقع الانترنت و إحضار روابط الحصول عليها للاستفادة منها . علمًا أننا لا نقوم بعملية بيع للكتب أو الاستفادة المادية منها مطلقًا ولكننا نؤمن أن من حق دور النشر إيجاد وسائل لمنع تصوير كتبها ووضعها على مواقع الانترنت ولكن أن يتواجد الكتاب على الانترنت مجانًا سواء عن طريق موقع لديه أذن بالنشر ، أو عن طريق كاتب الكتاب أو غيرهم ، ثم لا نقوم بقراءة هذه الكتب ونمنع أنفسنا من العلم فهذا الأمر لن يساهم في عملية ايقاف الكتب الالكترونية إنما سوف يساهم فقط بمنع أنفسنا عن علم مطروح وتقييد أنفسنا بظروف تدفعنا للجهل والتوقف عن التعلم . علمًا أن المشروع يتعهد دومًا بحذف أي كتاب من المنهج إذا لم يناسب وجوده كاتب الكتب أو دار النشر الخاصة بالكتاب ، فبإمكان كل شخص إما قراءة الكتاب مطبوعًا أو الاستفادة من النسخ التي نجمعها من مواقع الكتب المنتشرة مع إخلاء مسؤوليتنا حول إن كانت هذه المواقع لديها أذن بالنشر والتوزيع من عدمه فنترك هذا الأمر لدور النشر . هذا ونسأل الله أن يصلح نوايانا ويجعلها خالصة لوجهه الكريم وتطبيقًا لأمره لنا بالقراءة لأجل التعلم والتفكر . والله أعلم .',
  imageUrl:document.getElementById("base_url").value+'assets/img/logo.png',
  imageWidth: 150,
  imageAlt: 'Custom image',
}).then(function (result) {
    if (result.value) {
      $.ajax({
        type: "POST",
        url:document.getElementById("base_url").value+"bookDesc/updateNumDownload",
        data: {'id':document.getElementById("book_id").value},
        success: function(data){
           console.log(data);
        }
      });
     
       window.open(document.getElementById("download_link").value);
    }
})

 }//downloadAlert
 function facebookPost(link){
    window.open(link);
 }//facebookPost
</script>
