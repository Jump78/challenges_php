<?php ob_start() ?>
<div class="row text-center">
	<col-md-12>
		<h1>Et un damier de fait ! Un !</h1>
	</col-md-12>
</div>
<div class="col-md-12 text-center margin-4-em">
	<div id="wrap">
		<svg width="<?php echo getenv('svg_width') ?>" height="<?php echo getenv('svg_heigth') ?>">
			<?php foreach ($damier as $square): ?>

				<rect x="<?php echo $square['x'] ?>"  
					  y="<?php echo $square['y'] ?>" 
					  width="<?php echo $square['size'] ?>" 
					  height="<?php echo $square['size'] ?>" 
					  fill="<?php echo $square['fill'] ?>">
					  	
				</rect>
									
			<?php endforeach ?>
	    </svg>
	</div>
</div>


<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>