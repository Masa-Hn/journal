<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
<script type="text/javascript">
</script>
<body>
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
					<h3 class="modal-title"> طﻠﺐ ﺳﻔﺮاء ﺟﺪﺩ </h3>
				</div>

				<div class="modal-body">
					<h4 class="body-header">قم بتعبئة الطلب التالي</h4>
					<p id="msg"></p>

					<form method="post" enctype="multipart/form-data">
						<?php
						$teamLink = "";
						$teamName = "";
						$teamCount = 20;
                        
						$leaderName = $_GET[ 'name' ];
						$teamLink = "https://www.facebook.com/groups/" . $teamLink;
						$teamName = $teamName;
						$currentTeamCount = $teamCount;
						$leaders_team_name = "leaders of osboha 1";
						$leader_rank = 5;
						?>
						<input type="hidden" name="leaderName" id="leaderName" value="<?php echo $leaderName ;?>">
						<input type="hidden" name="teamLink" id="teamLink" value="<?php echo $teamLink ;?>">
						<input type="hidden" name="teamName" id="teamName" value="<?php echo $teamName ;?>">
						<input type="hidden" name="currentTeamCount" id="currentTeamCount" value="<?php echo $currentTeamCount ;?>">
						<input type="hidden" name="leaders_team_name" id="leaders_team_name" value="<?php echo $leaders_team_name ;?>">
						<input type="hidden" name="leader_rank" id="leader_rank" value="<?php echo $leader_rank ;?>">

						<div class="form-group">
							<label for="leaderLink">ضع رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" placeholder="مثال: https://www.facebook.com/example" class="form-control" required="required">

						</div>
						<label name="msg-ch" id="msg-ch" style="display: none; color: red"> الرجاء كتابة الرابط </label>

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
					</form>
					<button name="check-btn" class="btn btn-block" id="check-btn" onclick="check()" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">اختبار الرابط</button>

					<div id="check_div" style="margin-top: 3%; margin-bottom: 3%;">
						<input type="checkbox" id="check">
						<label>  تم التأكد من صحة الرابط</label>
					</div>
					<label name="check-msg" id="check-msg" style="display: none; color: red"> الرجاء تأكيد اختبار الرابط! </label>
					<button type="submit" name="submit" class="btn btn-block regular" id="sub-btn" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;">رفع الطلب</button>
				</div>

				<div class="modal-footer">
					<a type="button" class="btn btn-default" target="_blank" href="https://www.facebook.com/Intoosboha/" style="font-weight: bold; color: #214761; font-size: 1.7rem;"><i class="fab fa-facebook-messenger"></i> للتواصل مع الإدخال</a>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		function check() {

			var URL = document.getElementById( 'leaderLink' ).value;
			if ( URL == "" ) {
				document.getElementById( 'msg-ch' ).style.display = "block";
			} else {
				document.getElementById( 'msg-ch' ).style.display = "none";
				window.open( URL );

			}
		}
		var base_url = "<?php echo base_url()?>";
		$( document ).ready( function () {
			$( "#sub-btn" ).click( function () {
				if ( document.getElementById( 'check' ).checked == true ) {
					$.ajax( {
						type: "POST",
						url: base_url + "Requests/addFullRequest/?email=<?php echo $_GET['email'];?>&name=<?php echo $_GET['name'];?>",
						data: {
							leaderName: $( "#leaderName" ).val(),
							leaderLink: $( "#leaderLink" ).val(),
							leaderGender: $( "#leaderGender" ).val(),
							teamLink: $( "#teamLink" ).val(),
							teamName: $( "#teamName" ).val(),
							currentTeamCount: $( "#currentTeamCount" ).val(),
							numOfMembers: $( "#numOfMembers" ).val(),
							gender: $( "#gender" ).val(),
							leadersTeamName: $( "#leaders_team_name" ).val(),
							leaderRank: $( "#leader_rank" ).val()

						},
						success: function ( data ) {
							$( '#msg' ).html( data );
						}
					} );
				} else {
					document.getElementById( 'check-msg' ).style.display = "block";
				}
			} );

			//exceptional leader
			$( "#sub-btn-e" ).click( function () {
				if ( document.getElementById( 'check' ).checked == true ) {
					$.ajax( {
						type: "POST",
						url: base_url + "Requests/addExceptionalRequest/?email=<?php echo $_GET['email'];?>&name=<?php echo $_GET['name'];?>",
						data: {
							leaderName: $( "#leaderName" ).val(),
							leaderLink: $( "#leaderLink" ).val(),
							leaderGender: $( "#leaderGender" ).val(),
							teamLink: $( "#teamLink" ).val(),
							teamName: $( "#teamName" ).val(),
							currentTeamCount: $( "#currentTeamCount" ).val(),
							numOfMembers: $( "#numOfMembers" ).val(),
							gender: $( "#gender" ).val()

						},
						success: function ( data ) {
							$( '#msg' ).html( data );
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