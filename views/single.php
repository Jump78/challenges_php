<?php ob_start() ?>
    <div class="col-md-12 text-center">
    	<div class="row">
    		<div class="col-md-12 margin-4-em">
    			<h1><?php echo $page['title']; ?></h1>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
					<form action="<?php echo getenv('URL_SITE') ?>/index.php/<?php echo $page['exercice'] ?>" method="get">
						<div class="input-group input-group-lg margin-4-em">
							 <span class="input-group-addon" id="nb">Entre un nombre et voit le resultat !</span>

							<input type="number" name="nb" class="form-control" aria-describedby="nb">
					       
							<span class="input-group-btn">
        	        		<input class="btn btn-default btn-primary" type="submit" value="Go !">
					     	</span>

        	        		
						</div>
					</form>   			
    		</div>
    	</div>
	</div>    
	<?php if (isset($_SESSION['error'])):?>
	    <div class="row">
	        <div class="col-md-12 text-center margin-4-em">
	                <p class="error">
	                    <?php echo $_SESSION['error'];
		                           $_SESSION['error'] = '';
					    ?>
					</p>
			</div>
		</div>
	<?php endif ?>  
	
<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>