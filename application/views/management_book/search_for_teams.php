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
				<h2 class="title">البحث عن الأفرقة</h2>
				<form id="searchForm" class="form-inline mt-3" >
					<div class="form-group mx-auto">
						<input type="text" name="teamName" id="teamName" class="form-control ml-3" placeholder="اسم الفريق" >
						<input type="text" name="leaderName" id="leaderName" class="form-control ml-3" placeholder="اسم القائد" >

						<input id="searchbtn" class="form-control submit" type="button" value="بحث" style="background: #205d67; color: white;">
					</div>
					
				</form>
				<h5 class="title" id="infoTitle">معلومات الأفرقة</h5>
				<p class="blockquote text-center" id="info"></p>
				<table class="table" id="infoTable">
					<thead>
						<th class="th">اسم القائد</th>
						<th class="th">فريق المتابعة</th>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var leaderInput = document.getElementById("leaderName");
		var teamInput = document.getElementById("teamName");

		leaderInput.addEventListener("input", function () {
			if(leaderInput.value == "" ){
				$('#teamName').removeAttr('disabled');
			}
			else{
				teamInput.disabled = true;
				teamInput.value = "";
			}
		});
		teamInput.addEventListener("input", function () {
			if(teamInput.value == "" ){
				$('#leaderName').removeAttr('disabled');
			}
			else{
				leaderInput.disabled = true;
				leaderInput.value = "";
			}
		});

		$( "#searchbtn" ).click(function( event ) {
			$.ajax({
				type: 'POST',
				url: document.getElementById("base_url").value + "SearchForTeams/getTeamInfo",
				data: {
					teamName:document.getElementById("teamName").value,
					leaderName:document.getElementById("leaderName").value 
				},
				success: function(response) {
					response=JSON.parse(response);
					if(response.exists){
					// SET DATA
						document.getElementById("info").style.display ="none"; 
						document.getElementById("infoTitle").style.display ="block";
						document.getElementById("infoTable").style.display = "inline-table";
						append_json(response.teamInfo);
					}//if
					else{
						document.getElementById("infoTitle").style.display ="block";
						document.getElementById("info").style.display ="block"; 
						document.getElementById("infoTable").style.display = "none";
						document.getElementById("info").innerHTML =response.msg;
					}//else
				}
			});
		});
		
	});
	function append_json(data){
            var table = document.getElementById('infoTable');
            $("#infoTable tr").remove(); 
            data.forEach(function(object) {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td><a target="_blank" href="'+object.leader_link+'">' + object.leader_name + '</a></td>' +
                '<td><a target="_blank" href="'+object.team_link+'">'  + object.team_name + '</a></td>';
                table.appendChild(tr);
            });
        }
</script>