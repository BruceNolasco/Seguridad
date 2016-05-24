<?php

	if(isset($_POST['texto'])&&isset($_POST['n']))
		{
			$texto=str_split(($_POST['texto']));
			$llave=str_split($_POST['n']);
				if(!isset($_POST['cifrar']))
				{
					for($i=0;$i<count($texto);$i++)
					{
						$k=ord($llave[$i%count($llave)]);
						$rk=floor($k/10);
						$mk=abs($k%10);
						$m=ord($texto[$i]);
						for($j=0;$j<=$mk;$j++)
						{
							if($j%2==0)
								$m+=$rk-4;
							else
								$m-=$rk;
						}
						$textado[]=chr($m);
						//echo end($textado).'='.ord(end($textado)).'<br/>';
					}	
					//var_dump($textado);
					$textado=implode($textado);
				
				}
				else
				{
					for($i=0;$i<count($texto);$i++)
					{
						$k=ord($llave[$i%count($llave)]);
						$rk=floor($k/10);
						$mk=abs($k%10);
						$m=ord($texto[$i]);
						for($j=0;$j<=$mk;$j++)
						{
							if($mk%2==0)
							{
								if($j%2==0)
									$m-=$rk-4;
								else
									$m+=$rk;
							}
							else
							{
								if($j%2==0)
									$m+=$rk;
								else
									$m-=$rk-4;
							}
						}
						$textado[]=chr($m);
						//echo end($textado).'='.ord(end($textado)).'<br/>';
					}	
					//var_dump($textado);
					$textado=implode($textado);
				}
			//var_dump($textado);
		}
	else
		{
			$textado="Tu petición no es válida";
		}
echo '
<html>
	<head>
		<title>
			Seguridad-P5
		</title>
		<meta charset="utf-8">
		<style>
			body{
				font-family:arial;
			}
		</style>
	</head>
	<body>
		<h1>
			Seguridad-Cifrado Simétrico
		</h1>
		<form action="simetrico.php" method="POST">
			Texto:
			<input  type="text" name="texto" autofocus required>
			<br/>
			Llave
			<input  type="text" name="n"required>
			<br/>
			Cifrar/Descifrar
			<input  type="checkbox" name="cifrar">
			<br/>
			<input type="submit">
		</form><pre>'
		.$textado.'</pre>
		<em>Por razones de display desconocidas<br/>
		no es posible mostrar el total de caracteres <br/>
		ASCII(>128). La función chr() las deforma.<br/>
		Por favor no meta acentos y caracteres especiales. 666<em></body>
</html>';
?>