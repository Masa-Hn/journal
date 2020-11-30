<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
		$( document ).ready( function () {
		
			
			var lst = document.querySelectorAll( ".joined" );
			var flag = false;
			var i;
			var info = "<?php echo (empty($info) == false)? $info : '';?>";
			for ( i = 0; i < lst.length; i += 2 ) {
				if ( lst[ i ].checked == true || lst[ i + 1 ].checked == true ) {
					flag = true;
				} else {
					flag = false;
					break;
				}	
			}
			if(info == ""){
				if ( !flag ) {
				$( "#newReqModal" ).modal( "show" );
					
			}else{
				$( "#newReqModal" ).modal( "hide" );
			}
			}else{
				$( "#newReqModal" ).modal( "hide" );
			}
			
			console.log( flag );
		} );
	</script>
<body>
    
    <a href="#"  data-toggle="modal" data-target="#newReqModal" id="reqModalBtn"><img src="<?php echo base_url() ?>admin/img/newmembers.png" width="30px">  Ù‚Ø§Ø¦Ù…Ø© Ø§Ù„Ø£Ø¹Ø¶Ø§Ø¡ Ø§Ù„Ø¬Ø¯Ø¯</a>
    <br>

	<!-- Modal -->
	<div id="newReqModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" style="text-align: center">الأعضاء الجدد </h3>
				</div>

				<div class="modal-body">

					<?php
					if ( empty( $info ) == true ) {
                        if(isset ($ambassadors)){
						if ( $ambassadors->num_rows > 0 ) {
							?>
					<div style="text-align: center; margin-bottom: 5%;">
						<h4>ÙƒÙ„Ù…Ø© Ø§Ù„Ø³Ø± Ø§Ù„Ø®Ø§ØµØ© (ÙƒÙˆØ¯) Ø¨Ø¯Ø®ÙˆÙ„ ÙØ±ÙŠÙ‚ Ø§Ù„Ù…ØªØ§Ø¨Ø¹Ø©: </h4>
						<h3 style="color: #C50407;">
							<?php echo $uniqid.$leader_id; ?>
						</h3>
					</div>

					<table class="table">
						<thead>
							<th class="th">Ø§Ø³Ù… Ø§Ù„Ø³ÙÙŠØ±</th>
							<th class="th">Ø§Ù„Ø¬Ù†Ø³</th>
							<th class="th">ØªÙ… Ø§Ù„Ø§Ø³ØªÙ‚Ø¨Ø§Ù„</th>
							<th class="th">Ù„Ù… ÙŠØªÙ… Ø§Ù„Ø§Ø³ØªÙ‚Ø¨Ø§Ù„</th>
							<th class="th">Ø±Ø³Ø§Ù„Ø© Ø§Ù„ØªØ¹Ø±ÙŠÙ</th>
						</thead>
						<tbody>
							<?php
							while ( $amb = $ambassadors->fetch_array( MYSQLI_ASSOC ) ) {
								$id = $amb[ 'id' ];
								?>
							<tr>
								<td><i class="fa fa-external-link" aria-hidden="true" style="color: #214761;"></i>
									<a class="link" href="<?php echo $amb['profile_link'];?>">
										<?php echo $amb['name']; ?>
									</a>
								</td>
								<td>
									<?php echo ($amb['gender'] == 'female' || $amb['gender'] == 'Female') ? "Ø£Ù†Ø«Ù‰" :  "Ø°ÙƒØ±"; ?>
								</td>
								<td><input type="checkbox" name="joined" <?php if ($amb[ 'join_following_team']==1) echo "checked";?> id="<?php echo "joined".$id;?>" onclick="joined('<?php echo $id;?>');"></td>
								<td><input type="checkbox" name="notJoined" <?php if ($amb[ 'join_following_team']==2) echo "checked";?> id="<?php echo "notJoined".$id;?>" onclick="notJoined('<?php echo $id;?>');"></td>
								<td>
									<a class="link" name="copyMsg" id="<?php echo $id; ?>" onClick="copyMsg('<?php echo $amb['name']; ?>' , '<?php echo $leader_name; ?>', '<?php echo $uniqid.$leader_id;?>')" style="color: #214761;"><i class="fas fa-copy" style="color: #214761;"></i></a>
								</td>

							</tr>
							<?php

							}

							?>
						</tbody>
					</table>
					<?php }
					} else {
						echo "<div class='alert alert-danger' style='font-size:1.7rem; font-weight:bold; text-align:center;'>" . "Ù„Ø§ ÙŠÙˆØ¬Ø¯ Ø£Ø¹Ø¶Ø§Ø¡ Ø¬Ø¯Ø¯ Ù„Ø¯ÙŠÙƒ" . "</div>";
					}
					} else {
						echo "<div class='alert alert-danger' style='font-size:1.7rem; font-weight:bold; text-align:center;'>" . $info . "</div>";
					}
					?>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default close-btn" data-dismiss="modal">Ø¥ØºÙ„Ø§Ù‚</button>
				</div>

			</div>
		</div>
	</div>
	<script type="text/javascript">
		function joined( id ) {
			if ( document.getElementById( "joined" + id ).checked == true ) {
				var success = confirm( "Ù‡Ù„ Ø£Ù†Øª Ù…ØªØ£ÙƒØ¯ Ù…Ù† Ø£Ù† Ø§Ù„Ø¹Ø¶Ùˆ ØªÙ… Ø§Ø³ØªÙ‚Ø¨Ø§Ù„Ù‡ØŸ" );
				var base_url = "<?php echo base_url()?>";

				if ( success == true ) {
					document.getElementById( "notJoined" + id ).checked = false;
					$.ajax( {
						url: base_url + 'NewMembersList/joined_ambassador',
						type: 'POST',
						data: {
							Checked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
						
					} );
				} else {
					console.log( "canceled" );
				}
			} else {
				var success = confirm( "Ù‡Ù„ Ø£Ù†Øª Ù…ØªØ£ÙƒØ¯ Ù…Ù† Ø£Ù† Ø§Ù„Ø¹Ø¶Ùˆ Ø¬Ø¯ÙŠØ¯ØŸ" );

				if ( success == true ) {
					document.getElementById( "notJoined" + id ).checked = false;
					var base_url = "<?php echo base_url()?>";

					$.ajax( {
						url: base_url + 'NewMembersList/joined_ambassador',
						type: 'POST',
						data: {
							notChecked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			}
		}

		function notJoined( id ) {
			if ( document.getElementById( "notJoined" + id ).checked == true ) {
				var success = confirm( "Ù‡Ù„ Ø£Ù†Øª Ù…ØªØ£ÙƒØ¯ Ù…Ù† Ø£Ù† Ø§Ù„Ø¹Ø¶Ùˆ Ù„Ù… ÙŠØªÙ… Ø§Ø³ØªÙ‚Ø¨Ø§Ù„Ù‡ØŸ" );
				var base_url = "<?php echo base_url()?>";

				if ( success == true ) {
					document.getElementById( "joined" + id ).checked = false;
					$.ajax( {
						url: base_url + 'NewMembersList/notJoined_ambassador',
						type: 'POST',
						data: {
							Checked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			} else {
				var success = confirm( "Ù‡Ù„ Ø£Ù†Øª Ù…ØªØ£ÙƒØ¯ Ù…Ù† Ø£Ù† Ø§Ù„Ø¹Ø¶Ùˆ Ø¬Ø¯ÙŠØ¯ØŸ" );

				if ( success == true ) {
					document.getElementById( "joined" + id ).checked = false;
					var base_url = "<?php echo base_url()?>";

					$.ajax( {
						url: base_url + 'NewMembersList/notJoined_ambassador',
						type: 'POST',
						data: {
							notChecked: id
						},
						dataType: 'text',
						success: function () {

							/*	window.setTimeout( function () {}, 3000 );
								location.reload();*/
						},
						error: function ( error ) {
							console.log( error );
						}
					} );
				} else {
					console.log( "canceled" );
				}
			}
		}

		function copyMsg( ambName, leaderName, uniqid ) {

			var x = "";
			x += "Ù…Ø±Ø­Ø¨Ø§Ù‹ " + ambName + "\n.\n";
			x += "Ø£Ù†Ø§ " + "( " + leaderName + ")" + "\n.\n";
			x += "Ø³Ø£ÙƒÙˆÙ† Ù…Ø´Ø±Ù Ø§Ù„Ù‚Ø±Ø§Ø¡Ø© Ø§Ù„Ø®Ø§Øµ Ø¨Ùƒ Ø¯Ø§Ø®Ù„ Ø£ØµØ¨ÙˆØ­Ø© Ù¡Ù¨Ù ." + "\n.\n.\n";
			x += "Ø³Ø¹ÙŠØ¯ Ø¬Ø¯Ø§ Ø¨Ø§Ù†Ø¶Ù…Ø§Ù…Ùƒ Ù…Ø¹Ù†Ø§ Ùƒ Ù‚Ø§Ø±Ø¦ Ø¬Ø¯ÙŠØ¯ ÙÙŠ Ù…Ø´Ø±ÙˆØ¹ ØµÙ†Ø§Ø¹Ø© Ø§Ù„Ù‚ÙØ±Ø§Ø¡.\n\n";
			x += "Ø¨Ø¯Ø§ÙŠØ© Ù…Ø§ Ø±Ø§ÙŠÙƒ Ø£Ù† ØªØ¹Ø±ÙÙ†ÙŠ Ø¨Ù†ÙØ³Ùƒ Ø§ÙƒØ«Ø±ØŸ" + " ðŸŒ¸ðŸŒ¸" + "\n.\n";
			x += "ÙˆØ£Ø±Ø¬Ùˆ Ù…Ù†Ùƒ Ø§Ù„Ø¯Ø®ÙˆÙ„ Ù‡Ù†Ø§ Ù„Ù„Ù…Ø¬Ù…ÙˆØ¹Ø© Ø§Ù„Ø¹Ø§Ù…Ø© Ù„ÙƒÙ„ Ø§Ù„Ù‚Ø±Ø§Ø¡ (Ù…Ù‡Ù…Ø© Ø¬Ø¯Ø§Ù‹)\n.\n";
			x += "https://www.facebook.com/groups/667884100014005" + "\n.\n";
			x += "Ø±Ù…Ø²Ø§Ù„Ø¯Ø®ÙˆÙ„ Ù„Ù„Ù…Ø¬Ù…ÙˆØ¹Ø©, Ø¨Ù‡Ø§ ÙƒÙ„ Ø§Ù„Ø£Ù†Ø´Ø·Ø© Ø§Ù„Ø£Ø³Ø¨ÙˆØ¹ÙŠØ© Ù„ÙƒÙ„ Ø§Ù„Ù‚Ø±Ù‘Ø§Ø¡:\n.\n" + uniqid + "\n\n";

			var copyText = document.createElement( 'textarea' );
			copyText.value = x;
			document.body.appendChild( copyText );
			copyText.select();
			document.execCommand( 'copy' );
			// Remove temporary textarea
			document.body.removeChild( copyText );
			confirm( 'Ù„Ù‚Ø¯ ØªÙ… Ù†Ø³Ø® Ø§Ù„Ø±Ø³Ø§Ù„Ø©, Ø¨Ø¥Ù…ÙƒØ§Ù†Ùƒ Ø¥Ø±Ø³Ø§Ù„Ù‡Ø§ Ø¥Ù„Ù‰ Ø§Ù„Ø³ÙÙŠØ±!' )
			console.log( x );
		}
	</script>
</body>
</html>