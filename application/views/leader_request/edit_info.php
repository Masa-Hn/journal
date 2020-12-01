<body>

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#editModal" id="editModalBtn">
		<i class="fa fa-edit"></i>
		تعديل البيانات الشخصية
</button>



	<!-- Modal -->
	<div id="editModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"> تعديل البيانات الشخصية</h3>
				</div>

				<div class="modal-body">
					<p id="msgg"></p>

					<form method="post" enctype="multipart/form-data">
						<?php
						//print_r($_GET[ 'email' ]);die();
						$info = $this->requestsModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info', 'id, leader_name, leader_link, team_link' )->fetch_assoc();

						$id = $info['id'];
						$leaderName = $info['leader_name'];
						$leaderLink = $info['leader_link'];
						$teamLink = $info['team_link'];

						?>

						<div class="form-group">
							<label for="leaderLink">اسمك كما هو على الفيسبوك:</label>
							<input type="text" name="leaderName" id="leaderName" value="<?php echo $leaderName;?>" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label for="leaderLink">رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" value="<?php echo $leaderLink;?>" class="form-control" required="required">
						</div>

						<label name="msg-ch1" id="msg-ch1" style="display: none; color: red"> الرجاء كتابة رابط صفحتك! </label>
						<div class="form-group">
							<label for="teamLink">رابط فريق المتابعة الخاص بك: </label>
							<input type="text" name="teamLink" id="teamLink" value="<?php echo $teamLink;?>" class="form-control" required="required">
						<?php
						$msg = "هل أنت متأكد من أنك تريد تعديل بياناتك الشخصية؟";
						?>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-block" id="subBtn" style="display: none;">تعديل</button>

						</div>
						<label name="msg-ch2" id="msg-ch2" style="display: none; color: red"> الرجاء كتابة رابط فريقك </label>
					</form>


					<button name="check-btn1" class="btn btn-block" id="check-btn1" onclick="check1()" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">اختبار رابط صفحتك</button>
					
					<div id="check_div1" style="display: none;margin-top: 3%; margin-bottom: 3%;">
						<input type="checkbox" id="check1" onclick="change_check1()">
						<label>  تم التأكد من صحة رابط صفحتك</label>
					</div>
					
					<button name="check-btn2" class="btn btn-block" id="check-btn2" onclick="check2()" style="display: none;background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">اختبار رابط فريقك</button>
					
					<div id="check_div2" style="display: none;margin-top: 3%; margin-bottom: 3%;">
						<input type="checkbox" id="check2" onclick="change_check2()">
						<label>  تم التأكد من صحة رابط فريقك</label>
					</div>

					<button type="submit" name="submit" class="btn btn-block" id="subBtn" style="display: none;background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">تعديل</button>
            
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق </button>
				</div>

			</div>
		</div>
	</div>
	<script type="text/javascript">
		function check1() {
			var URL = document.getElementById( 'leaderLink' ).value;
			if ( URL == "" ) {
				document.getElementById( 'msg-ch1' ).style.display = "block";
				document.getElementById( 'check_div1' ).style.display = "none";
				document.getElementById( 'check_div2' ).style.display = "none";
				document.getElementById( 'check-btn2' ).style.display = "none";
				document.getElementById( 'subBtn' ).style.display = "none";
				document.getElementById( 'check1' ).checked = false;
				document.getElementById( 'check2' ).checked = false;
			} else {
				document.getElementById( 'msg-ch1' ).style.display = "none";
				var win = window.open( URL );
				document.getElementById( 'check_div1' ).style.display = "block";

			}
		}

		function check2() {
			var teamURL = document.getElementById( 'teamLink' ).value;
			if ( teamURL == "" ) {
				document.getElementById( 'msg-ch2' ).style.display = "block";
				document.getElementById( 'check_div2' ).style.display = "none";
				document.getElementById( 'subBtn' ).style.display = "none";
				document.getElementById( 'check2' ).checked = false;
			} else {
				document.getElementById( 'msg-ch2' ).style.display = "none";
				var win = window.open( teamURL );
				document.getElementById( 'check_div2' ).style.display = "block";

			}
		}

		function change_check1() {
			ch = document.getElementById( 'check1' );
			if ( ch.checked == true ) {
				document.getElementById( 'check-btn2' ).style.display = "block";
				document.getElementById( 'subBtn' ).style.display = "none";
			} else {
				document.getElementById( 'check-btn2' ).style.display = "none";
				document.getElementById( 'subBtn' ).style.display = "none";
			}

		}

		function change_check2() {
			ch = document.getElementById( 'check2' );
			if ( ch.checked == true ) {
				document.getElementById( 'subBtn' ).style.display = "block";
			} else {
				document.getElementById( 'subBtn' ).style.display = "none";
			}

		}
	</script>
	<script type="text/javascript">
		var base_url = "<?php echo base_url()?>";
		var id = "<?php echo $id;?>";

		$( document ).ready( function () {

			$( "#subBtn" ).click( function () {
				$.ajax( {
					type: "POST",
					url: base_url + "Requests/edit/?email=<?php echo $_GET['email']?>",
					data: {
						id: id,
						leaderLink: $( "#leaderLink" ).val(),
						leaderName: $( "#leaderName" ).val(),
						teamLink: $( "#teamLink" ).val()

					},
					beforeSend: function () {
						return confirm( "هل أنت متأكد من أنك تريد تعديل بياناتك؟" );
					},
					success: function ( data ) {
						$( '#msgg' ).html( data );
					}
				} );
				return false;
			} );
		} );
	</script>
</body>
</html>