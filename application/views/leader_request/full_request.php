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
					<h1 class="modal-title"> طﻠﺐ ﺳﻔﺮاء ﺟﺪﺩ </h1>
				</div>

				<div class="modal-body">
					<h3 class="body-header">قم بتعبئة الطلب التالي</h3>
					<p id="msg"></p>

					<form method="post" enctype="multipart/form-data">
						<?php
						//to be taken from osboha website
						$leaderName = "asmaa";
						$teamLink = "http://facebook.com/asmaa.99";
						$teamName = "11";
						$currentTeamCount = 20;

						?>
						<input type="hidden" name="leaderName" id="leaderName" value="<?php echo $leaderName ;?>">
						<input type="hidden" name="teamLink" id="teamLink" value="<?php echo $teamLink ;?>">
						<input type="hidden" name="teamName" id="teamName" value="<?php echo $teamName ;?>">
						<input type="hidden" name="currentTeamCount" id="currentTeamCount" value="<?php echo $currentTeamCount ;?>">

						<div class="form-group">
							<label for="leaderLink">ضع رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" placeholder="مثال: https://www.facebook.com/example" class="form-control" required="required">

						</div>						
						 <label name="msg-ch" id="msg-ch"  style="display: none; color: red" > الرجاء كتابة الرابط </label>

						<div class="form-group">
							<label for="leaderGender" class="form-label"> جنسك: </label>
							<select name="leaderGender" id="leaderGender" class="form-control">
								<option value="female">أنثى</option>
								<option value="male">ذكر</option>
							</select>
						</div>
						<div class="form-group">
							<label for="numOfMembers">اختر عدد الأعضاء الذي تريده: </label>
							<select name="numOfMembers" id="numOfMembers" class="form-control" required="required">
								<?php
								for ( $i = 1; $i <= 10; $i++ ) {
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="gender" class="form-label">اختر جنس الأعضاء: </label>
							<select name="gender" id="gender" class="form-control">
								<option value="female">إناث</option>
								<option value="male">ذكور</option>
								<option value="any">لا فرق</option>
							</select>
						</div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-block" id="sub-btn" style="display: none;">رفع الطلب</button>
						</div>

					</form>
<button name="check-btn" class="btn btn-block" id="check-btn" onclick="check()">اختبار الرابط</button>
 <input type="checkbox" id="check" name="check"  onclick="change_check()" ><label>  تم التأكد من صحة الرابط</label>
<script type="text/javascript">

	function check()
		{
var URL = document.getElementById( 'leaderLink' ).value;
if (URL=="")
	document.getElementById('msg-ch').style.display="block";
else
var win = window.open(URL);
    		}
		function change_check()
		{
			ch= document.getElementById('check');
			sb=document.getElementById('sub-btn');
			if (ch.checked==true)
				document.getElementById('sub-btn').style.display="block";
			else
				document.getElementById('sub-btn').style.display="none";

		}
</script>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق </button>
			</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		var base_url = "<?php echo base_url()?>";
		$( document ).ready( function () {

			$( "#sub-btn" ).click( function () {
				$.ajax( {
					type: "POST",
					url: base_url + "Requests/addFullRequest/?email=<?=$_GET['email']?>",
					data: {
						leaderName: $( "#leaderName" ).val(),
						leaderLink: $( "#leaderLink" ).val(),
						leaderGender: $( "#leaderGender" ).val(),
						teamLink: $( "#teamLink" ).val(),
						teamName: $( "#teamName" ).val(),
						currentTeamCount: $( "#currentTeamCount").val(),
						numOfMembers: $( "#numOfMembers" ).val(),
						gender: $( "#gender" ).val()

					},
					success: function ( data ) {
						$( '#msg' ).html( data );
					}
				} );
				return false;
			} );
		} );


	</script>
</body>
</html>
