<?php

if(strlen($_GET['texto'])>=10&&strlen($_GET['texto'])!=12&&strlen($_GET['texto'])<14)
{
	if(strlen($_GET['texto'])==13)
	{
		$texto=$_GET['texto'];
			$check=0;
			for($i=0;$i<=11;$i++)
			{
				if(($i)%2==0)
					$z=1;
				else
					$z=3;
				$check+=(intval(substr($texto,$i,1))*$z);	
			}
			$check=$check%10;
			$check=10-$check;
			if($check==intval(substr($texto,12)))
				$textado="El ISBN-13 es correcto";
			else
				$textado="El ISBN-13 no es correcto";
	}
	else
	{
		if(strlen($_GET['texto'])==10)
		{
			$texto=$_GET['texto'];
			$check=0;
			for($i=0;$i<=8;$i++)
				$check+=(intval(substr($texto,$i,1))*($i+1));
			$check=$check%11;
			if($check==intval(substr($texto,9)))
				$textado="El ISBN-10 es correcto";
			else
				$textado="El ISBN-10 no es correcto";
		}
		else 
		{
			$texto=$_GET['texto'];
			$check=0;
			for($i=0;$i<=8;$i++)
				$check+=(intval(substr($texto,$i,1))*($i+1));
			$check=$check%11;
			if($check==intval(substr($texto,9)))
				$textado="El ISBN-10 es correcto";
			else
				$textado="El ISBN-10 no es correcto";
		}
	}
}
else{
	$textado='Tu número no es un ISBN';
}

echo '
<!DOCTYPE html>
<html>
	<head>
		<title>
			Seguridad-P9
		</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>
			Seguridad-ISBN
		</h1>
		<form action="p9.php" method="GET">
			Texto:
			<input  type="text" name="texto">
			<br/>
			<input type="submit">
		</form><p>'.$textado.'<br/>
		</p>
	</body>
</html>';

?>