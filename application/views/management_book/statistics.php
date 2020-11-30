<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.card {
		text-align: center;
	}
	
	.card ul {
		display: inline-block;
		margin: 0;
		padding: 0;
		zoom: 1;
		*display: inline;
		text-align: center;
		list-style: none;
		margin-top: 3%;
	}
	
	.card ul h1 {
		text-align: center;
	}
	
	ul {
		direction: rtl;
	}
	
	.fa,
	.list-group-item {
		font-size: 1rem;
	}
	
	.viewers,
	.fa-eye,
	.viewers:hover,
	.fa-eye:hover {
		color: #064500;
	}
	
	.leavers,
	.fa-sign-out,
	.leavers:hover,
	.fa-sign-out:hover {
		color: #B40306;
	}
	
	.title {
		margin-bottom: 2%;
		text-align: center;
	}
	
	.fa-code,
	.fa-user,
	.fa-users,
	.fa-external-link,
	.fa-sort-numeric-asc,
	.fa-external-link,
	.fa-code:hover,
	.fa-user:hover,
	.fa-users:hover,
	.fa-sort-numeric-asc:hover,
	.fa-external-link:hover {
		color: #205d67;
	}
	
	.modalBtn {
		text-align: center;
		font-size: 1 rem;
		color: #205d67;
	}
	
	.modalBtn:hover {
		color: #205d67;
		font-weight: bold
	}

	.list-group-item{
		text-align:right;
	}
