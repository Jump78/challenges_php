
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Challenges</title>
		<link rel="stylesheet" href="<?php echo getEnv('URL_SITE') ?>/asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo getEnv('URL_SITE') ?>/asset/css/style.css">
	</head>
    <body>

        <div class="container">

        	<div class="row">

				<?php if (isset($content)) echo $content ?>

        	</div>

       </div>

        <script src='<?php echo getEnv('URL_SITE') ?>/asset/js/bootstrap.min.js'></script>
    </body>
</html>