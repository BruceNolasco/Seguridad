<?php

if(strlen($_GET['texto'])>1)
{
	$textm=0;
	$texto=str_split($_GET['texto']);
	foreach($texto as $t)
	{
		$textm+=ord($t);
	}
	$textado=$textm;
}

echo '
<!DOCTYPE html>
<html>
	<head>
		<title>
			Seguridad-P8
		</title>
	</head>
	<body>
		<h1>
			Seguridad-Loose loose
		</h1>
		<form action="p8p2.php" method="GET">
			Texto:
			<input  type="text" name="texto">
			<br/>
			<input type="submit">
		</form><p>'.$textado.'<br/>
		</p>
	</body>
</html>';

?>