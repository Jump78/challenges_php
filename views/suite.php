<?php ob_start() ?>
<div class="row">
	<div class="col-md-12 text-center">
		<h1>Et voila une suite de syracuse !</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<h3>La suite numerique : </h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="text-left">
					<?php for ($i=0; $i < count($suite); $i++):?>

						<li>Pour x = <?php echo $i; ?>, 
								 y = <?php echo $suite[$i]['value']; ?>
						</li>
					<?php endfor ?>	
				</ul>
			</div>
		</div>
	</div>
	
	<div class="col-md-6 text-center">
		<div class="row">
			<div class="col-md-12">
				<h3>Schema graphique</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="wrap">
					<svg width ="<?php echo getenv('svg_width') ?>"
						 height ="<?php echo getenv('svg_heigth') ?>">

						<?php for($i=0; $i<count($suite);$i++): ?>
							
							<?php if (isset($suite[$i-1])):?>
								<line x1="<?php echo $suite[$i-1]['x'] ?>" 
									  y1="<?php echo $suite[$i-1]['y'] ?>" 
									  x2="<?php echo $suite[$i]['x'] ?>" 
									  y2="<?php echo $suite[$i]['y'] ?>" 
									  style="stroke:#FF00FF;stroke-width:1;" />
							<?php else: ?>

							<?php endif ?>

						<?php endfor ?>

					</svg>
				</div>			</div>
		</div>
	</div>
</div>


<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>