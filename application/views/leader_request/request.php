<body>
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#reqModal" id="reqModalBtn">
	<i class="fa fa-user-plus" aria-hidden="true"></i>
     طلب سفراء جدد
</button>
	<div>
		<div id="reqModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h1 class="modal-title">طﻠﺐ ﺳﻔﺮاء ﺟﺪﺩ </h1>
					</div>

					<div class="modal-body">
						<h3 class="body-header">قم بتعبئة الطلب التالي</h3>
						<p id="msg"></p>

						<form method="post" enctype="multipart/form-data">
							<?php
							$currentTeamCount = 20;
							?>

							<input type="hidden" name="currentTeamCount" id="currentTeamCount" value="<?php echo $currentTeamCount; ?>">


							<div class="form-group">
								<label for="numOfMembers">اختر عدد الأعضاء الذي تريده: </label>
								<select name="numOfMembers" id="numOfMembers" class="form-control" required="required">
									<?php
									for ( $i = 1; $i <= 10; $i++ ) {
										echo "<option value='$i' class='num'>$i</option>";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="gender" class="form-label">اختر جنس الأعضاء: </label>
								<select name="gender" id="gender" class="form-control">
									<option value="female" class="gender">إناث</option>
									<option value="male" class="gender">ذكور</option>
									<option value="any" class="gender">لا فرق</option>
								</select>
							</div>

							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-block regular" id="sub-btn" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">رفع الطلب</button>
							</div>

						</form>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق</button>
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
						url: base_url + "requests/addRequest/?email=<?=$_GET['email']?>",
						data: {
							numOfMembers: $( "#numOfMembers" ).val(),
							gender: $( "#gender" ).val(),
							currentTeamCount: $( "#currentTeamCount" ).val()

						},
						success: function ( data ) {
							$( '#msg' ).html( data );
						}
					} );
					return false;
				} );

				$( "#sub-btn-e" ).click( function () {
					$.ajax( {
						type: "POST",
						url: base_url + "requests/addRequestExc/?email=<?=$_GET['email']?>",
						data: {
							numOfMembers: $( "#numOfMembers" ).val(),
							gender: $( "#gender" ).val(),
							currentTeamCount: $( "#currentTeamCount" ).val()

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