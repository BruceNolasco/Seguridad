<?php

echo '
<!DOCTYPE html>
<html>
	<head>
		<title>
			Seguridad-P7
		</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>
			Seguridad-Hash
		</h1>
		<form action="p8.php" method="GET">
			Texto:
			<input  type="text" name="texto">
			<br/>
			<input type="submit">
		</form><p>';
		
		if(strlen($_GET['texto'])>1)
{
	$texto=str_split($_GET['texto']);
	$i=1;
	foreach($texto as $t)
	{
		$textado[]=chr((abs(((ord($t)+pow(count($texto),2))&(count($texto)*ord($t)*$i)^pow(count($texto),3))^(pow(count($texto),4)))%90)+30);
		$i++;
	}
	$textado=implode($textado);
}

		
		echo $textado.'<br/>
		</p>
	</body>
</html>';

?>