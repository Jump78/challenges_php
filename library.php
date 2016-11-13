<?php 

function get_pages($id){
	$pages = [
		[
			'title' => 'Dessine une pyramide !',
			'exercice' => 'pyramide',

		],
		[
			'title' => 'Crée un pavage de cercle !',
			'exercice' => 'circle',
		],
		[
			'title' => 'Dessine un damier !',
			'exercice' => 'damier',
		],
		[
			'title' => 'Crée la suite de Syracuse d\'un  entier !',
			'exercice' => 'syracuse',
		],
		[
			'title' => 'Crypte un message !',
			'exercice' => 'crypte',
		],
	];

	return $pages[$id];	
}

function generate_pyramide_pattern($base_size){
	
	$file = fopen('../data.txt','w');
		
	$string = '';

	$new_line='';

	$index_line = 0;

	$visible = getenv('visible_char');

	$hidden = getenv('hidden_char');

	//Génération de la base de la pyramide
	for ($i=0; $i < $base_size; $i++) { 
		$new_line.=$visible;
	}

	while (true) {	
		//Clonage de la base 
		$result = $new_line;

		//On modifie cette ligne pour former une pyrammide 
		for ($j=0; $j < $index_line; $j++) { 
			$result[$j]=$hidden;
			$result[$base_size-1-$j]=$hidden;
		}
		
		
		$index_line++;
		
		$string.=$result;	

		//On finit la boucle quand on est sommet de la pyrammide
		//Exemple : #*# --> Sommet d'une pyrammide de base 3
		if ($base_size-($index_line*2) < 0) {
			break;
		}
		
		$string.="\n";	

	}

	fwrite($file, strrev($string));

	fclose($file);	
}

function env_to_array($env){
	$result = preg_split("[,]",$env);

	return $result;
}

function generate_damier_pattern($base_size){
	
	$file = fopen('../data.txt','w');
		
	$string = '';

	$char = env_to_array(strrev(getenv('char')));

	for ($i=0; $i < $base_size; $i++) { 
		
		$new_line='';
		
		for ($j=1; $j <= $base_size; $j++) { 
			if ($i%2) {
				if($j%2) $indice = 0;
				else $indice = 1;
			}else{
				if($j%2) $indice = 1;
				else $indice = 0;
			}
			$new_line .= $char[$indice];
		}

		$string .= $new_line;		
		
		if ($i != $base_size-1) $string .= "\n";		
	}

	fwrite($file, $string);

	fclose($file);	
}

function generate_syracuse_data($suite){
	
	$file = fopen('../data.txt','w');

	$string = "La suite de syracuse du nombre ".$suite[0]['value']. " est: \n";

	for ($i=0; $i < count($suite); $i++) { 

		$string.= 'U'.$i.' = '.$suite[$i]['value'].', ';	
		
		$string .= "\n";
	}

	fwrite($file, $string);

	fclose($file);	
}

