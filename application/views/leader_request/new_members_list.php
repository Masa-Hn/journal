<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
		$( document ).ready( function () {
		
			
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
					
			}else{
				$( "#newReqModal" ).modal( "hide" );
			}
			}else{
				$( "#newReqModal" ).modal( "hide" );
			}
			
			console.log( flag );
		} );
	</script>
<body>

	<a href="#" data-toggle="modal" data-target="#newReqModal" id="reqModalBtn"><img src="<?php echo base_url() ?>admin/img/newmembers.png" width="30px"> قائمة الأعضاء الجدد</a>
	<br>

	<!-- Modal -->
	<div id="newReqModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" style="text-align: center">الأعضاء الجدد</h3>
				</div>

				<div class="modal-body">

					<?php
					if ( empty( $info ) == true ) {
						if ( isset( $ambassadors ) ) {
							if ( $ambassadors->num_rows > 0 ) {
								?>
					<div style="text-align: center; margin-bottom: 5%;">
						<h4>كلمة السر الخاصة (كود) بدخول فريق المتابعة:</h4>
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
							while ( $amb = $ambassadors->fetch_array( MYSQLI_ASSOC ) ) {
								$id = $amb[ 'id' ];
								?>
							<tr>
								<td><i class="fa fa-external-link" aria-hidden="true"></i>
									<a class="link" href="<?php echo $amb['profile_link'];?>">
										<span id="ambassador_<?php echo $id;?>"><?php echo $amb['name']; ?></span>
									</a>
								</td>
								<td>
									<?php echo ($amb['gender'] == 'female' || $amb['gender'] == 'Female') ? "أنثى" :  "ذكر"; ?>
								</td>
								<td><input type="checkbox" name="joined" class="joined" <?php if ($amb[ 'join_following_team']==1) echo "checked";?> id="<?php echo "joined".$id;?>" onclick="joined('<?php echo $id;?>');"></td>
								<td><input type="checkbox" name="notJoined" class="joined" <?php if ($amb[ 'join_following_team']==2) echo "checked";?> id="<?php echo "notJoined".$id;?>" onclick="notJoined('<?php echo $id;?>');"></td>
								<td>
									<a class="link" name="copyMsg" id="<?php echo $id; ?>" onClick="copyMsg('<?php echo $amb['name']; ?>' , '<?php echo $leader_name; ?>', '<?php echo $uniqid.$leader_id;?>')" style="color: #214761;"><i class="fa fa-copy" style="color: #214761;"></i></a>
								</td>

							</tr>
							<?php

							}

							?>
						</tbody>
					</table>
					<?php }
					} else {
						echo "<div class='alert alert-danger' style='font-size:1.7rem; font-weight:bold; text-align:center;'>" . "?? ???? ????? ??? ????" . "</div>";
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
	<script type="text/javascript">
		function joined( id ) {
			if ( document.getElementById( "joined" + id ).checked == true ) {
				var success = confirm( "هل أنت متأكد من أن العضو تم استقباله؟" );
				var base_url = "<?php echo base_url()?>";

				if ( success == true ) {
					document.getElementById( "notJoined" + id ).checked = false;
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
                            location.reload();
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

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
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

		function copyMsg( ambName, leaderName, uniqid ) {

			var x = "";
			x += "مرحباً " + ambName + "\n.\n";
			x += "أنا " + "( " + leaderName + " )" + "\n.\n";
			x += "سأكون مشرف القراءة الخاص بك داخل أصبوحة ١٨٠." + "\n.\n.\n";
			x += "سعيد جدا بانضمامك معنا ك قارئ جديد في مشروع صناعة القُراء.\n\n";
			x += "بداية ما رايك أن تعرفني بنفسك اكثر؟ 🌸🌸" + "\n.\n";
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
                        //location.reload();
                    }
                });
            }
        }
        
        function out(){
        
            var name = document.getElementById("ambassador_").textContent;
            var msg  = 'هل انت متأكد من ان '+name+' لم يتضم للفريق؟';
            
            if (confirm(msg)){
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
                                alert("تم إضافة السفير لقائمة المنسحبين");
                            }
                        });//location.reload();
                    }
                });
            }
        }
	</script>
</body>
</html>