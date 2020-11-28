<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>
	<button class="btn" style="background-color: ; color: $fff" id="trigBtn">إضافة 30 يوم إضافي</button>
	<div id="msg"></div>
	
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
					$('#msg').html(data);
					console.log( data );
				//	$("#trigBtn").attr("disabled", true);
				},
				error: function ( error ) {
					console.log( error );
				}
			} );
		} );
	} );
</script>