<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/teamsCarousel.css">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/carousel.css"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
.link, .fa{
	color: #205D67;
}
.fa{
	font-size: 1vw;
}
.link:hover, .fa:hover{
	color: #205D67;
	font-weight: bold;
}

	.names {
		display: inline;
		text-align: center;
		font-size: 1.5rem;
	}

	.mybutton {
		width: 100%;
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
							if ( $requests->num_rows() > 0 ) {

								foreach ( $requests->result() as $request ) {
									$id = $request->Rid;
									$leaderEmail = $request->leader_email;
									$num_of_members = 20; // a query to be run here to get total members (based on leader email) from the official database
									$query = $this->GeneralModel->get_data( $id, 'request_id', 'ambassador', 'name, gender' );
									?>
							<div class="mySlides carousel-slide">
								<h4 class="heading" style="text-align:center;">
									<?php echo "فريق: <a href='$request->team_link' class='link'><i class='fa fa-external-link' aria-hidden='true'></i>" . $request->team_name . "</a> - " . "القائد: <a href='$request->leader_link' class='link'><i class='fa fa-external-link' aria-hidden='true'></i>" . $request->leader_name . "</a>"; ?>
								</h4>
								<p style="text-align: center;">
									<small>
								عدد أعضاء الفريق: <?php echo $num_of_members;?> - الأعضاء الجدد: <?php echo $query->num_rows();?> - تاريخ الطلب: <?php echo date('Y-m-d', strtotime($request->date));?>
								</small>


								</p>
								<ul class="list-group list-group-flush" style="text-align: center;list-style: none;" id="<?php echo $id;?>">
									<?php
									foreach ( $query->result() as $row ) {
										?>
									<li class="list-group-item">
										<p class="names">
											<?php echo $row->name." ";?>
										</p>
										<small>
											<?php
											if ( $row->gender == 'female' || $row->gender == 'Female' ) {
												echo '(أنثى)';
											} else if ( $row->gender == 'male' || $row->gender == 'Male' ) {
												echo 'ذكر';
											}
											?>
										</small>
									</li>
									<?php
									}
									$leaderName = $request->leader_name;
									?>
								</ul>

								<button id="<?php echo $id; ?>" name="done" class="mybutton" style="margin-right: 10px; background-color: #459b6e;" onclick="send_to_leader(<?php echo $id;?>);">تم التواصل </button>
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
<script src="<?php echo base_url()?>assets/js/mentorshipTeam.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/copy.js"></script>