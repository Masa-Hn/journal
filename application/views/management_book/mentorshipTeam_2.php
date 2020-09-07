<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/teamsCarousel.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
	.link {
		color: #205D67;
	}
	
	.link:hover {
		color: #205D67;
		font-weight: bold;
	}
	
	body,
	html {
		height: 100%;
	}

</style>
<body>
	<div class="container-fluid px-1 py-5 mx-auto">
		<div class="row d-flex justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-7">
				<div class="card b-0">
					<div class="slideshow-container">
						<div class="carousel-container w3-display-container " id="seriesPhotos">
							<?php
							//$ci = & get_instance();
							//$ci->load->model( 'GeneralModel' );
							if ( $requests->num_rows() > 0 ) {

								foreach ( $requests->result() as $request ) {
									$id = $request->id;
									$leaderEmail = $request->leader_email;
									$num_of_members = 20; // a query to be run here to get total members (based on leader email) from the official database
									$query = $this->GeneralModel->get_data( $request->id, 'requestId', 'ambassador', 'name, gender' );
									?>
							<div class="mySlides carousel-slide">
								<h4 class="heading" style="text-align:right;">
									<?php echo "فريق: <a href='$request->team_link' class='link'>" . $request->team_name . "</a> - " . "القائد: <a href='$request->leader_link' class='link'>" . $request->leader_name . "</a>"; ?>
								</h4>
								<p style="text-align: center;"><small> 
								عدد أعضاء الفريق: <?php echo $num_of_members;?> - الأعضاء الجدد: <?php echo $query->num_rows();?>
								</small>
								
								</p>
								<ul style="text-align: center;list-style: none;" id="<?php echo $id;?>">
									<?php
									foreach ( $query->result() as $row ) {
										?>
									<li>
										<?php echo $row->name;?> </li>
									<?php
									}
									$leaderName = $request->leader_name;
									?>
								</ul>

								<button id="<?php echo $id; ?>" name="done" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="send_to_leader(<?php echo $id;?>);">تم </button>
								<button id="<?php echo $id; ?>" name="copy" class="mybutton" style="background-color: #205d67;" onclick="copyMsg('<?php echo $id;?>', '<?php echo $leaderName;?>')">نسخ</button>
							</div>
							<?php
							}
							} else {
								?>
							<div class="card text-center">
								<h1>لا يوجد طلبات</h1>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<div>
						<a class="prev w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
						<a class="next w3-display-right" onclick="plusDivs(1)">&#10095;</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header text-center" style="background-color:#205d67; color: #fff; ">
					العدد الكلي للقادة الذين لم يتم التواصل معهم بعد:
					<?php echo $requests->num_rows();?>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/teamCarousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script type="text/javascript">
	function copyMsg( id, leaderName ) {
		var lst = document.getElementById( id ).querySelectorAll( "li" );
		var i, x = "";
		x += "مرحباً قائد " + leaderName + "\n\n";
		x += "لطفا قم باستقبال الأعضاء التالية اسماؤهم :\n\n";
		for ( i = 0; i < lst.length; i++ ) {
			x += lst[ i ].textContent + "\n";
		}
		x += "\n\nشكراً جداً لحضرتك \n فريق الإدخال";
		var copyText = document.createElement( 'textarea' );
		copyText.value = x;
		document.body.appendChild( copyText );
		copyText.select();
		document.execCommand( 'copy' );
		// Remove temporary textarea
		document.body.removeChild( copyText );
		Swal.fire( {
			icon: 'success',
			title: 'تم نسخ الأسماء والرسالة',
			text: 'يمكنك إرسال الرسالة للقائد',
			showConfirmButton: false,
			timer: 3000
		} );
		console.log( x );
	}

	function send_to_leader( id ) {
		swal( {
				icon: 'warning',
				title: 'تأكيد الإرسال!',
				text: ' هل أنت متأكد من أنك راسلت القائد بالأسماء؟',
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
						url: base_url + 'MentorshipTeam/send_to_leader',
						type: 'POST',
						data: {
							id: id
						},
						dataType: 'text',
						success: function () {
							/*	swal( {
						title: 'تم الحفظ',
						text: 'بوركت جهودك',
						type: "success",
						showConfirmButton: true,
						confirmButtonText: 'حسناً',
						confirmButtonColor: "#205d67"
					} );*/
							window.setTimeout( function () {}, 3000 );
							location.reload();
						},
						error: function ( error ) {
							console.log( "error" );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			} );
	}
</script>