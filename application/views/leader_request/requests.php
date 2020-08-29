<!DOCTYPE html>
<html>
<head>

	<title>Osboha 180</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>


	<style type="text/css">
		#reqModalBtn {
			color: #214761;
			background-color: #fff;
			margin: 50px;
			border: 1px solid #214761;
		}
		
		.modal {
			direction: rtl;
			color: #214761;
		}
		.modal-title {
			color: #fff;
			text-align: center;
		}
		.modal-header,
		.modal-footer {
			background-color: #214761;
		}
		.close {
			color: #fff;
		}
		
		.close:hover {
			color: #fff;
		}
		
		.close-btn {
			font-size: 2rem;
			width: 20%;
		}
		#gender *,
		#numOfMembers * {
			color: #214761;
			font-size: 2rem;
		}
		.form-group> label {
			font-size: 2rem;
		}
		.body-header {
			font-size: 3rem;
			text-align: center;
			margin-bottom: 5%;
		}
		#sub-btn {
			font-size: 2rem;
			font-weight: bold;
			margin-top: 5%;
			background-color: #214761;
			color: #fff;
			border: 1px solid #214761;
		}
		
		#sub-btn:hover {
			color: #214761;
			background-color: #fff;
		}

	</style>
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
						<?php
						//to be taken from osboha website
						$leaderName = "asmaa";
						$teamLink = "http://facebook.com/asmaa.99";
						
						?>
						<input type="hidden" name="leaderName" id="leaderName" value="<?php echo $leaderName ;?>">
						<input type="hidden" name="teamLink" id="teamLink" value="<?php echo $teamLink ;?>">

						<div class="form-group">
							<label for="leaderLink">ضع رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" placeholder="مثال: https://www.facebook.com/example" class="form-control" required="required">
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
							<label for="gender" class="form-label">اختر الجنس: </label>
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
		var base_url = "<?=base_url()?>";
		$( document ).ready( function () {

			$( "#sub-btn" ).click( function () {
				$.ajax( {
					type: "POST",
					url: base_url + "index.php/requests/addRequest/?email=<?=$_GET['email']?>",
					data: {
						leaderName: $( "#leaderName" ).val(),
						leaderLink: $( "#leaderLink" ).val(),
						teamLink: $( "#teamLink" ).val(),
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
	<script>
		/*
		$(document).ready(function(){
		  $("#reqModalBtn").click(function(){
		    $("#reqModal").modal();
		  });
		});
		*/
	</script>
</body>
</html>