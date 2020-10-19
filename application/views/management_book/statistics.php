<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script>
<style type="text/css">
    .card {
        text-align: center;
    }
    .card ul {
        display: inline-block;
        margin: 0;
        padding: 0;
        /* For IE, the outcast */
        zoom:1;
        *display: inline;
		text-align: center;
		list-style: none;
		margin-top: 3%;
    }
	.card ul h1{
		text-align: center;
	}
	.fa{
		font-size: 1.5vw;
	}
	.viewers, .fa-eye{
		color: #064500;
	}
	.leavers, .fa-sign-out{
		color: #B40306;
	}
</style>
<body>

	<div class="container-fluid px-1 py-5 mx-auto">
		<div class="row d-flex justify-content-center">
			
				<?php
					$ids = $this->StatisticsModel->selectPages();
				
				if($ids->num_rows() > 0){
				
					foreach($ids->result() as $id){
						$page_id = $id->id;
						
						$query = $this->StatisticsModel->selectStatisticsPerPage($page_id)->row();
						$viewers = $query->viewers;
						
						$query2 = $this->StatisticsModel->selectStatisticsPerPage($page_id+1)->row();
						$query3 = $ids->last_row();
						
						if($page_id < $query3->id)
						$leavers = abs($viewers - $query2->viewers);
						else
						$leavers = $viewers;	
						?>
				
				<div class="card b-0 mb-1 mr-1 col-md-3">
					<h1><?php echo $id->title;?></h1>
					<ul class="list-group list-group-flush">
						<li class="list-group-item viewers"><i class="fa fa-eye"></i>الزائرون: <?php echo $viewers;?></li>
						<li class="list-group-item leavers"><i class="fa fa-sign-out"></i>المغادرون: <?php echo $leavers;?></li>
						<li class="list-group-item"></li>
					</ul>
				</div>
				<?php
					}
				}
				?>
				
			
		</div>
	</div>
</body>


