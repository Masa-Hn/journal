<style type="text/css">
	.active, .dot:hover {
		background-color: #717171;
	}
</style><!-- Slideshow container -->

<body>
<div class="container-fluid px-1 py-5 mx-auto">
	<div class="row d-flex justify-content-center">
		<div class="col-xl-5 col-lg-6 col-md-7">
			<div class="card b-0">
				<div>
					<div class="slideshow-container">

						<!-- Full-width images with number and caption text -->
						<?php
						$n = $num_rows;
						for ($i = 0; $i < $n; $i++) {
						//	$row = $Evals->row($i); ?>

							<div class="mySlides" style="padding-right: 10%;padding-top: 3em">

								<script type="text/javascript">
									var slideIndex = 1;
									showSlides(slideIndex);
								</script>
								<?php echo $this->session->flashdata('msg') ?>
								<div class="numbertext" style="color: black"> <?php echo $i + 1 ?>
									/ <?php echo $n ?></div>
								<li style="direction: rtl; text-align: right; margin-bottom: 5%;">اسم الأسبوع :
									<?php echo $Evals[$i]->get_title() ?></li>
								<li style="direction: rtl; text-align: right;margin-bottom: 5%;">
									صورة التقييم :
								</li>
								<li style="direction: rtl; text-align:right; list-style-type: none;">
									<img style=" height:200px;width: 200px"
										 src="<?php echo base_url() ?>assets/img/evaluation/<?php echo  $Evals[$i]->get_pic() ?>"
										 onclick="window.open(this.src)"></li>


								<form enctype="multipart/form-data" method="post"
									  style="padding-bottom: 5em;padding-top: 5em;padding-left: 40%"
									  action="<?= base_url() ?>Evaluation/show_evaluation">
									<input type="number" name="id" id="id" value="<?php echo  $Evals[$i]->get_id() ?>"
										   style="display: none;">
									<button id="delete" name="delete" class="mybutton"
											style="width: 150px;background-color: #A52A2A;text-align: center;">حذف
										التقييم
									</button>
								</form>

							</div>
						<?php } ?>
						<!-- Next and previous buttons -->
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>

					<br>
					<!-- The dots/circles -->
					<div style="text-align:center">
						<?php
						for($count = 1; $count <= $n; $count++){
							?>
							<span class="dot" onclick="currentSlide(<?php echo $count;?>)"></span>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
