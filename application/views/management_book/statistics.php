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
	.fa-users,
	.fa-external-link,
	.fa-sort-numeric-asc,
	.fa-external-link,
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
<!--<button id="team_link">Link</button>-->
	<?php
	//function to get the week of a date starting from sunday
	function get_week($date)
 {
	 $week_days = array();
	 $date_format = date('y-m-d', strtotime($date));
	 $ts = strtotime($date_format);
	 // calculate the number of days since Sunday
	 $dow = date('w', $ts);
	 $offset = $dow;
	 if ($offset < 0) {
	 	$offset = 6;
	 }
	 // calculate timestamp for the Sunday
	 $ts = $ts - $offset * 86400;
	 // loop from Sunday till Saturday
	 for ($i = 0; $i < 7; $i++, $ts += 86400) {
			 $week_days[$i] =  date("Y-m-d", $ts);
	 }
	 return $week_days;
 }

//function to check if 2 dates are in the same month of a same year
 function get_month($first_date, $second_date){
	 $flag = false;
	 $first_month = date('m', strtotime($first_date));
	 $first_year = date('Y', strtotime($first_date));

	 $second_month = date('m', strtotime($second_date));
	 $second_year = date('Y', strtotime($second_date));

	 if($first_year == $second_year && $first_month == $second_month){
		 $flag = true;
	 }
	 return $flag;
 }

 //transform the day into arabic meaning
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
						//variables
						$members = 0;
						$male_amb = 0;

						//ambassadors counting
						$total_amb = Orm_Ambassador::get_count();
						//team link button clicks counting
						$team_link_clicks = Orm_Ambassador::get_count(array("team_link_button"=>1));
						//distributed members counting
						$filters['conditions'] = "request_id IS NOT NULL";
						$des = Orm_Ambassador::get_count($filters);
						//none-distributed ambassadors counting
						$filters['conditions'] = "request_id IS NULL";
						$not_des_amb = Orm_Ambassador::get_count($filters);
						//total requests counting
						$total_req = Orm_Leader_Request::get_count();
						//done requests counting
						$is_done = Orm_Leader_Request::get_count(array("is_done"=>1));
						//none-done requests counting
						$not_done = Orm_Leader_Request::get_count(array("is_done"=>0));

						$req_qry = Orm_Leader_Request::get_all();
						foreach ($req_qry as $key) {
							//new members counting
							if($key->get_is_done() == 0){
									$members += $key->get_members_num();
							}
							//male ambassadors counting
							if(($key->get_gender() == 'Male' || $key->get_gender() == 'male') && ($key->get_is_done() == 0)){
									$male_amb += $key->get_members_num();
							}
						}
						?>
						<ul class="list-group">
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
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء المطلوبين من الذكور:
								<b><?php echo $male_amb; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد المتاح لاستقبال أعضاء جدد(تقريبي):
								<b><?php echo $members; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للطلبات:
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
						//team link clicks of today counting
						$filters['conditions'] = 'team_link_button = 1 AND  DATE_FORMAT(created_at, "%y-%m-%d") = DATE(CURDATE())';
						$team_link_clicks_daily = Orm_Ambassador::get_count($filters);
						//total ambassadors of today counting
						$filters['conditions'] = 'DATE_FORMAT(created_at, "%y-%m-%d") = DATE(CURDATE())';
						$total_amb_daily = Orm_Ambassador::get_count($filters);
						//total distributed ambassadors of today
						$filters['conditions'] = '(request_id IS NOT NULL) AND (DATE_FORMAT(created_at, "%y-%m-%d") = DATE(CURDATE()))';
						$des_daily =  Orm_Ambassador::get_count($filters);
						//total none distributed ambassadors of today
						$filters['conditions'] = '(request_id IS NULL) AND (DATE_FORMAT(created_at, "%y-%m-%d") = DATE(CURDATE()))';
						$not_des_amb_daily =  Orm_Ambassador::get_count($filters);

						?>
						<ul class="list-group">
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks_daily; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb_daily; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des_daily; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb_daily; ?></b>
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
						//team link clicks of a week counting
						$filters['conditions'] = 'team_link_button = 1 AND YEARWEEK(DATE_FORMAT(created_at, "%y-%m-%d"), 6) = YEARWEEK( CURDATE(), 6)';
						$team_link_clicks_weekly = Orm_Ambassador::get_count($filters);
						//total ambassadors of week counting
						$filters['conditions'] = 'YEARWEEK(DATE_FORMAT(created_at, "%y-%m-%d"), 6) = YEARWEEK( CURDATE(), 6)';
						$total_amb_weekly = Orm_Ambassador::get_count($filters);
						//total distributed ambassadors of week
						$filters['conditions'] = '(request_id IS NOT NULL) AND (YEARWEEK(DATE_FORMAT(created_at, "%y-%m-%d"), 6) = YEARWEEK( CURDATE(), 6))';
						$des_weekly = Orm_Ambassador::get_count($filters);
						//total none distributed ambassadors of week
						$filters['conditions'] = '(request_id IS NULL) AND (YEARWEEK(DATE_FORMAT(created_at, "%y-%m-%d"), 6) = YEARWEEK( CURDATE(), 6))';
						$not_des_amb_weekly = Orm_Ambassador::get_count($filters);

						/*foreach ($amb_qry as $row){
							//team link clicks of a week counting
							if($row->get_team_link_button() == 1 && get_week($row->get_created_at()) == get_week(date('y-m-d'))){
								$team_link_clicks_weekly++;
							}
							//total ambassadors of week counting
							if(get_week($row->get_created_at()) == get_week(date('y-m-d'))){
								$total_amb_weekly++;
							}
							//total distributed ambassadors of week
							if(get_week($row->get_created_at()) == get_week(date('y-m-d')) && !is_null($row->get_request_id())){
								$des_weekly++;
							}
							//total none distributed ambassadors of week
							if(get_week($row->get_created_at()) == get_week(date('y-m-d')) && is_null($row->get_request_id())){
								$not_des_amb_weekly++;
							}
						}*/
						?>
						<ul class="list-group">
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks_weekly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb_weekly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des_weekly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb_weekly; ?></b>
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
						//team link clicks of a month counting
						$filters['conditions'] = 'team_link_button = 1 AND YEAR(DATE_FORMAT(created_at, "%y-%m-%d")) = YEAR(CURDATE()) AND MONTH(DATE_FORMAT(created_at, "%y-%m-%d")) = MONTH(CURDATE())';
						$team_link_clicks_monthly = Orm_Ambassador::get_count($filters);
						//total ambassadors of month counting
						$filters['conditions'] = 'YEAR(DATE_FORMAT(created_at, "%y-%m-%d")) = YEAR(CURDATE()) AND MONTH(DATE_FORMAT(created_at, "%y-%m-%d")) = MONTH(CURDATE())';
						$total_amb_monthly = Orm_Ambassador::get_count($filters);
						//total distributed ambassadors of month
						$filters['conditions'] = '(request_id IS NOT NULL) AND (YEAR(DATE_FORMAT(created_at, "%y-%m-%d")) = YEAR(CURDATE()) AND MONTH(DATE_FORMAT(created_at, "%y-%m-%d")) = MONTH(CURDATE()))';
						$des_monthly = Orm_Ambassador::get_count($filters);
						//total none distributed ambassadors of month
						$filters['conditions'] = '(request_id IS NULL) AND (YEAR(DATE_FORMAT(created_at, "%y-%m-%d")) = YEAR(CURDATE()) AND MONTH(DATE_FORMAT(created_at, "%y-%m-%d")) = MONTH(CURDATE()))';
						$not_des_amb_monthly = Orm_Ambassador::get_count($filters);
						?>
						<ul class="list-group">
							<li class="list-group-item"><i class="fa fa-users"></i>عدد مرات الضغط على زر رابط الفريق:
								<b><?php echo $team_link_clicks_monthly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>العدد الكلي للسفراء المسجلين:
								<b><?php echo $total_amb_monthly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء الموزعين:
								<b><?php echo $des_monthly; ?></b>
							</li>
							<li class="list-group-item"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>عدد السفراء غير الموزعين:
								<b><?php echo $not_des_amb_monthly; ?></b>
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
						$page_numbers = Orm_pages::get_count();
						$page_qry = Orm_pages::get_all();

						if ($page_numbers > 0 ) {

							foreach ($page_qry as $row ) {
								$page_id = $row->get_id();
								$next_page_id = $page_id + 1;
								$sum_visitors_1  = 0;
								$sum_visitors_2  = 0;
								$leavers = 0;

								//cumulative statistics counting
								$qry = Orm_Statistics::get_all(array('page_id' => $page_id));
								foreach ($qry as $key) {
									$sum_visitors_1 += $key->get_visitors();
								}
								$qry2 = Orm_Statistics::get_all(array('page_id' => $next_page_id));
								foreach ($qry2 as $key) {
									$sum_visitors_2 += $key->get_visitors();
								}
								if ( $sum_visitors_1 != 0 ) {
									if ( $page_id < $page_numbers ) {
										$leavers = $sum_visitors_1 - $sum_visitors_2;
									} else
										$leavers = $sum_visitors_1;
								}
								?>
						<tr>
							<td>
								<?php echo $row->get_title();?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $sum_visitors_1;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers;?>
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
						if ($page_numbers > 0 ) {

							foreach ($page_qry as $row ) {
								$page_id = $row->get_id();
								$next_page_id = $page_id + 1;
								$sum_visitors_1_daily  = 0;
								$sum_visitors_2_daily  = 0;
								$leavers_daily = 0;

								//daily statistics counting
								$filters_daily['conditions'] = "DATE_FORMAT(date, '%y-%m-%d') = DATE(CURDATE())";
								$filters_daily['page_id'] = $page_id;
								$qry_daily = Orm_Statistics::get_all($filters_daily);

								foreach ($qry_daily as $key) {
										$sum_visitors_1_daily += $key->get_visitors();
									}

									$filters_daily['page_id'] = $next_page_id;

								$qry2_daily = Orm_Statistics::get_all($filters_daily);

								foreach ($qry2_daily as $key) {
									$sum_visitors_2_daily += $key->get_visitors();
									}
									
								if ( $sum_visitors_1_daily != 0 ) {
									if ( $page_id < $page_numbers ) {
										$leavers_daily = $sum_visitors_1_daily - $sum_visitors_2_daily;
									} else
										$leavers_daily = $sum_visitors_1_daily;
								}
								?>
						<tr>
							<td>
								<?php echo $row->get_title();?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $sum_visitors_1_daily;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers_daily;?>
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
						if ($page_numbers > 0 ) {

							foreach ($page_qry as $row ) {
								$page_id = $row->get_id();
								$next_page_id = $page_id + 1;
								$sum_visitors_1_weekly  = 0;
								$sum_visitors_2_weekly  = 0;
								$leavers_weekly = 0;

								//weekly statistics counting
								$filters_weekly['conditions'] = 'YEARWEEK(DATE_FORMAT(date, "%y-%m-%d"), 6) = YEARWEEK( CURDATE(), 6)';
								$filters_weekly['page_id'] = $page_id;
								$qry_weekly = Orm_Statistics::get_all($filters_weekly);

								foreach ($qry_weekly as $key) {
										$sum_visitors_1_weekly += $key->get_visitors();
									}

									$filters_weekly['page_id'] = $next_page_id;

								$qry2_weekly = Orm_Statistics::get_all($filters_weekly);

								foreach ($qry2_weekly as $key) {
									$sum_visitors_2_weekly += $key->get_visitors();
									}
								if ( $sum_visitors_1_weekly != 0 ) {
									if ( $page_id < $page_numbers ) {
										$leavers_weekly = $sum_visitors_1_weekly - $sum_visitors_2_weekly;
									} else
										$leavers_weekly = $sum_visitors_1_weekly;
								}
								?>
						<tr>
							<td>
								<?php echo $row->get_title();?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $sum_visitors_1_weekly;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers_weekly;?>
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
						if ($page_numbers > 0 ) {

							foreach ($page_qry as $row ) {
								$page_id = $row->get_id();
								$next_page_id = $page_id + 1;
								$sum_visitors_1_monthly  = 0;
								$sum_visitors_2_monthly  = 0;
								$leavers_monthly = 0;

								//daily statistics counting
								$filters_monthly['conditions'] = 'YEAR( DATE_FORMAT(date, "%y-%m-%d") ) = YEAR( CURDATE() )AND MONTH( DATE_FORMAT(date, "%y-%m-%d") ) = MONTH( CURDATE() )';
								$filters_monthly['page_id'] = $page_id;
								$qry_monthly = Orm_Statistics::get_all($filters_monthly);

								foreach ($qry_monthly as $key) {
										$sum_visitors_1_monthly += $key->get_visitors();
									}

									$filters_monthly['page_id'] = $next_page_id;

								$qry2_monthly = Orm_Statistics::get_all($filters_monthly);

								foreach ($qry2_monthly as $key) {
									$sum_visitors_2_monthly += $key->get_visitors();
									}
								if ( $sum_visitors_1_monthly != 0 ) {
									if ( $page_id < $page_numbers ) {
										$leavers_monthly = $sum_visitors_1_monthly - $sum_visitors_2_monthly;
									} else
										$leavers_monthly = $sum_visitors_1_monthly;
								}
								?>
						<tr>
							<td>
								<?php echo $row->get_title();?>
							</td>
							<td class="viewers"><i class="fa fa-eye"></i>
								<?php echo $sum_visitors_1_monthly;?>
							</td>
							<td class="leavers"><i class="fa fa-sign-out"></i>
								<?php echo $leavers_monthly;?>
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
<!--<script type="text/javascript">
	$(document).ready(function (){
		var base_url = "<?php /*echo base_url();*/?>";
		$("#team_link").click(function (){
			$.ajax({
				type: "POST",
				url: base_url + "signUp/team_link_button",
				data:{
					id:41715
				},
				success: function(data){
					console.log(data);
				},
				error: function(error) {
					//window.location.replace(document.getElementById('team_link').value, "_blank");
					console.log( error );
				}
			});
		});
	});
</script>-->
