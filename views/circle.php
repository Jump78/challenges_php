<?php ob_start() ?>
<div class="row text-center">
	<col-md-12>
		<h1>Des cercles ! Des cercles de partout !!</h1>
	</col-md-12>
</div>

<div class="col-md-12 text-center margin-4-em">
	<div id="wrap">
	    <svg width="<?php echo getenv('svg_width') ?>" height="<?php echo getenv('svg_heigth') ?>">
	    
		<?php foreach ($circles as $circle):?>

			<circle cx="<?php echo $circle['cx']; ?>"
					cy="<?php echo $circle['cy']; ?>" 
					r="<?php echo $circle['r']; ?>" 
					fill="<?php echo getenv('color_circle') ?>"/>
		
		<?php endforeach ?>

	    </svg>
	</div>   
</div>


<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>