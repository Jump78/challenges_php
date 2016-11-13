<?php ob_start() ?>
    <div class="col-md-12 text-center">
    	<div class="row margin-4-em">
    		<div class="col-md-12 text-center">
				<h1>Hey! Viens tester quelques p'tit algo des familles fait en cours !</h1>
				<h3>C'est simple choisit un des exos</h3>
    		</div>
    	</div> 	

        <div class="row margin-4-em">
    		<div class="col-md-3 col-md-offset-3">
    			<div class="thumbnails">
    				<a href="/index.php/single?id=0">Pyramide</a>
    			</div>
    		</div>
    		<div class="col-md-3">
    			<div class="thumbnails">
    				<a href="/index.php/single?id=1">Pavage de cercle</a>
    			</div>
       		</div>
    	</div>    	
    	<div class="row margin-4-em">
    		<div class="col-md-3 col-md-offset-3">
   				<div class="thumbnails">
    				<a href="/index.php/single?id=2">Damier</a>
    			</div>
    		</div>
    		<div class="col-md-3">
   				<div class="thumbnails">
    				<a href="/index.php/single?id=3">Suite de Syracuse</a>
    			</div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-3 col-md-offset-3 margin-4-em">
    			<div class="thumbnails">
    				<a href="/index.php/cryptage">Cryptage affine</a>
    			</div>
    		</div>
    	</div>
	</div>
	
<?php $content = ob_get_clean() ; ?>

<?php include 'master.php' ?>