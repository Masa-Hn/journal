<style>
	th,
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

</style>
<body>

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#reqModal" id="reqModalBtn">
	<i class="fa fa-user-plus" aria-hidden="true"></i>
    قائمة الأعضاء الجدد
</button>


	<!-- Modal -->
	<div id="reqModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title">الأعضاء الجدد </h1>
				</div>

				<div class="modal-body">

					<table class="table">
						<thead>
							<th>اسم السفير</th>
							<th>الجنس</th>
							<th>الاستقبال</th>
						</thead>
						<tbody>
							<?php
							if ( $ambassadors->num_rows > 0 ) {
								while ( $amb = $ambassadors->fetch_array( MYSQLI_ASSOC ) ) {
									$id = $amb[ 'id' ];
									?>
							<tr>
								<td><i class="fa fa-external-link" aria-hidden="true"></i>
									<a class="link" href="<?php echo $amb['profile_link'];?>">
										<?php echo $amb['name']; ?>
									</a>
								</td>
								<td>
									<?php echo ($amb['gender'] == 'female' || $amb['gender'] == 'Female') ? "أنثى" :  "ذكر"; ?>
								</td>
								<td><input type="checkbox" name="join" <?php if ($amb[ 'join_following_team']==1 ) echo "checked";?> id="
									<?php echo $id;?>" onchange="cTrig('
									<?php echo $id;?>');"></td>
							</tr>
							<?php

							}
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق</button>
				</div>

			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
	<script>
		function cTrig( id ) {
			if ( document.getElementById( id ).checked == true ) {
				swal( {
						icon: 'warning',
						title: 'تأكيد الانضمام',
						text: ' هل أنت متأكد من أن السفير انضم لمجموعة المتابعة؟',
						type: "warning",
						showConfirmButton: true,
						showCloseButton: true,
						showCancelButton: true,
						focusConfirm: false,
						confirmButtonText: 'نعم',
						cancelButtonText: 'إلغاء',
						confirmButtonColor: "#205d67",
						closeOnConfirm: false,
						closeOnCancel: true
					},
					function ( isConfirm ) {

						if ( isConfirm ) {
							var base_url = "<?php echo base_url()?>";

							$.ajax( {
								url: base_url + 'newMembersList/joined_ambassador',
								type: 'POST',
								data: {
									checked: id
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
						} else {
							console.log( "canceled" );
						}
					} );
			} else {
				swal( {
						icon: 'warning',
						title: 'تأكيد الانضمام',
						text: ' هل أنت متأكد من أن السفير ليس موجود في مجموعة المتابعة؟',
						type: "warning",
						showConfirmButton: true,
						showCloseButton: true,
						showCancelButton: true,
						focusConfirm: false,
						confirmButtonText: 'نعم',
						cancelButtonText: 'إلغاء',
						confirmButtonColor: "#205d67",
						closeOnConfirm: false,
						closeOnCancel: true
					},
					function ( isConfirm ) {

						if ( isConfirm ) {
							var base_url = "<?php echo base_url()?>";

							$.ajax( {
								url: base_url + 'newMembersList/joined_ambassador',
								type: 'POST',
								data: {
									notChecked: id
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
						} else {
							console.log( "canceled" );
						}
					} );
			}
		}
	</script>
</body>
</html>