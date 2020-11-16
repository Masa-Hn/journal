<body>

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#editModal" id="editModalBtn">
		<i class="fa fa-edit"></i>
		تعديل البيانات الشخصية
</button>




	<!-- Modal -->
	<div id="editModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h1 class="modal-title"> تعديل البيانات الشخصية</h1>
				</div>

				<div class="modal-body">
					<p id="msgg"></p>

					<form method="post" enctype="multipart/form-data">
						<?php
						$info = $this->GeneralModel->get_data( $_GET[ 'email' ], 'leader_email', 'leader_info', 'id, leader_name, leader_link' )->row();

						$id = $info->id;
						$leaderName = $info->leader_name;
						$leaderLink = $info->leader_link;
						?>

						<div class="form-group">
							<label for="leaderLink">اسمك كما هو على الفيسبوك:</label>
							<input type="text" name="leaderName" id="leaderName" value="<?php echo $leaderName;?>" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label for="leaderLink">رابط صفحتك الشخصية: </label>
							<input type="text" name="leaderLink" id="leaderLink" value="<?php echo $leaderLink;?>" class="form-control" required="required">
						</div>
 <label name="msg-ch" id="msg-ch"  style="display: none; color: red" > الرجاء كتابة الرابط </label>
						<?php
						$msg = "هل أنت متأكد من أنك تريد تعديل بياناتك الشخصية؟";
						?>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-block" id="subBtn" style="display: none;">تعديل</button>
						</div>

					</form>
<button name="check-btn" class="btn btn-block" id="check-btn" onclick="check()">اختبار الرابط</button>
 <div id="check_div" style="display: none;"><input type="checkbox" id="check"  onclick="change_check()" ><label>  تم التأكد من صحة الرابط</label></div>
<script type="text/javascript">

	function check()
		{
var URL = document.getElementById( 'leaderLink' ).value;
if (URL=="")
	document.getElementById('msg-ch').style.display="block";
else
{
document.getElementById('msg-ch').style.display="none";
var win = window.open(URL);
document.getElementById('check_div').style.display="block";

}
    		}
		function change_check()
		{
			ch= document.getElementById('check');
			sb=document.getElementById('sub-btn');
			if (ch.checked==true)
				document.getElementById('subBtn').style.display="block";
			else
				document.getElementById('sub-btn').style.display="none";

		}
</script>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">إغلاق </button>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		var base_url = "<?php echo base_url()?>";
		var id = "<?php echo $id;?>";

		$( document ).ready( function () {

			$( "#subBtn" ).click( function () {
				$.ajax( {
					type: "POST",
					url: base_url + "index.php/requests/edit/?email=<?php echo $_GET['email']?>",
					data: {
						id: id,
						leaderLink: $( "#leaderLink" ).val(),
						leaderName: $( "#leaderName" ).val()

					},
					beforeSend: function () {
						return confirm( "هل أنت متأكد من أنك تريد تعديل بياناتك؟" );
					},
					success: function ( data ) {
						$( '#msgg' ).html( data );
					}
				} );
				return false;
			} );
		} );
	</script>
</body>
</html>