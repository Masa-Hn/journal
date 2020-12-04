<body>

	<!-- Trigger the modal with a button 
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#editModal" id="editModalBtn">
		<i class="fa fa-edit"></i>
		
</button>-->


<a href="#"  data-toggle="modal" data-target="#editModal" id="editModalBtn"><img src="<?php echo base_url() ?>admin/img/editpesonalinfo.png" width="26px">  تعديل البيانات الشخصية</a>
<br>



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
						<label name="msg-name" id="msg-name" style="display: none; color: red"> الرجاء كتابة اسمك! </label>
						<hr/>
						<div class="form-group">
							<label for="leaderLink">رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" value="<?php echo $leaderLink;?>" class="form-control" required="required">
						</div>
						<label name="msg-ch1" id="msg-ch1" style="display: none; color: red"> الرجاء كتابة رابط صفحتك! </label>
						<div class="form-group">
							<label for="teamLink">رابط فريق المتابعة الخاص بك: </label>
							<input type="text" name="teamLink" id="teamLink" value="<?php echo $teamLink;?>" class="form-control" required="required">
						</div>
						<label name="msg-ch2" id="msg-ch2" style="display: none; color: red"> الرجاء كتابة رابط فريقك </label>


					</form>
					<div class="form-group ">
						<button class="btn btn-block" name="check-btn1" id="check-btn1" onClick="check1()" style=" background-color: #214761;color: #fff; font-size: 1.7rem;font-weight: bold;"><i class="fa fa-external-link" aria-hidden="true"></i> اختبار رابط صفحتك</button>

						<div id="check_div1" style=" margin-top: 3%; margin-bottom: 3%;">
							<input type="checkbox" id="check1">
							<label>  تم التأكد من صحة رابط صفحتك</label>
						</div>
					</div>
					<div class="form-group">
						<button name="check-btn2" id="check-btn2" class="btn btn-block" onclick="check2()" style=" background-color:#214761; color: #fff; font-size: 1.7rem;font-weight: bold;"><i class="fa fa-external-link" aria-hidden="true"></i>اختبار رابط فريقك</button>

						<div id="check_div2" style="margin-top: 3%; margin-bottom: 3%;">
							<input type="checkbox" id="check2">
							<label>  تم التأكد من صحة رابط فريقك</label>
						</div>

					</div>
					<label name="check-msg" id="check-msg" style="display: none; color: red"> الرجاء تأكيد اختبار الروابط! </label>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-block" id="subBtn" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">تعديل</button>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق </button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function check1() {
			var URL = document.getElementById( 'leaderLink' ).value;
			if ( URL == "" ) {
				document.getElementById( 'msg-ch1' ).style.display = "block";
			} else {
				document.getElementById( 'msg-ch1' ).style.display = "none";
				window.open( URL );
			}
		}

		function check2() {
			var teamURL = document.getElementById( 'teamLink' ).value;
			if ( teamURL == "" ) {
				document.getElementById( 'msg-ch2' ).style.display = "block";
			} else {
				document.getElementById( 'msg-ch2' ).style.display = "none";
				window.open( teamURL );
			}
		}

		/*function change_check1() {
			ch = document.getElementById( 'check1' );
			if ( ch.checked == true ) {
				document.getElementById( 'check-btn2' ).style.display = "block";
				document.getElementById( 'subBtn' ).style.display = "none";
			} else {
				document.getElementById( 'check-btn2' ).style.display = "none";
				document.getElementById( 'subBtn' ).style.display = "none";
			}
		}*/
	</script>
	<script type="text/javascript">
		var base_url = "<?php echo base_url()?>";
		var id = "<?php echo $id;?>";

		$( document ).ready( function () {

			$( "#subBtn" ).click( function () {
				if ( document.getElementById( 'check1' ).checked == true && document.getElementById( 'check2' ).checked == true ) {
					document.getElementById( 'check-msg' ).style.display = "none";
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
				} else {
					document.getElementById( 'check-msg' ).style.display = "block";
				}


			} );
		} );
	</script>
</body>
</html>