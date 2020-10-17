<body>

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#reqModal" id="reqModalBtn">
	<i class="fa fa-user-plus" aria-hidden="true"></i>
     طلب سفراء جدد
</button>



	<!-- Modal -->
	<div id="reqModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title"> مراسلة صفحة القادة</h1>
				</div>

				<div class="modal-body">
					<h3 class="body-header">
						قم بنسخ بريدك الألكتروني التالي
					</h3>
					<h3>
						<?php echo $_GET['email'];?>
					</h3>
					<h3>
						وأرسله للصفحة من خلال أيقونة الماسنجر أسفل يسار الصفحة

					</h3>
					
					<div id="fb-root"></div>

				    <!-- Chat Plugin code -->
				    <div class="fb-customerchat"
				        attribution=setup_tool
				        page_id="1401900829940429"
				      theme_color="#0A7CFF"
				      logged_in_greeting="Welcome to Osboha 180"
				      logged_out_greeting="Welcome to Osboha 180">
				    </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">
						إغلاق 
					</button>
				</div>

			</div>
		</div>
	</div>

	<script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
  </script>


</body>
</html>
