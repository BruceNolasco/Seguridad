<?php
echo '
<html>
	<head>
		<title>
			Seguridad-Extra 2
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
			Seguridad-Validación de VISA
		</h1>
		<h2>
			Verificar VISA
		</h2>
		<form action="visa.php" method="POST">
			VISA a verificar:
			<input  type="text" name="visa" pattern="\d{16}" autofocus required>
			<br/>
			<input type="submit">
		</form><pre>';
		
		if(isset($_POST['visa'])&&strlen(($_POST['visa'])))
		{
			$visa=str_split(strtoupper($_POST['visa']));
			if($visa[0]=='4')
			{
				$ccg=0;
				$verify=0;
				for($i=0;$i<=14;$i++)
				{
					if($i%2==0)
						$m=2;
					else
						$m=1;
					$cc=intval($visa[$i])*$m;
					if($cc>=10)
						$ccg++;
					$verify-=$cc;
				}
				$verify-=$ccg;
				if((10-abs(($verify)%10))%10==intval($visa[15])%10)
					echo 'La Visa: '.implode($visa).' es válida';
				else{
							echo 'La Visa: '.implode($visa).' es inválida';
					}
			}
			else
				echo 'Tu numero no es de una tarjeta VISA';
		}
		else 
			echo 'Petición inválida';
		
		echo '</pre>
		</body>
</html>';
?>