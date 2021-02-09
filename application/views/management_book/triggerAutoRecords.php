<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.btn{
			background-color:#0c5460;
			color: #fff;
			padding: 1%;
			margin: 1%;
		}
		.btn:hover{
			font-weight: bold;
			color: #fff;
			background-color: #0c5460;
		}
		
		.container{
			direction: rtl;
			width: 50%;
			border: 2px solid #0b2e13;
			margin: 5% auto 0;
			padding: 5%;
			border-radius: 15px;
			text-align: center;
		}
		h1{
			margin-top: 1%;
			color: #0c5460;
			text-align: center;
		}
	span{
		font-weight: bold;
	}
	a{
		font-weight: bold;
		font-size: 12pt;
	}
	</style>
</head>

<body>
<?php
$records = $this->StatisticsModel->getRecords();
$res = $records->last_row();
$date = date('y-m-d' , strtotime( $res->date ));
?>
<div class="container">
	<h1>إضافة الأيام الخاصة بالإحصائيات</h1>
		<div class="form-group" id="errorMsg">
			<img id="loading" src="<?php echo base_url()?>assets/sign_up_assests/img/loading.png" alt="" style="width: 20px; display: none; ">
			<span id="loadingMsg" style="color: #197439;"></span>
		</div>
		<div id="msg" class="alert alert-success" style="display: none; width: 100%;"></div>
		<button class="btn" id="trigBtn">إضافة 30 يوم إضافي</button>
	<hr />
	<span>آخر تاريخ مسجل: <?php echo $date;?> </span>
	<a href="javascript:window.location.href=window.location.href"> تحديث </a>
</div>


	
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$( document ).ready( function () {
		var base_url = "<?php echo base_url()?>";
		$( "#trigBtn" ).click( function () {
			var x = 10;
			var counter = setInterval(function(){
				$("#loading").show();
				document.getElementById('loadingMsg').innerHTML=
						"   "+
						' يتم الأن إضافة الأيام' +
						" "+ x;
				x--;
				if (x<0) {
					clearInterval(counter);
				}
			},1000);

			setTimeout(function () {
				clearInterval(counter);
			$.ajax( {
				url: base_url + "autoRecords/addRecords",
				success: function ( data ) {
					document.getElementById('msg').style.display = "block";
					$('#msg').html(data);
					$("#errorMsg").hide();
					console.log( data );
				},
				error: function ( error ) {
					console.log( error );
				}
			} );
			}, 5000);
		} );
	} );
</script>
