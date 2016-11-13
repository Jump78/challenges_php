<?php ob_start() ?>

<div class="col-md-12 text-center">
	<div id="wrap">
			<p>
				<?php echo $cryptage ?>
			</p>
	</div>
</div>


<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>