<?php
include 'templates/header.php';
include 'templates/navbar.php';
?>
<!-- Start Banner Area -->
<section class="banner-area relative bgImg2">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-center">
			<div class="banner-left col-lg-6 col-sm-12 text-center page-img" dir="rtl">
				<img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/any.png" alt="">
				<h4>
              ماذا تفضل أن يكون جنس قائدك؟
            </h4>
        
				<div class="form-group">
					<select class="form-control" id="leader_gender" required>
						<option value="">اختر جنس القائد </option>
						<option value="female">أنثى</option>
						<option value="male">ذكر</option>
						<option value="any">لا فرق </option>
					</select>
				</div>

			</div>
			<div class="col-lg-6 col-sm-12 text-center banner-left page-img">
				<img class="d-flex mx-auto img-fluid" src="<?php echo base_url()?>assets/sign_up_assests/img/country.png" alt="">
				<h4>
                أخبرنا من أين أنت
              </h4>
			


				<div class="form-group">
					<select class="form-control" id="country" required>
						<option value="">[اختر مكان إقامتك]</option>
						<option value="اسبانيا">اسبانيا</option>
						<option value="استراليا">استراليا</option>
						<option value="اسكتلندا">اسكتلندا</option>
						<option value="ارتيريا">ارتيريا</option>
						<option value="اوكرانيا">اوكرانيا</option>
						<option value="الاردن">الاردن</option>
						<option value="الامارات">الامارات</option>
						<option value="السنغال">السنغال</option>
						<option value="السويد">السويد</option>
						<option value="البحرين">البحرين</option>
						<option value="الجزائر">الجزائر</option>
						<option value="الدنمارك">الدنمارك</option>
						<option value="السعوديه">السعوديه</option>
						<option value="السودان">السودان</option>
						<option value="الصومال">الصومال</option>
						<option value="العراق">العراق</option>
						<option value="الكويت">الكويت</option>
						<option value="المانيا">المانيا</option>
						<option value="المغرب">المغرب</option>
						<option value="النرويج">النرويج</option>
						<option value="النمسا">النمسا</option>
						<option value="اليمن">اليمن</option>
						<option value="اليونان">اليونان</option>
						<option value="اليابان">اليابان</option>
						<option value=" الصين ">الصين</option>
						<option value="الهند ">الهند</option>
						<option value="امريكا ">امريكا</option>
						<option value="ايران ">ايران</option>
						<option value="ايطاليا ">ايطاليا</option>
						<option value="باليز ">باليز</option>
						<option value="بريطانيا ">بريطانيا</option>
						<option value="بلجيكا ">بلجيكا</option>
						<option value="بوسنه ">بوسنه</option>
						<option value="بنغاريا ">بنغاريا</option>
						<option value="تايلند ">تايلند</option>
						<option value="تشاد ">تشاد</option>
						<option value="تركيا ">تركيا</option>
						<option value="تونس ">تونس</option>
						<option value="روسيا ">روسيا</option>
						<option value="رومانيا ">رومانيا</option>
						<option value="سوريا ">سوريا</option>
						<option value="سويسرا ">سويسرا</option>
						<option value="عُمان ">عُمان</option>
						<option value="فلسطين ">فلسطين</option>
						<option value=”فنلندا”>فنلندا</option>
						<option value="فرنسا ">فرنسا</option>
						<option value="قطر ">قطر</option>
						<option value="لبنان ">لبنان</option>
						<option value="ليبيا ">ليبيا</option>
						<option value="غانا ">غانا</option>
						<option value="كندا ">كندا</option>
						<option value="مالطا ">مالطا</option>
						<option value="ماليزيا ">ماليزيا</option>
						<option value="مصر ">مصر</option>
						<option value="موريتانيا ">موريتانيا</option>
						<option value="نيوزلاندا ">نيوزلاندا</option>
						<option value="هولندا ">هولندا</option>
						<option value="فيتنام ">فيتنام</option>
						<option value="نيجيريا ">نيجيريا</option>
						<option value="جنوب افريقيا ">جنوب افريقيا</option>
						<option value="الكنغو ">الكنغو</option>
						<option value="البرتغال ">البرتغال</option>
						<option value="البرازيل ">البرازيل</option>
						<option value="جيبوتي ">جيبوتي</option>
						<option value="كوريا الجنوبية ">كوريا الجنوبية</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row fullscreen align-items-center justify-content-center text-center ">
			<a href="javascript:allocateAmbassador() " class="genric-btn primary circle arrow ">التالي <span class="lnr lnr-arrow-right "></span></a>

		</div>
	</div>
</section>
<!-- End Banner Area -->
<?php include 'templates/footer.php';?>