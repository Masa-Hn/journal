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
			background-color:#205d67;
			color: #fff;
			padding: 2%;
		}
		.btn:hover{
			font-weight: bold;
			opacity: 0.9;
			color: #fff;
		}
		.row{
			direction: rtl;
			margin-top: 5%;
			margin-left: 2%;
			margin-right: 2%;
		}
		
		
	</style>
</head>

<body>
	<div class="row" style="text-align: center;">
	<div id="msg" class="alert alert-success" style="display: none; width: 100%;"></div>
		</div>
	<div class="row" style="text-align: center;">
	<button class="btn btn-block" id="trigBtn">إضافة أسبوع إضافي</button>
	</div>
	
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$( document ).ready( function () {
		var base_url = "<?php echo base_url()?>";
		$( "#trigBtn" ).click( function () {
			$.ajax( {
				url: base_url + "autoRecords/addRecords",
				success: function ( data ) {
					document.getElementById('msg').style.display = "block";
					$('#msg').html(data);
					console.log( data );
				},
				error: function ( error ) {
					console.log( error );
				}
			} );
		} );
	} );
</script>