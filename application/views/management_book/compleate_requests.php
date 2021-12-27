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
	#infoTable, #addBtn, #infoTitle,#info,#priorityTilte, #compleate-btn,#successMsg{
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
						<input type="text" name="leaderEmail" id="leaderEmail" class="form-control ml-3" placeholder="" >

						<input id="searchbtn" class="form-control submit" type="button" value="بحث" style="background: #205d67; color: white;">
					</div>
					
				</form>
				<p class="message alert alert-success" id="successMsg">.. تم إكمال الطلب بنجاح</p>

				<h5 class="title" id="infoTitle">معلومات الطلب</h5>
				<p class="blockquote text-center" id="info"></p>
				<table class="table" id="infoTable">
					<tbody>

					</tbody>
				</table>
				<input id="compleate-btn" class="form-control submit" type="button" value="اكمل الطلب" style="background: #205d67; color: white;">
				<input id="requestId" type=hidden>
				 <fieldset id = "success">
                    <div class="form-card">
                        <p class="message"> ..  تم إضافة صورة جديدة بنجاح</p>
                        <div class="check">
                            <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif">
                        </div>
                    </div>
                </fieldset>
			</div>
			
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var leaderInput = document.getElementById("leaderEmail");

		$( "#searchbtn" ).click(function( event ) {
			$.ajax({
				type: 'POST',
				url: document.getElementById("base_url").value + "CompleateReq/getTeamInfo",
				data: {
					leaderEmail:document.getElementById("leaderEmail").value 
				},
				success: function(response) {
					response=JSON.parse(response);
					if(response.exists){
					// SET DATA
						document.getElementById("info").style.display ="none"; 
						document.getElementById("infoTitle").style.display ="block";
						document.getElementById("infoTable").style.display = "inline-table";
						document.getElementById("compleate-btn").style.display = "block";
						append_json(response.teamInfo);
					}//if
					else{
						document.getElementById("infoTitle").style.display ="block";
						document.getElementById("info").style.display ="block"; 
						document.getElementById("infoTable").style.display = "none";
						document.getElementById("compleate-btn").style.display = "none";

						document.getElementById("info").innerHTML =response.msg;
					}//else
				}
			});
		});
		$( "#compleate-btn" ).click(function( event ) {
			$.ajax({
				type: 'POST',
				url: document.getElementById("base_url").value + "CompleateReq/compleateRequest",
				data: {
					requestId:document.getElementById("requestId").value 
				},
				success: function(response) {

					document.getElementById("successMsg").style.display = "block";
					document.getElementById("compleate-btn").disabled = true;

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
			    }      
			});
		});
		
	});
	function append_json(data){
            var table = document.getElementById('infoTable');
            $("#infoTable tr").remove();
            
            Object.keys(data).forEach(function(object) {
            	if(object == "رقم الطلب"){
            		document.getElementById("requestId").value =data[object];
            	}
                var tr = document.createElement('tr');
                tr.innerHTML = '<td>' + object + '</td>' +
                '<td>'+ data[object] + '</td>';
                table.appendChild(tr);
            });
        }
</script>