</style>
<body>
	<?php
	//$this->StatisticsModel->incrementVisitors( 1 );

	$find = array( "Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri" );
	$replace = array( "السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة" );
	$ar_day_format = date( 'D' );
	$ar_day = str_replace( $find, $replace, $ar_day_format );

	$months = array( "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر" );
	$your_date = date( 'y-m-d' ); // The Current Date
	$en_month = date( "M", strtotime( $your_date ) );
	$ar_month = "";
	foreach ( $months as $en => $ar ) {
		if ( $en == $en_month ) {
			$ar_month = $ar;
		}
	}
	?>
	<div id="disModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="card">
						<h2 class="card-title"> عرض إحصائيات الأزرار والأعضاء المطلوبين</h2>
						<?php
						$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1' )->num_rows();
						$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1' )->num_rows();
						$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1' )->num_rows();

						//get new members
						$daily = $this->StatisticsModel->get_sum_data( 'leader_request', 'members_num', 'is_done = 0' )->row();
						$des = $this->StatisticsModel->get_data( 'ambassador', 'request_id', 'request_id IS NOT NULL' )->num_rows();
						$sum_daily = 0;
						$daily_total = 0;
						if ( $daily->members_num > 0 && $des > 0 ) {
							$sum_daily = $daily->members_num;
							$daily_total = $sum_daily - $des;
						}
						$total_req =  $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 0 or is_done = 1' )->num_rows();

						$is_done = $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 1' )->num_rows();
						$not_done = $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 0' )->num_rows();
						
						$total_amb = $this->StatisticsModel->get_data( 'ambassador', 'request_id', 'request_id IS NOT NULL or request_id IS NULL' )->num_rows();
						
						$not_des_amb =  $this->StatisticsModel->get_data( 'ambassador', 'request_id', 'request_id IS NULL' )->num_rows();

						?>
						<ul class="list-group">
							<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
								<b><?php echo $code_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
								<b><?php echo $leader_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد المتاح لاستقبال أعضاء جدد:
								<b><?php echo $daily_total; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للقادة الذين طلبوا أعضاء:
								<b><?php echo $total_req; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد القادة الموزع لهم أعضاء:
								<b><?php echo $is_done; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد القادة غير الموزع لهم أعضاء:
								<b><?php echo $not_done; ?></b>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="disModal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="card">
						<h2 class="card-title">  إحصائيات الأزرار اليومية </h2>
						<?php
						$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
						$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
						$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
						$total_amb = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL or request_id IS NULL) AND (created_at = DATE(CURDATE()))' )->num_rows();
						$des = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL) AND (created_at = DATE(CURDATE()))' )->num_rows();
						$not_des_amb =  $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NULL) AND (created_at = DATE(CURDATE()))' )->num_rows();

						?>
						<ul class="list-group">

							<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
								<b><?php echo $code_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
								<b><?php echo $leader_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb; ?></b>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="disModal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="card ">
						<h2 class="card-title"> إحصائيات الأزرار الأسبوعية</h2>
						<?php
						$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();
						$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();
						$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();
						$total_amb = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL or request_id IS NULL) AND (YEARWEEK(`created_at`, 6) = YEARWEEK( CURDATE(), 6))' )->num_rows();
						$des = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL) AND (YEARWEEK(`created_at`, 6) = YEARWEEK( CURDATE(), 6))' )->num_rows();
						$not_des_amb =  $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NULL) AND (YEARWEEK(`created_at`, 6) = YEARWEEK( CURDATE(), 6))' )->num_rows();
						?>
						<ul class="list-group">

							<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
								<b><?php echo $code_clicks; ?></b> </li>
							<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
								<b><?php echo $leader_link_clicks; ?></b> </li>
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb; ?></b>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="disModal4" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="card ">
						<h2 class="card-title">إحصائيات الأزرار الشهرية</h2>
						<?php
						$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();
						$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();
						$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();
						$total_amb = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL or request_id IS NULL) AND (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()))' )->num_rows();
						$des = $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NOT NULL) AND (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()))' )->num_rows();
						$not_des_amb =  $this->StatisticsModel->get_data( 'ambassador', 'request_id', '(request_id IS NULL) AND (YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE()))' )->num_rows();
						?>
						<ul class="list-group">

							<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
								<b><?php echo $code_clicks; ?></b> </li>
							<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
								<b><?php echo $leader_link_clicks; ?></b> </li>
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb; ?></b>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid px-1 py-5 mx-auto" dir="rtl">
		<div class="row d-flex justify-content-center">
			<div class="card b-0 mb-1 mr-1 col-md-9">
				<h2 class="title">إحصائيات تراكمية</h2>
				<table class="table">
					<thead>
						<th class="th">اسم الصفحة</th>
						<th class="th">الزائرون</th>
						<th class="th">المغادرون</th>
					</thead>
					<tbody>
						<?php
						$ids = $this->StatisticsModel->selectPages();

						if ( $ids->num_rows() > 0 ) {

							foreach ( $ids->result() as $id ) {
								$page_id = $id->id;

								$a_viewers = 0;
								$a_2_viewers = 0;
								$a_leavers = 0;
								$a_q_2_res = "";
								$a_q_res = "";

								$query = $this->StatisticsModel->get_data( 'statistics', 'visitors', 'page_id = "' . $page_id . '"' );
								if ( $query->num_rows() > 0 ) {
									$a_q_res = $query->row();
									$a_viewers = $a_q_res->visitors;
								}

								$next_page_id = $page_id + 1;

								$query2 = $this->StatisticsModel->get_data( 'statistics', 'visitors', 'page_id = "' . $next_page_id . '"' );
								if ( $query2->num_rows() > 0 ) {
									$a_q_2_res = $query2->row();
									$a_2_viewers = $a_q_2_res->visitors;
								}

								$query3 = $ids->last_row();

								if ( $a_viewers != 0 ) {
									if ( $page_id < $query3->id ) {

										$a_leavers = $a_viewers - $a_2_viewers;
									} else
										$a_leavers = $a_viewers;
								}
								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $a_viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $a_leavers;?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="3">
								<button type="button" class="btn btn-block modalBtn" data-toggle="modal" data-target="#disModal" id="disModalBtn"><i class="fa fa-external-link" aria-hidden="true"></i>إحصائيات الأزرار والأعضاء الجدد</button>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="card b-0 mb-1 mr-1 col-md-9">
				<h2 class="title">إحصائيات يومية</h2>
				<h5 class="title">(<?php echo $ar_day." ".date('y-m-d'); ?>)</h5>
				<table class="table">
					<thead>
						<th class="th">اسم الصفحة</th>
						<th class="th">الزائرون</th>
						<th class="th">المغادرون</th>
					</thead>
					<tbody>
						<?php
						$ids = $this->StatisticsModel->selectPages();

						if ( $ids->num_rows() > 0 ) {

							foreach ( $ids->result() as $id ) {
								$page_id = $id->id;

								$d_viewers = 0;
								$d_2_viewers = 0;
								$d_leavers = 0;
								$d_q_2_res = "";
								$d_q_res = "";
								$query = $this->StatisticsModel->selectStatisticsPerDay( $page_id );
								if ( $query->num_rows() > 0 ) {
									$d_q_res = $query->row();
									$d_viewers = $d_q_res->visitors;
								}
								$query2 = $this->StatisticsModel->selectStatisticsPerDay( $page_id + 1 );
								if ( $query2->num_rows() > 0 ) {
									$d_q_2_res = $query2->row();
									$d_2_viewers = $d_q_2_res->visitors;
								}
								$query3 = $ids->last_row();

								if ( $d_viewers != 0 ) {
									if ( $page_id < $query3->id ) {

										$d_leavers = $d_viewers - $d_2_viewers;
									} else
										$d_leavers = $d_viewers;
								}
								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $d_viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $d_leavers;?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="3">
								<button type="button" class="btn btn-block modalBtn" data-toggle="modal" data-target="#disModal2" id="disModalBtn2"><i class="fa fa-external-link" aria-hidden="true"></i>إحصائيات الأزرار </button>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="card b-0 mb-1 mr-1 col-md-9">
				<h2 class="title">إحصائيات أسبوعية</h2>
				<h5 class="title">(<?php echo $ar_month;?>)</h5>
				<table class="table">
					<thead>
						<th class="th">اسم الصفحة</th>
						<th class="th">الزائرون</th>
						<th class="th">المغادرون</th>
					</thead>
					<tbody>
						<?php
						$ids = $this->StatisticsModel->selectPages();

						if ( $ids->num_rows() > 0 ) {

							foreach ( $ids->result() as $id ) {
								$page_id = $id->id;

								$w_viewers = 0;
								$w_2_viewers = 0;
								$w_leavers = 0;
								$w_q_2_res = "";
								$w_q_res = "";
								$query = $this->StatisticsModel->selectStatisticsPerWeek( $page_id );
								if ( $query->num_rows() > 0 ) {
									$w_q_res = $query->row();
									$w_viewers = $w_q_res->visitors;
								}
								$query2 = $this->StatisticsModel->selectStatisticsPerWeek( $page_id + 1 );
								if ( $query2->num_rows() > 0 ) {
									$w_q_2_res = $query2->row();
									$w_2_viewers = $w_q_2_res->visitors;
								}
								$query3 = $ids->last_row();

								if ( $w_viewers != 0 ) {
									if ( $page_id < $query3->id ) {

										$w_leavers = $w_viewers - $w_2_viewers;
									} else
										$w_leavers = $w_viewers;
								}
								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $w_viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $w_leavers;?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="3">
								<button type="button" class="btn btn-block modalBtn" data-toggle="modal" data-target="#disModal3" id="disModalBtn3"><i class="fa fa-external-link" aria-hidden="true"></i>إحصائيات الأزرار </button>
							</td>
						</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>

			<div class="card b-0 mb-1 ml-1 col-md-9">
				<h2 class="title">إحصائيات شهرية</h2>
				<h5 class="title">(<?php echo $ar_month;?>)</h5>
				<table class="table">
					<thead>
						<th class="th">اسم الصفحة</th>
						<th class="th">الزائرون</th>
						<th class="th">المغادرون</th>

					</thead>
					<tbody>
						<?php
						$ids = $this->StatisticsModel->selectPages();

						if ( $ids->num_rows() > 0 ) {

							foreach ( $ids->result() as $id ) {
								$page_id = $id->id;

								$m_viewers = 0;
								$m_2_viewers = 0;
								$m_leavers = 0;
								$m_q_2_res = "";
								$m_q_res = "";

								$query = $this->StatisticsModel->selectStatisticsPerMonth( $page_id );
								if ( $query->num_rows() > 0 ) {
									$m_q_res = $query->row();
									$m_viewers = $m_q_res->visitors;
								}

								$query2 = $this->StatisticsModel->selectStatisticsPerMonth( $page_id + 1 );
								if ( $query2->num_rows() > 0 ) {
									$m_q_2_res = $query2->row();
									$m_2_viewers = $m_q_2_res->visitors;;
								}

								$query3 = $ids->last_row();

								if ( $m_viewers != 0 ) {
									if ( $page_id < $query3->id ) {

										$m_leavers = $m_viewers - $m_2_viewers;
									} else
										$m_leavers = $m_viewers;
								}
								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $m_viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $m_leavers;?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="3">
								<button type="button" class="btn modalBtn btn-block" data-toggle="modal" data-target="#disModal4" id="disModalBtn4"><i class="fa fa-external-link" aria-hidden="true"></i>إحصائيات الأزرار</button>
							</td>
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</body>