<?php 

function draw_pyramide($nb){

	$pyramide = [];
	
	$square = [];
	
	$file = fopen('../data.txt','r+');

	$square['size'] = getenv('svg_width')/$nb;

	$visible = getenv('visible_char');

	$hidden = getenv('hidden_char');

	$i=0;

	//Parcourt les lignes de data.txt
	while (true) {
		$line = fgets($file);

		$square['y'] = $i*$square['size'];
		
		//Parcour les charactères de la lignes 
		for ($j=0; $j < strlen($line); $j++) {
			
			if ($line[$j] !== $visible) continue;
			
			//Si on le carre est apparant on lui donne une couleur
			//Sinon non
			
			$square['x'] = $j * $square['size'];
			
			$square['fill'] = getenv('color_pyramide');
			
			$pyramide[] = $square;
		}

		$i++;

		if (!(strlen($line))) {
			fclose($file);
			break;
		}
	}

	return $pyramide;
	
}

function draw_damier($nb){

	$damier = [];
	
	$square = [];
	
	$file = fopen('../data.txt','r+');

	$square['size'] = getenv('svg_width')/$nb;

	$char = env_to_array(getenv('char'));

	$colors = env_to_array(getenv('color_damier'));

	$i=0;

	//Parcourt les lignes de data.txt
	while (true) {
		$line = fgets($file);

		$square['y'] = $i*$square['size'];
		
		//Parcour les charactères de la lignes 
		for ($j=0; $j < strlen($line); $j++) {
			
			$square['x'] = $j * $square['size'];

			//On chercher la couleur lié au char, grace a 
			//leur index identique dans les tableaux
			if (array_search($line[$j], $char) !== false) {
				$index = array_search($line[$j], $char);
				$square['fill'] = $colors[$index];
			}else{
				break;
			}
			
			$damier[] = $square;
		}

		$i++;

		if (!(strlen($line))) {
			fclose($file);
			break;
		}
	}

	return $damier;
	
}

function draw_circle($data){
	$circle_array = [];
	if ($data == 0) return $circle_array;

	$svg_size = getenv('svg_width');
	$size = $svg_size/$data; 
	$r = $size*0.5;	

	$colonne = 0;
	$ligne =0;

	while(true) { 

		for ($i=$colonne; $i < $data; $i++) { 
			$circle_array[] = [ 'cx' => $size*$i+$r, 
								'cy'=> $size*$ligne+$r,
								'r' =>$r 
							];
		}

		$ligne++;

		if ($size*$ligne+$r> 600) {
			return $circle_array;
		}
	}
}

function syracuse($n){

	$suite = [];
	$suite[] = [
		'value'=>$n,
		'x' => 0,
		'y' => 0,
		];
	$i = 1;
	while ( $suite[$i-1]['value'] != 1) {
		
		if (!($suite[$i-1]['value']%2)) {
			$value=$suite[$i-1]['value']/2;
		}else{
			$value=(3*$suite[$i-1]['value']+1);
		}

		$suite[] = [
			'value' => $value,
			'x' => 0,
			'y' => 0,
		];

		$i++;
	}

	$max = max($suite)['value'];

	for ($i=0; $i < count($suite); $i++) { 
		$suite[$i]['x'] = $i * ((getenv('svg_width')/count($suite)));
		$suite[$i]['y'] = getenv('svg_heigth')-(($suite[$i]['value']) * (getenv('svg_heigth')/$max));

	}

	return $suite;
	
}

function testCrypAff($a,$b){
	if (!(26%$a)) {
		return false;
	}

	$etape = [];

	$diviseur = 26;
	$dividende = $a;
	$reste = $diviseur%$dividende;
	
	$etape[] = $reste;

	while ($reste) {

		$diviseur = $dividende;
/*		echo "Diviseur = ". $diviseur;
*/		$dividende = $reste;
/*		echo " dividende = ". $dividende;
*/		$reste = $diviseur%$dividende;
/*		echo " reste = ". $reste ."<br>";
*/
		$etape[] = $reste;
	}

	if($etape[count($etape)-2] == 1) return true;

	return false;


}

function encode_affine_letter($a,$b,$letter){
	$n = ord($letter);
	return chr((($a*$n +$b)%26)+65);
}

function encode_affine(int $a,int $b,string $txt){

	$txt = strtoupper($txt);
	$txt = trim($txt);
	$string = '';

	for ($i=0; $i < strlen($txt); $i++) { 
		if (ord($txt[$i])<65 || ord($txt[$i])>(65+26)) return ' Aucun caractère special n\'est toléré: "'.$txt[$i].'"';

		$string.=encode_affine_letter($a,$b,$txt[$i]);
	}

	return $string;
}
