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
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="card b-0" style="overflow-x: auto;">

              <!-- number of row to display -->
              <input type="hidden" id="bookDisplay" name="bookDisplay" value="15">
              
              <form class="s-form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>/MentorshipTeam2/searchRequest">
                <div class="row">
                  <div class="col-md-7">
                    <input class="form-control" name="s-text" id="s-text" type="text" placeholder="ابحث عن طريق اسم القائد/السفير أو التاريخ">
                  </div>
                  <div class="col-md-3">
                    <input class="form-control" name="s-date" id="s-date" type="date" placeholder="<?php echo date('Y-m-d');?>">
                  </div>
                  <div class="col-md-2">
                    <input class="form-control" name="s-btn" id="s-btn" type="submit" value="بحث">
                  </div>
                </div>
              </form>
              
              <table id="dataTable" class="cell list-wrapper" dir="rtl">
                <thead>
                  <tr>
                    <th><span class="visually-hidden">Toggle</span></th>
                    <th>الفريق</th>
                    <th>القائد</th>
                    <th>الجنس</th>
                    <th>عدد الأعضاء الجدد</th>
                    <th>تاريخ الطلب</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($requests->result() as $request) {
                      $id = $request->Rid;
                      $ambassadors = $this->GeneralModel->get_data($request->Rid, 'requestId', 'ambassador', 'name, gender,profile_link');
                      $newMembers = $ambassadors->num_rows();

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
