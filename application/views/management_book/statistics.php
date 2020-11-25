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
		/* For IE, the outcast */
		zoom: 1;
		*display: inline;
		text-align: center;
		list-style: none;
		margin-top: 3%;
	}
	
	.card ul h1 {
		text-align: center;
	}
	
	.fa,
	.list-group-item {
		font-size: 1.3rem;
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
	.fa-user-plus,
	.fa-user-tie,
	.fa-sort-numeric-asc,
	.fa-code:hover,
	.fa-user:hover,
	.fa-users:hover,
	.fa-user-plus:hover,
	.fa-user-tie:hover,
	.fa-sort-numeric-asc:hover {
		color: #205d67;
	}

</style>
<body>
	<?php
	$this->StatisticsModel->incrementVisitors( 1 );

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

								$query = $this->StatisticsModel->get_data( 'statistics', 'visitors', 'page_id = "' . $page_id . '"' )->row();
								$viewers = $query->visitors;

								$next_page_id = $page_id + 1;

								$query2 = $this->StatisticsModel->get_data( 'statistics', 'visitors', 'page_id = "' . $next_page_id . '"' )->row();
								$query3 = $ids->last_row();

								if ( $page_id < $query3->id )
									$leavers = abs( $viewers - $query2->visitors );
								else
									$leavers = $viewers;


								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers;?>
							</td>

						</tr>
						<?php
						}
						}
						?>
					</tbody>

				</table>
				<div class="card">

					<h2 class="card-title"> إحصائيات الأزرار والأعضاء المطلوبين</h2>
					<?php
					$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1' )->num_rows();
					$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1' )->num_rows();
					$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1' )->num_rows();

					//get new members
					$daily = $this->StatisticsModel->get_sum_data( 'leader_request', 'members_num', 'is_done = 0' )->row();
					$des = $this->StatisticsModel->get_data( 'ambassador', 'request_id', 'request_id IS NOT NULL' )->num_rows();
					$sum_daily = 0;
					if ( $daily->members_num > 0 && $des > 0 ) {
						$sum_daily = $daily->members_num;
						$daily_total = $sum_daily - $des;
					}
					$total_req = $des = $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 0 or is_done = 1' )->num_rows();

					$is_done = $des = $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 1' )->num_rows();
					$not_done = $des = $this->StatisticsModel->get_data( 'leader_request', 'Rid', 'is_done = 0' )->num_rows();

					?>
					<ul class="list-group">

						<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
							<?php echo $code_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
							<?php echo $leader_link_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
							<?php echo $team_link_clicks; ?>
						</li>
						<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد المتاح لاستقبال أعضاء جدد:
							<?php echo $daily_total; ?>
						</li>
						<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للقادة الذين طلبوا أعضاء:
							<?php echo $total_req; ?>
						</li>
						<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد القادة الذين طلبوا أعضاء وتم التوزيع لهم:
							<?php echo $is_done; ?>
						</li>
						<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد القادة الذين طلبوا أعضاء ولم يتم التوزيع لهم:
							<?php echo $not_done; ?>
						</li>

					</ul>


				</div>
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

								$query = $this->StatisticsModel->selectStatisticsPerDay( $page_id )->row();
								$viewers = $query->visitors;

								$query2 = $this->StatisticsModel->selectStatisticsPerDay( $page_id + 1 )->row();
								$query3 = $ids->last_row();

								if ( $page_id < $query3->id )
									$leavers = abs( $viewers - $query2->visitors );
								else
									$leavers = $viewers;


								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers;?>
							</td>

						</tr>
						<?php
						}
						}
						?>
					</tbody>

				</table>
				<div class="card">

					<h2 class="card-title"> إحصائيات الأزرار </h2>
					<?php
					$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
					$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
					$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND  date = DATE(CURDATE())' )->num_rows();
					?>
					<ul class="list-group">

						<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
							<?php echo $code_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
							<?php echo $leader_link_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
							<?php echo $team_link_clicks; ?>
						</li>
					</ul>


				</div>
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

								$query = $this->StatisticsModel->selectStatisticsPerWeek( $page_id )->row();
								$viewers = $query->visitors;

								$query2 = $this->StatisticsModel->selectStatisticsPerWeek( $page_id + 1 )->row();
								$query3 = $ids->last_row();

								if ( $page_id < $query3->id )
									$leavers = abs( $viewers - $query2->visitors );
								else
									$leavers = $viewers;
								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers;?>
							</td>
						</tr>
						<?php
						}
						}
						?>

					</tbody>
				</table>

				<div class="card ">
					<h2 class="card-title">إحصائيات الأزرار</h2>
					<?php
					$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();
					$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();
					$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->num_rows();

					//get new members
					/*	$weekly = $this->StatisticsModel->get_sum_data( 'leader_request', 'members_num', 'is_done = 0 and YEARWEEK(`date`, 6) = YEARWEEK( CURDATE(), 6)' )->row();
						$sum_weekly = 0;
						if ( $weekly->members_num > 0 )
							$sum_weekly = $weekly->members_num;*/
					?>
					<ul class="list-group">

						<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
							<?php echo $code_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
							<?php echo $leader_link_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
							<?php echo $team_link_clicks; ?>
						</li>
					</ul>
				</div>
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
						$dataPoints1 = array();
						$dataPoints2 = array();

						$ids = $this->StatisticsModel->selectPages();

						if ( $ids->num_rows() > 0 ) {

							foreach ( $ids->result() as $id ) {
								$page_id = $id->id;

								$query = $this->StatisticsModel->selectStatisticsPerMonth( $page_id )->row();
								$viewers = $query->visitors;

								$query2 = $this->StatisticsModel->selectStatisticsPerMonth( $page_id + 1 )->row();
								$query3 = $ids->last_row();

								if ( $page_id < $query3->id )
									$leavers = abs( $viewers - $query2->visitors );
								else
									$leavers = $viewers;

								?>
						<tr>
							<td>
								<?php echo $id->title;?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $viewers;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers;?>
							</td>
						</tr>
						<?php
						}
						}
						?>
					</tbody>
				</table>
				<div class="card ">
					<h2 class="card-title">إحصائيات الأزرار</h2>
					<?php
					$code_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'code_button', 'code_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();
					$leader_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'leader_link_button', 'leader_link_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();
					$team_link_clicks = $this->StatisticsModel->get_data( 'buttons_statistics', 'team_link_button', 'team_link_button = 1 AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->num_rows();

					//get new members
					/*	$monthly = $this->StatisticsModel->get_sum_data( 'leader_request', 'members_num', 'is_done = 0 and YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = MONTH(CURDATE())' )->row();
						$sum_monthly = 0;
						if ( $monthly->members_num > 0 )
							$sum_monthly = $monthly->members_num;*/
					?>
					<ul class="list-group">

						<li class="list-group-item"><i class="fa fa-code"></i>عدد مرات الضغط على زر الكود:
							<?php echo $code_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-user"></i>عدد مرات الضغط على زر رابط القائد:
							<?php echo $leader_link_clicks; ?> </li>
						<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
							<?php echo $team_link_clicks; ?>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</body>