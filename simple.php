<?php

	if(isset($_POST['texto']))
		{
			$texto=str_split($_POST['texto']);
				if(!isset($_POST['cifrar']))
				{
					for($i=0;$i<count($texto);$i++)
					{
						$textado[]=chr(ord($texto[$i])+1);
					}
					$textado=implode($textado);
				}
				else
				{
					for($i=0;$i<count($texto);$i++)
					{
						$textado[]=chr(ord($texto[$i])-1);
					}
					$textado=implode($textado);
				}
		}
	else
		{
			$textado="Tu petición no es válida";
		}
	echo '
	<!DOCTYPE html>
	<html>
		<head>
			<title>
				Seguridad-P3
			</title>
		</head>
		<body>
			<h1>
				Seguridad-Cifrado Simple
			</h1>
			<form action="simple.php" method="POST">
				Texto:
				<input  type="text" name="texto" autofocus required>
				<br/>
				Cifrar/Descifrar
				<input  type="checkbox" name="cifrar">
				<br/>
				<input type="submit">
			</form>
			<pre>'.$textado.'</pre>
		</body>
	</html>';
?>