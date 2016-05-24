<?php
if(isset($_POST['texto'])&&isset($_POST['n'])&&ctype_digit($_POST['n'])&&($_POST['n']>0))
{
	if(!isset($_POST['cifrar']))
	{
		$texto=str_split($_POST['texto']);
		$n=intval($_POST['n']);
		for($i=0;$i<=(count($texto)-1);$i++)
			$textm[floor($i/$n)][abs($i%$n)]=$texto[$i];
		for($i=0;$i<$n;$i++)
			foreach ($textm as $t){
				if(isset($t[$i]))
					$textado[]=$t[$i];
				else
					$textado[]=' ';
			}
		$textado=implode($textado);
	}
	else {
	$texto=str_split($_POST['texto']);
	$n=intval($_POST['n']);
	for($i=0;$i<=(count($texto)-1);$i++){
		$textm[abs($i%(count($texto)/$n))][floor($i/(count($texto)/$n))]=$texto[$i];
		//echo '$textm['.abs($i%(floor(count($texto)/$n))).']['.floor($i/(count($texto)/$n)).']='.$texto[$i].'<br/>';
}
	//var_dump($textm);
	foreach ($textm as $t)
		for($i=0;$i<$n;$i++){
			if(isset($t[$i]))
				$textado[]=$t[$i];
			else
				$textado[]=' ';
		}
	$textado=implode($textado);
	}
}
else{
	$textado='Tu petición no es válida';
}


echo '
<!DOCTYPE html>
<html>
	<head>
		<title>
			Seguridad-P2
		</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>
			Seguridad-Playfair
		</h1>
		<form action="playfair.php" method="POST">
			Texto:
			<input  type="text" name="texto" autofocus required>
			<br/>
			Llave
			<input  type="text" name="n" pattern="\d+" required>
			<br/>
			<input type="submit">
			Cifrar/Descifrar
			<input  type="checkbox" name="cifrar">
			<br/>
		</form><pre>'
		.$textado.'</pre></body>
</html>';
?>
