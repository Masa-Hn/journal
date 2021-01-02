<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<a href="#" data-toggle="modal" data-target="#newReqModal" id="reqModalBtn"><img src="<?php echo base_url() ?>admin/img/newmembers.png" width="30px">  قائمة الأعضاء الجدد</a>
	<br>

	<!-- Modal -->
	<div id="newReqModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">الأعضاء الجدد </h3>
				</div>

				<div class="modal-body">

					<?php
					if ( empty( $info ) == true ) {
						if ( isset( $ambassadors ) ) {
							if ( $ambassadors->num_rows > 0 ) {
								?>
					<div style="text-align: center; margin-bottom: 5%;">
						<h4>كلمة السر الخاصة (كود) بدخول فريق المتابعة: </h4>
						<h3 style="color: #C50407;">
							<?php echo $uniqid.$leader_id; ?>
						</h3>
					</div>

					<table class="table">
						<thead>
							<th style="text-align:center">اسم السفير</th>
							<th style="text-align:center">الجنس</th>
							<th style="text-align:center">تم الاستقبال</th>
							<th style="text-align:center">لم يتم الاستقبال</th>
							<th style="text-align:center">رسالة التعريف</th>
						</thead>
						<tbody>
							<?php
							$rid = 0;

							while ( $amb = $ambassadors->fetch_array( MYSQLI_ASSOC ) ) {
								$id = $amb[ 'id' ];

								//to counte how many members left
								$rid = $amb['request_id'];
								$leavers = $this->requestsModel->get_leavers($rid)->num_rows;
                                $leader = $this->requestsModel->get_data($rid, 'Rid', 'leader_request', 'leader_id, current_team_count')->fetch_assoc();
								$teamCount = $leader['current_team_count']; //to be retrieved from the base Database
								
								$leader_id = $leader['leader_id'];
								//end process
								?>
							<tr style="text-align: center; color:#214761 ">
								<td>
									<span class="link" id="ambassador_<?php echo $id;?>"><?php echo $amb['name']; ?></span>
								</td>
								<td>
									<?php echo ($amb['gender'] == 'female' || $amb['gender'] == 'Female') ? "أنثى" :  "ذكر"; ?>
								</td>
								<td><input type="checkbox" name="joined" class="joined" <?php if ($amb[ 'join_following_team']==1) echo "checked";?> id="<?php echo "joined".$id;?>" onclick="joined('<?php echo $id;?>');"></td>
								<td><input type="checkbox" name="notJoined" class="joined" <?php if ($amb[ 'join_following_team']==2) echo "checked";?> id="<?php echo "notJoined".$id;?>" onclick="notJoined('<?php echo $id;?>');"></td>
								<td>
									<a class="link" name="copyMsg" id="<?php echo $id; ?>" onClick="copyMsg('<?php echo $amb['name']; ?>' , '<?php echo $leader_name; ?>', '<?php echo $uniqid.$leader_id;?>')" style="color: #214761;"><i class="fas fa-copy"></i></a>
								</td>

							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<?php }
					} else {
						echo "<div class='alert alert-danger' style='font-size:1.7rem; font-weight:bold; text-align:center;'>" . "لا يوجد أعضاء جدد لديك" . "</div>";
					}
					} else {
						echo "<div class='alert alert-danger' style='font-size:1.7rem; font-weight:bold; text-align:center;'>" . $info . "</div>";
					}
					?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق</button>
				</div>

			</div>
		</div>
	</div>

    <div class="modal fade" role="dialog" id="profile_link_save" >
			<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">إضافة رابط السفير </h3>
				</div>
                <div class="modal-body">
                    <?php
					if(empty($info) == true){
						if(isset($ambassadors)){ ?>
                    <div class="contact100-form validate-form" >
                        <span class="contact100-form-title">
                            قائدنا .. ساعد القارئ الجديد لينضم لمجموعة سفراء أصبوحة 180، ثم قم بإدخال رابط صفحته على الفيسبوك ليتم قبوله في مجموعة سفراء أصبوحة
                        </span>
                        <div id="msg_<?php echo $id; ?>"></div>
                        <div align="center" style="display: none" id="copy_link">
                            <img style="align-items: center" src="<?php echo base_url()?>/admin/img/profile_link.jpg">
                        </div>

                        <a class="" onclick="showImg()" id="img-btn">كيفية نسخ الرابط؟</a>
                        <br>
                        <!--
                        <div class="wrap-input100" style="  border-bottom: 2px solid #d9d9d9;">
                            <input class="input100" type="url" id="profile_link_<?php echo $id; ?>" name="profile_link" placeholder="الرجاء إدخال رابط صفحة السفير">
                            <input style="display: none;" type="text" id="amb_id" name="amb_id" value="<?php echo $id; ?>">
                            <span class="focus-input100"></span>
                        </div> -->
                        <div class="form-group">
							<input class="form-control" type="url" id="profile_link_<?php echo $id; ?>" name="profile_link" placeholder="الرجاء إدخال رابط صفحة السفير">
						</div>

                        <button class="btn btn-block regular" id="sub-btn" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;" onclick="addProfileLink(<?php echo $id; ?>)">
                            حفظ
                        </button>
                    </div><?php }} ?>
                </div>
            </div>
        </div>
    </div>
		<div class="modal fade" role="dialog" id="fill_back" >
		<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">تعويض مكان المنسحبين</h3>
				</div>
								<div class="modal-body">
										<div class="contact100-form validate-form" >
												<span class="contact100-form-title">
													إذا كنت تريد طلب أعضاء جدد عوضاً عن السفراء الذين لم يدخلوا الفريق/المنسحبين, حدد جنس الأعضاء ثم اضغط موافق.. سيتم إرسال أعضاء جدد لك
												</span>
												<div id="msg_leavers"></div>
												<div class="form-group">
													<label for="gender" class="form-label">اختر جنس الأعضاء: </label>
													<select name="gender" id="gender" class="form-control">
														<option value="female" class="gender">إناث</option>
														<option value="male" class="gender">ذكور</option>
														<option value="any" class="gender">لا فرق</option>
													</select>
												</div>
												<button class="btn btn-block regular" id="sub-btn-l" style="background-color: #214761; color: #fff; font-size: 1.7rem;font-weight: bold;" onclick="fill_back()">
														حفظ
												</button>
										</div>
								</div>
						</div>
				</div>
		</div>

	<script type="text/javascript">
		function joined( id ) {
			if ( document.getElementById( "joined" + id ).checked == true ) {
				var success = confirm( "هل أنت متأكد من أن العضو تم استقباله؟" );
				var base_url = "<?php echo base_url()?>";

				if ( success == true ) {
					document.getElementById( "notJoined" + id ).checked = false;
					$("#profile_link_save").modal("show");
					$.ajax( {
						url: base_url + 'NewMembersList/joined_ambassador',
						type: 'POST',
						data: {
							Checked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}

					} );
					
					// add ambassador to marks 
                    var name = document.getElementById("ambassador_"+id).textContent;
                    $.ajax({
                        type: "POST",
                        url: base_url+"users/addmem",
                        data:"email=<?php echo $_GET['email'] ?>"+"&name="+name,
                        success: function(msg){
                            //alert("تم إضافة السفير");
                            //location.reload();
                        }
                    });
				} else {
					console.log( "canceled" );
				}
			} else {
				var success = confirm( "هل أنت متأكد من أن العضو جديد؟" );

				if ( success == true ) {
					document.getElementById( "notJoined" + id ).checked = false;
					var base_url = "<?php echo base_url()?>";

					$.ajax( {
						url: base_url + 'NewMembersList/joined_ambassador',
						type: 'POST',
						data: {
							notChecked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			}
		}

		function notJoined( id ) {
			if ( document.getElementById( "notJoined" + id ).checked == true ) {
				var success = confirm( "هل أنت متأكد من أن العضو لم يتم استقباله؟" );
				var base_url = "<?php echo base_url()?>";

				if ( success == true ) {
					document.getElementById( "joined" + id ).checked = false;
					$.ajax( {
						url: base_url + 'NewMembersList/notJoined_ambassador',
						type: 'POST',
						data: {
							Checked: id
						},
						dataType: 'text',
						success: function () {
								window.setTimeout( function () {}, 3000 );
								location.reload();
						},
						error: function ( error ) {
							console.log( error );
						}
					} );

					// add & edit ambassador status
                    var name = document.getElementById("ambassador_"+id).textContent;
                    //var msg  = 'هل انت متأكد من ان '+name+' لم ينضم للفريق؟';

                    //if (confirm(msg)){
                         // add ambassador to marks
                         $.ajax({
                            type: "POST",
                            url: base_url+"users/addambassador",
                            data:"email=<?php echo $_GET['email'] ?>"+"&name="+name,
                            success: function(inserted_id){
                                // edit ambassador status
                                $.ajax({
                                    type: "POST",
                                    url: base_url+"users/leaving",
                                    data: "id=" + inserted_id + "&num=" + 2 ,
                                    success: function(msg){
                                        //alert("تم إضافة السفير لقائمة المنسحبين");
                                        location.reload();
                                    }
                                });
                            }
                        });
                    //}
				} else {
					console.log( "canceled" );
				}
			} else {
				var success = confirm( "هل أنت متأكد من أن العضو جديد؟" );

				if ( success == true ) {
					document.getElementById( "joined" + id ).checked = false;
					var base_url = "<?php echo base_url()?>";

					$.ajax( {
						url: base_url + 'NewMembersList/notJoined_ambassador',
						type: 'POST',
						data: {
							notChecked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			}
		}

		$( document ).ready( function () {
			var counter = <?php echo (isset($leavers))? $leavers : 0;?>;
			var lst = document.querySelectorAll( ".joined" );
			var flag = false;
			var i;
			var info = "<?php echo (empty($info) == false)? $info : '';?>";
			for ( i = 0; i < lst.length; i += 2 ) {
				if ( lst[ i ].checked == true || lst[ i + 1 ].checked == true ) {
					flag = true;
				} else {
					flag = false;
					break;
				}
			}
			if(info == ""){
				if ( !flag ) {
				$( "#newReqModal" ).modal( "show" );
				$( "#fill_back" ).modal( "hide" );
			}else{
				$( "#newReqModal" ).modal( "hide" );
				console.log(counter);
				if(counter>0){
						$( "#fill_back" ).modal( "show" );
				}
			}
			}else{
				$( "#newReqModal" ).modal( "hide" );
				$( "#fill_back" ).modal( "hide" );
			}

			console.log( flag );
		} );

		function copyMsg( ambName, leaderName, uniqid ) {

			var x = "";
			x += "مرحباً " + ambName + "\n.\n";
			x += "أنا " + "( " + leaderName + " )" + "\n.\n";
			x += "سأكون مشرف القراءة الخاص بك داخل أصبوحة ١٨٠." + "\n.\n.\n";
			x += "سعيد جدا بانضمامك معنا ك قارئ جديد في مشروع صناعة القُراء.\n\n";
			x += "بداية ما رايك أن تعرفني بنفسك اكثر؟" + " 🌸🌸" + "\n.\n";
			x += "وأرجو منك الدخول هنا للمجموعة العامة لكل القراء (مهمة جداً)\n.\n";
			x += "https://www.facebook.com/groups/667884100014005" + "\n.\n";
			x += "رمزالدخول للمجموعة, بها كل الأنشطة الأسبوعية لكل القرّاء:\n.\n" + uniqid + "\n\n";

			var copyText = document.createElement( 'textarea' );
			copyText.value = x;
			document.body.appendChild( copyText );
			copyText.select();
			document.execCommand( 'copy' );
			// Remove temporary textarea
			document.body.removeChild( copyText );
			confirm( 'لقد تم نسخ الرسالة, بإمكانك إرسالها إلى السفير!' )
			console.log( x );
		}
		
		// add ambassador to marks 
		/*
        function addmem(){

            var name = document.getElementById("ambassador").textContent;
            var base_url = "<?php echo base_url()?>";

            if(name == '' || name == ' '){
                alert("اسم السفير مطلوب...");
            }else{
                $.ajax({
                    type: "POST",
                    url: base_url+"users/addmem",
                    data:"email=<?php echo $_GET['email'] ?>"+"&name="+name,
                    success: function(msg){
                        alert("تم إضافة السفير");
                        location.reload();
                    }
                });
            }
        }*/

        function addProfileLink(id){
            
            var profile_url = document.getElementById("profile_link_"+id).value;
            var base_url = "<?php echo base_url()?>";

            $.ajax({
                url: base_url + 'NewMembersList/saveProfileLink',
                type: 'POST',
                data: {
                    profile_link: profile_url,
                    amb_id: id
                },
                dataType: 'text',
                success: function (msg) {

                    $( '#msg_'+id ).html( msg );
                    //location.reload();
                },
                error: function ( error ) {
                    console.log( error );
                }

            });
		}

        function showImg(){
            $("#copy_link").css("display","block");
            $("#img-btn").css("display","none");
        }

        function fill_back(){
            var base_url = "<?php echo base_url();?>";
            var counter = <?php echo $leavers;?>;
            var gender = document.getElementById('gender').value;
            var leader_id = <?php echo $leader_id;?>;
            var teamCount = <?php echo $teamCount;?>;

            $.ajax({
                    url: base_url + 'NewMembersList/newRequest',
                    type: 'POST',
                    data: {
                            gender: gender,
                            num: counter,
                            leader_id: leader_id,
                            teamCount: teamCount
                    },
                    dataType: 'text',
                    success: function (msg) {

                            $( '#msg_leavers' ).html( msg );
                            //location.reload();
                    },
                    error: function ( error ) {
                            console.log( error );
                    }
            });
        }
	</script>
