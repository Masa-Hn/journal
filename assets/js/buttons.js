// to be inserted in the last page

<script type="text/javascript">
	 $(document).ready(function () {
	 var base_url = "<?php echo base_url()?>";
	 var ip_address = "<?php echo $_SERVER['REMOTE_ADDR'];?>";
	 
 	$('#code').click(function () {
		
 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/code_button",
 			data: {
 				ip_address: ip_address
 			}, // multiple data sent using ajax
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});

 	$('#leader').click(function () {
 		
 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/leader_link_button",
 			data: {
 				ip_address: ip_address
 			}, 
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});

 	$('#team').click(function () {

 		$.ajax({
 			type: "POST",
 			url: base_url + "Statistics/team_link_button",
 			data: {
 				ip_address: ip_address
 			}, 
 			success: function (data) {

 				console.log(data);
 			},
 			error: function (error) {
 				console.log(error);
 			}
 		});
 		return false;
 	});
 });

	</script>