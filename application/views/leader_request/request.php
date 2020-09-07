<!DOCTYPE html>
<html>
<head>

	<title>Osboha 180</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/request.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>

</head>

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
					<h1 class="modal-title"> ﺻﻔﺤﺔ ﻃﻠﺐ ﺳﻔﺮاء ﺟﺪﺩ </h1>
				</div>

				<div class="modal-body">
					<h3 class="body-header">قم بتعبئة الطلب التالي</h3>
					<p id="msg"></p>

					<form method="post" enctype="multipart/form-data">
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
							<button type="submit" name="submit" class="btn btn-block" id="sub-btn">رفع الطلب</button>
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