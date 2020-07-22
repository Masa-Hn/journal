<body>
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <h3 class="heading" style="color:#008080;" >إدارة الكتب</h3>
                <p style="padding-bottom: 3em;" class="desc"> تستطيع إدارة مكتبة أصبوحة من خلال الخدمات التالية</p>

                <fieldset class="show">
                    <div class="form-card">
                        <h5 class="sub-heading">اختر المهمة التي تود القيام بها</h5>
                        <ul class="row px-1 radio-group">
                            <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>AddBooks/index"> <img class="icon icon1 " src="<?php echo base_url()?>assets/img/add.png"> </a>
                                <p class="sub-desc" style="text-align: center;">إضافة كتاب</p>
                            </li>
                            <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>AddBooks/show_book"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/show.png"> </a>
                                <p class="sub-desc" style="text-align: center;">استعراض الكتب</p>
                            </li>
                             <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>AddArticle/index"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/add_article.png"> </a>
                                <p class="sub-desc" style="text-align: center;">إضافة مقال</p>
                            </li>
                            <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>management_book/show_article"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/article.png"> </a>
                                <p class="sub-desc" style="text-align: center;">استعراض المقالات</p>
                            </li>
                           
                            <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>AddInfographic/index"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/add_info.png"> </a>
                                <p class="sub-desc" style="text-align: center;">إضافة انفوجرافيك</p>
                            </li>
                              <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>management_book/show_infographic"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/show_infographic.png"> </a>
                                <p class="sub-desc" style="text-align: center;">استعراض الانفوجرافيك</p>
                            </li>
                             <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>Evaluation/index"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/add_eval.png"> </a>
                                <p class="sub-desc" style="text-align: center;">إضافة تقييم أسبوعي</p>
                            </li>
                              <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>Evaluation/show_evaluation"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/show_eval.png"> </a>
                                <p class="sub-desc" style="text-align: center;">استعراض التقييمات</p>
                            </li>

                             <li class="card-block text-center radio " >
                                <a class="image-icon"  href="<?php echo base_url()?>management_book/add_activity"> 
                                <img class="icon icon1 " src="<?php echo base_url()?>assets/img/add_activity.png"> </a>
                                <p class="sub-desc" style="text-align: center;">إضافة إنجاز جديد(نشاط)</p>
                            </li>
                            
                        </ul> 
                    </div>
                </fieldset>
               
            </div>
        </div>
    </div>
</div>
</body>