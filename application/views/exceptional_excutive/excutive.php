<?php
$supervisor = "leaders of osboha 1";
$rank = 20;
?>
<style>
	* {
		direction: rtl;
	}
	
	#excModalBtn {
		color: #214761;
		background-color: #fff;
		margin: 50px;
		border: 1px solid #214761;
	}
	
	th,
	tr,
	td {
		text-align: center;
		color: #214761;
	}
	
	.edit td {
		text-align: right;
	}

</style>
<body>
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#excModal" id="excModalBtn">
		<i class="fa fa-user"></i>
		عرض القادة التنفيذيين
</button>

	<div id="excModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title"> القادة التنفيذيين وطلباتهم</h1>
				</div>
				<div class="modal-body">
					<?php
					$leaders = $this->ExceptionalExcutiveModel->retrieve_leaders_exc( $supervisor, $rank );
					?>
					<table class="table">
						<thead>
							<th>اسم القائد</th>
							<th>تعديل البيانات</th>
							<th>طلب أعضاء</th>
						</thead>
						<tbody>
							<?php
							while ( $leader = $leaders->fetch_assoc() ) {
								$id = $leader[ 'id' ];
								?>
							<tr>
								<td><a href="<?php echo $leader['leader_link'];?>" target="_blank" style="color:#214761"><i class="fa fa-external-link"></i> <?php echo $leader['leader_name'];?></a>
								</td>
								<td><a data-toggle="collapse" data-target="#edit<?php echo $id;?>" style="color: #214761"><i class="fa fa-edit"></i></a>
								</td>
								<td><a data-toggle="collapse" data-target="#add<?php echo $id;?>" style="color: #214761"><i class="fa fa-user-plus"></i></a>
								</td>
							</tr>
							<?php
							if ( $leader[ 'leader_link' ] == null && $leader[ 'leader_gender' ] == null ) {
								?>
							<tr class="collapse" id="edit<?php echo $id;?>">
								<td colspan="3">
									<div class="alert alert-warning" style="text-align: center">
										لا يمكنك التعديل, لم يتم تسجيل بيانات القائد بعد..!
									</div>
								</td>
							</tr>
							<tr class="collapse edit" id="add<?php echo $id;?>">
								<td colspan="3">
									<h3 style="text-align: center">طلب أعضاء جدد</h3>
									<p id="msgAdd<?php echo $id;?>"></p>
									<form enctype="multipart/form-data" method="post">
										<div class="form-group">
											<label for="leaderLink<?php echo $id;?>" class="form-label"> رابط صفحة القائد: </label>
											<input type="text" name="leaderLink<?php echo $id;?>" id="leaderLink<?php echo $id;?>" placeholder="رابط صفحة القائد:" class="form-control" required="required">

										</div>
										<label name="msg-ch-add1<?php echo $id;?>" id="msg-ch-add1<?php echo $id;?>" style="display: none; color: red"> الرجاء كتابة الرابط </label>

										<div class="form-group">
											<label for="teamLink<?php echo $id;?>" class="form-label">رابط فريق القائد:</label>
											<input type="text" name="teamLink<?php echo $id;?>" id="teamLink<?php echo $id;?>" placeholder="رابط فريق القائد:" class="form-control" required="required">

										</div>
										<label name="msg-ch-add2<?php echo $id;?>" id="msg-ch-add2<?php echo $id;?>" style="display: none; color: red"> الرجاء كتابة الرابط </label>

										<div class="form-group">
											<label for="currCount<?php echo $id;?>" class="form-label">عدد الفريق الحالي: </label>
											<select name="currCount<?php echo $id;?>" id="currCount<?php echo $id;?>" class="form-control">
												<?php
												for ( $i = 0; $i <= 16; $i += 1 ) {
													echo "<option value='$i'>$i</option>";
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="leaderGender<?php echo $id;?>" class="form-label"> جنس القائد: </label>
											<select name="leaderGender<?php echo $id;?>" id="leaderGender<?php echo $id;?>" class="form-control">
												<option value="female">أنثى</option>
												<option value="male">ذكر</option>
											</select>
										</div>
										<div class="form-group">
											<label for="numOfMembers<?php echo $id;?>"> عدد الأعضاء المطلوب: </label>
											<select name="numOfMembers<?php echo $id;?>" id="numOfMembers<?php echo $id;?>" class="form-control" required="required">
												<?php
												for ( $i = 8; $i <= 16; $i += 2 ) {
													echo "<option value='$i'>$i</option>";
												}
												?>
											</select>
										</div>
									</form>
									<div class="form-group">
										<button type="submit" name="submitAdd<?php echo $id;?>" class="btn btn-block" id="subBtnAdd<?php echo $id;?>" onClick="addFull('<?php echo $id;?>')" style="background-color: #214761; color: #fff; font-size: 1.5rem;font-weight: bold;">تقديم الطلب</button>
									</div>

								</td>
							</tr>
							<?php
							} else {
								?>
							<tr class="collapse edit" id="edit<?php echo $id;?>">
								<td colspan="3">
									<h3 style="text-align: center">تعديل بيانات القائد</h3>
									<p id="msgEdit<?php echo $id;?>"></p>
									<form enctype="multipart/form-data" method="post">
										<div class="form-group">
											<label for="leaderLink">اسم القائد كما هو على الفيسبوك:</label>
											<input type="text" name="leaderName<?php echo $id;?>" id="leaderName<?php echo $id;?>" value="<?php echo $leader['leader_name'];?>" class="form-control" required="required">
										</div>
										<label name="msg-name<?php echo $id;?>" id="msg-name<?php echo $id;?>" style="display: none; color: red"> الرجاء كتابة الاسم! </label>

										<div class="form-group">
											<label for="leaderLink">رابط صفحته الشخصية: </label>
											<input type="text" name="leaderLink<?php echo $id;?>" id="leaderLink<?php echo $id;?>" value="<?php echo $leader['leader_link'];?>" class="form-control" required="required">
										</div>
										<label name="msg-ch1<?php echo $id;?>" id="msg-ch1<?php echo $id;?>" style="display: none; color: red"> الرجاء كتابة رابط الصفحة! </label>
										<div class="form-group">
											<label for="teamLink">رابط فريق المتابعة الخاص به: </label>
											<input type="text" name="teamLink<?php echo $id;?>" id="teamLink<?php echo $id;?>" value="<?php echo $leader['team_link'];?>" class="form-control" required="required">
										</div>
										<label name="msg-ch2<?php echo $id;?>" id="msg-ch2<?php echo $id;?>" style="display: none; color: red"> الرجاء كتابة رابط الفريق </label>
									</form>
									<div class="form-group ">
										<button class="btn btn-block" name="check-btn1<?php echo $id;?>" id="check-btn1<?php echo $id;?>" onClick="check1('<?php echo $id;?>')" style=" background-color: #214761;color: #fff; font-size: 1.5rem;font-weight: bold;"><i class="fa fa-external-link" aria-hidden="true"></i> اختبار رابط الصفحة</button>

										<div id="check_div1<?php echo $id;?>" style=" margin-top: 3%; margin-bottom: 3%;">
											<input type="checkbox" id="check1<?php echo $id;?>">
											<label>  تم التأكد من صحة رابط الصفحة</label>
										</div>
									</div>
									<div class="form-group">
										<button name="check-btn2<?php echo $id;?>" id="check-btn2<?php echo $id;?>" class="btn btn-block" onclick="check2('<?php echo $id;?>')" style=" background-color:#214761; color: #fff; font-size: 1.5rem;font-weight: bold;"><i class="fa fa-external-link" aria-hidden="true"></i> اختبار رابط الفريق</button>

										<div id="check_div2<?php echo $id;?>" style="margin-top: 3%; margin-bottom: 3%;">
											<input type="checkbox" id="check2<?php echo $id;?>">
											<label>  تم التأكد من صحة رابط الفريق</label>
										</div>

									</div>
									<label name="check-msg<?php echo $id;?>" id="check-msg<?php echo $id;?>" style="display: none; color: red"> الرجاء تأكيد اختبار الروابط! </label>
									<div class="form-group">
										<button type="submit" name="submit<?php echo $id;?>" class="btn btn-block" id="subBtn<?php echo $id;?>" onClick="edit('<?php echo $id;?>')" style="background-color: #214761; color: #fff; font-size: 1.5rem;font-weight: bold;">تعديل</button>
									</div>

								</td>
							</tr>
							<tr class="collapse edit" id="add<?php echo $id;?>">
								<td colspan="3">

									<h3 style="text-align: center">طلب أعضاء جدد</h3>
									<p id="msgAdd2<?php echo $id;?>"></p>
									<form enctype="multipart/form-data" method="post">
										<div class="form-group">
											<label for="currCount<?php echo $id;?>" class="form-label">عدد الفريق الحالي: </label>
											<select name="currCount<?php echo $id;?>" id="currCount<?php echo $id;?>" class="form-control">
												<?php
												for ( $i = 0; $i <= 16; $i += 1 ) {
													echo "<option value='$i'>$i</option>";
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="numOfMembers<?php echo $id;?>"> عدد الأعضاء المطلوب: </label>
											<select name="numOfMembers<?php echo $id;?>" id="numOfMembers<?php echo $id;?>" class="form-control" required="required">
												<?php
												for ( $i = 8; $i <= 16; $i += 2 ) {
													echo "<option value='$i'>$i</option>";
												}
												?>
											</select>
										</div>
									</form>
									<div class="form-group">
										<button type="submit" name="submitAdd2<?php echo $id;?>" class="btn btn-block" id="subBtnAdd2<?php echo $id;?>" onClick="addExc('<?php echo $id;?>')" style="background-color: #214761; color: #fff; font-size: 1.5rem;font-weight: bold;">تقديم الطلب</button>
									</div>

								</td>
							</tr>
							<?php
							}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق </button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function check1( id ) {
			var URL = document.getElementById( 'leaderLink' + id ).value;
			if ( URL == "" ) {
				document.getElementById( 'msg-ch1' + id ).style.display = "block";
			} else {
				document.getElementById( 'msg-ch1' + id ).style.display = "none";
				window.open( URL );
			}
		}

		function check2( id ) {
			var teamURL = document.getElementById( 'teamLink' + id ).value;
			if ( teamURL == "" ) {
				document.getElementById( 'msg-ch2' + id ).style.display = "block";
			} else {
				document.getElementById( 'msg-ch2' + id ).style.display = "none";
				window.open( teamURL );
			}
		}

		function edit( id ) {
			var base_url = "<?php echo base_url()?>";
			document.getElementById( 'subBtn' + id ).onclick = function () {
				if ( document.getElementById( 'check1' + id ).checked == true && document.getElementById( 'check2' + id ).checked == true ) {
					document.getElementById( 'check-msg' + id ).style.display = "none";
					$.ajax( {
						type: "POST",
						url: base_url + "index.php/exceptionalExcutiveTeams/editExc",
						data: {
							id: id,
							leaderLink: $( "#leaderLink" + id ).val(),
							leaderName: $( "#leaderName" + id ).val(),
							teamLink: $( "#teamLink" + id ).val()

						},
						beforeSend: function () {
							return confirm( "هل أنت متأكد من أنك تريد تعديل البيانات؟" );
						},
						success: function ( data ) {
							$( '#msgEdit' + id ).html( data );
						}
					} );
				} else {
					document.getElementById( 'check-msg' + id ).style.display = "block";
				}

			};
		}

		function addFull( id ) {
			var base_url = "<?php echo base_url()?>";
			document.getElementById( 'subBtnAdd' + id ).onclick = function () {

				if ( document.getElementById( 'leaderLink' + id ).value == "" ) {
					document.getElementById( 'msg-ch-add1' + id ).style.display = "block";
				} else {
					document.getElementById( 'msg-ch-add1' + id ).style.display = "none";
				}
				if ( document.getElementById( 'teamLink' + id ).value == "" ) {
					document.getElementById( 'msg-ch-add2' + id ).style.display = "block";
				} else {
					document.getElementById( 'msg-ch-add2' + id ).style.display = "none";
				}

				if ( document.getElementById( 'leaderLink' + id ).value != "" && document.getElementById( 'teamLink' + id ).value != "" ) {
					$.ajax( {
						type: "POST",
						url: base_url + "index.php/exceptionalExcutiveTeams/addExcFull",
						data: {
							id: id,
							leaderLink: $( "#leaderLink" + id ).val(),
							leaderGender: $( "#leaderGender" + id ).val(),
							teamLink: $( "#teamLink" + id ).val(),
							currCount: $( "#currCount" + id ).val(),
							numOfMembers: $( "#numOfMembers" + id ).val(),
							max: 16

						},

						success: function ( data ) {
							$( '#msgAdd'+id ).html( data );
						}
					} );
				}
			};
		}

		function addExc( id ) {
			var base_url = "<?php echo base_url()?>";
			document.getElementById( 'subBtnAdd2' + id ).onclick = function () {

				$.ajax( {
					type: "POST",
					url: base_url + "index.php/exceptionalExcutiveTeams/addExc",
					data: {
						id: id,
						currCount: $( "#currCount" + id ).val(),
						numOfMembers: $( "#numOfMembers" + id ).val(),
						max: 16
					},
					success: function ( data ) {
						$( '#msgAdd2' + id ).html( data );
					}
				} );
			};
		}
	</script>
</body>
</html>