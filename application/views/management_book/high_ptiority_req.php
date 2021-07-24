<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url()?>">  
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
	#infoTable, #addBtn, #infoTitle,#info,#priorityTilte{
		display: none;
	}
</style>
<body>
	<div class="container-fluid px-1 py-5 mx-auto" dir="rtl">
		<div class="row d-flex justify-content-center">
			<div class="card b-0 mb-1 mr-1 col-md-9">
				<h2 class="title">ادارة أولولية التوزيع</h2>
				<form id="searchForm" class="form-inline mt-3" >
					<div class="form-group mx-auto">
						<input type="text" name="leaderEmail" id="leaderEmail" class="form-control ml-3" placeholder="أدخل البريد الالكتروني" required size="110">
						<input id="searchbtn" class="form-control submit" type="button" value="بحث" style="background: #205d67; color: white;">
					</div>
					
				</form>
				<h5 class="title" id="infoTitle">معلومات الطلب</h5>
				<p class="blockquote text-center" id="info"></p>
				<input type="hidden" name="request_id" id="request_id" value="2">

				<table class="table" id="infoTable">
					<thead>
						<th class="th">اسم القائد</th>
						<th class="th">تاريخ الطلب</th>
						<th class="th">حالة الطلب</th>
					</thead>
					<tbody>
						<tr>
							<td id="leaderName">
								
							</td>
							<td id="reqDate">
								
							</td>
							<td id="reqStatuse">
								
							</td>
						</tr>
					</tbody>
				</table>
				<div class="row mx-auto">
					<p class="blockquote text-center" id="priorityTilte">تم منح الأولوية مسبقا</p>
				</div>
				<div class="row mx-auto">
					<button type="button" class="btn btn-outline-dark" id="addBtn">
					اضافة
					</button>
				</div>
				
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$( "#searchbtn" ).click(function( event ) {
			$.ajax({
				type: 'POST',
				url: document.getElementById("base_url").value + "HighPriorityReq/getRequestInfo",
				data: {leaderEmail:document.getElementById("leaderEmail").value},
				success: function(response) {
					response=JSON.parse(response);
					if(response.exists){
						// SET DATA
						document.getElementById("infoTitle").style.display ="block";
						if (response.lastRequest) {
							document.getElementById("info").style.display ="none"; 
							document.getElementById("request_id").value =response.lastRequest.Rid; 

							document.getElementById("infoTable").style.display = "inline-table";
							if (!response.priority) {
								document.getElementById("priorityTilte").style.display ="none";	
								document.getElementById("addBtn").style.display ="block";

							}
							else{
								document.getElementById("addBtn").style.display ="none";
								document.getElementById("priorityTilte").style.display ="block";	

							}							document.getElementById("leaderName").innerHTML =response.leaderInfo.leader_name; 
							let dateTimeParts=response.lastRequest.date.split(/[- :]/);
							document.getElementById("reqDate").innerHTML =dateTimeParts[0] + " - " +dateTimeParts[1] + " - " +dateTimeParts[2] ;
							if (response.lastRequest.is_done==1) {
								document.getElementById("reqStatuse").innerHTML ="مكتمل"; 
								document.getElementById("addBtn").style.display ="none";

							}
							else{
								document.getElementById("reqStatuse").innerHTML ="غير مكتمل"; 
							} 

						}//if
						else{
							document.getElementById("info").style.display ="block"; 
							document.getElementById("info").innerHTML =response.msg;	
						}
						 

					}//if
					else{
						document.getElementById("infoTitle").style.display ="block";
						document.getElementById("info").style.display ="block"; 
						document.getElementById("infoTable").style.display = "none";
						document.getElementById("addBtn").style.display ="none"; 
						document.getElementById("info").innerHTML =response.msg;
					}
				},
			});
		});

		$( "#addBtn" ).click(function( event ) {
			$.ajax({
				type: 'POST',
				url: document.getElementById("base_url").value + "HighPriorityReq/store",
				data: {request_id:document.getElementById("request_id").value},
				success: function(response) {
					console.log(response);
					document.getElementById("priorityTilte").innerHTML ="تم منح الأولوية";
					document.getElementById("priorityTilte").style.display ="block";	
					document.getElementById("addBtn").disabled = true;


				},
			});
		});
		
		
	});
</script>