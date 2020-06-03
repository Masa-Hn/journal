<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/search.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/rtl.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/pagination.css">

<div class="container padding" id="section-one">
    <h2 style="text-align: center;"> اسم الكتاب</h2>
    <div class="heading-underline"></div>
    <div class=" row direct fade-in" style="text-align: center;">
      <div class="col-sm-6">
       <h3> اسم الكاتب: أحمد بن يوسف السيد</h3>
      </div>
      <div class="col-sm-6">
       <h3> عدد مرات التحميل : 100 </h3>
      </div>
    </div>
    <div class="padding"></div>
    <div class="row direct">
      <div class=" section-margin container container-fluid text-center col-md-12 col-12 direct">
            <div class="col-5 col-md-4 slide-in from-right">  
              <img  src="img/1.jpg" class="bookImg" >
            </div>    

            <div class="container-fluid text-center col-7 col-md-8 slide-in from-left">
              <h3>وصف الكتب </h3>
              <div class="heading-underline"></div>
              <div class="row">
                <p style="padding: 0 3% 0 3%"> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nam aliquam sem et tortor consequat id porta. Eu facilisis sed odio morbi quis commodo odio aenean sed. Facilisis leo vel fringilla est ullamcorper. Maecenas ultricies mi eget mauris pharetra et. Imperdiet sed euismod nisi porta. Arcu dictum varius duis at consectetur lorem donec massa sapien. Sed faucibus turpis in eu. Massa id neque aliquam vestibulum morbi blandit cursus. Diam donec adipiscing tristique risus nec feugiat in fermentum posuere. Eget arcu dictum varius duis at consectetur lorem donec massa. Volutpat odio facilisis mauris sit amet massa vitae.

                  Cursus metus aliquam eleifend mi. Tempor orci dapibus ultrices in. Laoreet sit amet cursus sit amet dictum sit. Vitae suscipit tellus mauris a diam maecenas sed. Purus ut faucibus pulvinar elementum integer. Varius sit amet mattis vulputate enim nulla. Ipsum dolor sit amet consectetur adipiscing elit. Mi quis hendrerit dolor magna eget. Egestas quis ipsum suscipitpendisse ultrices gravida dictum. Scelerisque eu ultrices vitae auctor eu augue ut.
                </p>
                <button class="btn cusBtn" onclick="downloadAlert()">تحميل الكتاب </button>
                <button class="btn cusBtn" >اطروحات الكتاب</button>
              </div>
            </div>
      </div>
    </div>
  </div>

 
<script type="text/javascript">

 function downloadAlert(){
  Swal.fire({
  title: 'ملاحظة هامة',
  text: 'في مشروعنا لن لا نقوم أبدًا بتصوير الكتب المطبوعة ولا نقوم بنسب هذه الكتب للمشروع أو محاولة إخفاء أسماء دور النشر وحقوقها . إنما كل ما نقوم به هو عملية البحث عن هذه الكتب في مواقع الانترنت و إحضار روابط الحصول عليها للاستفادة منها . علمًا أننا لا نقوم بعملية بيع للكتب أو الاستفادة المادية منها مطلقًا ولكننا نؤمن أن من حق دور النشر إيجاد وسائل لمنع تصوير كتبها ووضعها على مواقع الانترنت ولكن أن يتواجد الكتاب على الانترنت مجانًا سواء عن طريق موقع لديه أذن بالنشر ، أو عن طريق كاتب الكتاب أو غيرهم ، ثم لا نقوم بقراءة هذه الكتب ونمنع أنفسنا من العلم فهذا الأمر لن يساهم في عملية ايقاف الكتب الالكترونية إنما سوف يساهم فقط بمنع أنفسنا عن علم مطروح وتقييد أنفسنا بظروف تدفعنا للجهل والتوقف عن التعلم . علمًا أن المشروع يتعهد دومًا بحذف أي كتاب من المنهج إذا لم يناسب وجوده كاتب الكتب أو دار النشر الخاصة بالكتاب ، فبإمكان كل شخص إما قراءة الكتاب مطبوعًا أو الاستفادة من النسخ التي نجمعها من مواقع الكتب المنتشرة مع إخلاء مسؤوليتنا حول إن كانت هذه المواقع لديها أذن بالنشر والتوزيع من عدمه فنترك هذا الأمر لدور النشر . هذا ونسأل الله أن يصلح نوايانا ويجعلها خالصة لوجهه الكريم وتطبيقًا لأمره لنا بالقراءة لأجل التعلم والتفكر . والله أعلم .',
  imageUrl: 'C:/Users/someO/Desktop/Design/img/logo.png',
  imageWidth: 150,
  imageAlt: 'Custom image',
}).then(function (result) {
    if (result.value) {
       window.open("http://www.google.com");
    }
})

 }
</script>