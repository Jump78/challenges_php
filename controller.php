<?php 

function home_action()
{
	include 'views/home.php';
} 	

function show_single($id){
	session_start();

	$page = get_pages($id);

	include 'views/single.php';
}

function pyramide_action($nb){
	
	if(!($nb%2) || $nb == 1){
		session_start();

		$_SESSION['error'] = 'Il faut un nombre impair';
		
		header('Location: /index.php/single?id=0');
		exit;
	};

	generate_pyramide_pattern($nb);
	
	$pyramide = draw_pyramide($nb);

	include 'views/pyramide.php';
}

function damier_action($nb){
	
	if($nb == 0){
		session_start();

		$_SESSION['error'] = 'Créer un damier de 0 case est inutile...';
		
		header('Location: /index.php/single?id=2');
		exit;
	};

	generate_damier_pattern($nb);
	
	$damier = draw_damier($nb);

	include 'views/damier.php';
}

function circle_action($data){
	if($data == 0){
		session_start();

		$_SESSION['error'] = 'Créer un pavage de cercle de 0 cercle est inutile...';
		
		header('Location: /index.php/single?id=1');
		exit;
	};

	$circles = draw_circle($data);

	include 'views/circle.php';
}

function syracuse_action($nb){
	
	if($nb<=0 || empty($nb)){
		session_start();

		$_SESSION['error'] = 'La suite de syracuse ne fonctionne que pour les chiffres strictement supérieur à 0';
		
		header('Location: /index.php/single?id=3');
		exit;
	};
	
	$suite = syracuse($nb);
	
	generate_syracuse_data($suite);

	include 'views/suite.php';
}
