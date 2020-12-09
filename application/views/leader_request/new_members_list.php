<style>
	.th,
	tr,
	td {
		text-align: center;
	}
	
	.link,
	.fa {
		color: #214761;
		margin-left: 1%;
	}
	
	.fa {
		font-size: 12px;
	}
	
	.link:hover,
	.fa:hover {
		color: #214761;
		font-weight: bold;
	}
	
	[type="checkbox"] {
		width: 1.25em;
		height: 1.25em;
	}
	.container-contact100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  
  
}

.wrap-contact100 {
  width: 500px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  padding: 42px 55px 45px 55px;
  background-color: #FFF;
    border-radius: 25px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    padding: 40px;
    z-index: 0
}
.contact100-form-title {
  display: block;
  font-family: Poppins-Bold;
  font-size: 25px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 44px;
}
.wrap-input100 {
  width: 100%;
  position: relative;
  padding-bottom: 13px;
  margin-bottom: 50px;
  margin-top: 50px;
}


.input100 {
  margin-top: 300px;
	outline: none;
	border: none;
  display: block;
  width: 100%;
  background: transparent;
  font-size: 18px;
  color: #333333;
  line-height: 1.2;
  padding: 0 5px;
  text-align: center;
}

.contact100-form-btn {
  text-align: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
}
.container-contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 13px;
}

.wrap-contact100-form-btn {
  width: 100%;
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 25px;
  overflow: hidden;
  margin: 0 auto;
}

.contact100-form-bgbtn {
  position: absolute;
  z-index: -1;
  width: 300%;
  height: 100%;
  background: #a64bf4;
  background: -webkit-linear-gradient(left, #00dbde, #fc00ff, #00dbde, #fc00ff);
  background: -o-linear-gradient(left, #00dbde, #fc00ff, #00dbde, #fc00ff);
  background: -moz-linear-gradient(left, #00dbde, #fc00ff, #00dbde, #fc00ff);
  background: linear-gradient(left, #00dbde, #fc00ff, #00dbde, #fc00ff);
  top: 0;
  left: -100%;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;

  font-family: Poppins-Medium;
  font-size: 20px;
  color: red;
  line-height: 1.2;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
    
    <a href="#"  data-toggle="modal" data-target="#newReqModal" id="reqModalBtn"><img src="<?php echo base_url() ?>admin/img/newmembers.png" width="30px">  قائمة الأعضاء الجدد</a>
    <br>

	<!-- Modal -->
	<div id="newReqModal" class="modal fade" role="dialog" >
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
                        if(isset ($ambassadors)){
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
							<th class="th">اسم السفير</th>
							<th class="th">الجنس</th>
							<th class="th">تم الاستقبال</th>
							<th class="th">لم يتم الاستقبال</th>
							<th class="th">رسالة التعريف</th>
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
								<td><input type="checkbox" name="joined" <?php if ($amb[ 'join_following_team']==1) echo "checked";?> id="<?php echo "joined".$id;?>" onclick="joined('<?php echo $id;?>');"></td>
								<td><input type="checkbox" name="notJoined" <?php if ($amb[ 'join_following_team']==2) echo "checked";?> id="<?php echo "notJoined".$id;?>" onclick="notJoined('<?php echo $id;?>');"></td>
								<td>
									<button class="btn" name="copyMsg" id="<?php echo $id; ?>" onClick="copyMsg('<?php echo $amb['name']; ?>' , '<?php echo $leader_name; ?>', '<?php echo $uniqid.$leader_id;?>')" style="background-color:#214761; color: #fff; ">نسخ الرسالة</button>
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
				
			<div class="modal-body">
		<form class="contact100-form validate-form" enctype="multipart/form-data" method="post" action="<?php echo base_url()?>newMembersList/saveProfileLink">
			<span class="contact100-form-title">
					قائدنا .. ساعد القارئ الجديد لينضم لمجموعة سفراء أصبوحة180, ثم قم بإدخال رابط صفحته على الفيسبوك ليتم قبوله في مجموعة سفراء أصبوحة
				</span>
	         <div class="wrap-input100">

				<img style="float: right;padding-right: 15%" src="<?php echo base_url()?>/assets/img/profile_link.jpg">
			</div>
	         
	         <div class="wrap-input100" style="  border-bottom: 2px solid #d9d9d9;">
				<input class="input100" type="url" id="profile_link" name="profile_link" placeholder="الرجاء إدخال رابط صفحة السفير">
				<input style="display: none;" type="text" id="amb_id" name="amb_id" value="<?php echo $id; ?>">
						<span class="focus-input100"></span>
			 </div>           	
			 <div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								حفظ
							</span>
						</button>
					</div>
				</div>
		</form>
</div>
</div>
</div>
</div>
	<script type="text/javascript">
		$( document ).ready( function () {
			// Show the Modal on load
			$( "#newReqModal" ).modal( "show" );

		} );

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
			x += "أنا " + "( " + leaderName + ")" + "\n.\n";
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