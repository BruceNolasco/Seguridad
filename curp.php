<?php
$equivalencias=array(
	'0'=>0,
	'1'=>1,
	'2'=>2,
	'3'=>3,
	'4'=>4,
	'5'=>5,
	'6'=>6,
	'7'=>7,
	'8'=>8,
	'9'=>9,
	'A'=>10,
	'B'=>11,
	'C'=>12,
	'D'=>13,
	'E'=>14,
	'F'=>15,
	'G'=>16,
	'H'=>17,
	'I'=>18,
	'J'=>19,
	'K'=>20,
	'L'=>21,
	'M'=>22,
	'Ñ'=>23,
	'N'=>24,
	'O'=>25,
	'P'=>26,
	'Q'=>27,
	'R'=>28,
	'S'=>29,
	'T'=>30,
	'U'=>31,
	'V'=>32,
	'W'=>33,
	'X'=>34,
	'Y'=>35,
	'Z'=>36,
);
echo '
<html>
	<head>
		<title>
			Seguridad-Extra 1
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
			Seguridad-Validación de CURP
		</h1>
		<h2>
			Crear CURP
		</h2>
		<p>Mayúsculas por favor...</p>
		<form action="curp.php" method="POST">
			Apellido Paterno:
			<input  type="text" name="paterno" pattern="[A-Z]+" autofocus required>
			<br/>
			Apellido Materno
			<input  type="text" name="materno" pattern="[A-Z]+" required>
			<br/>
			Nombre
			<input  type="text" name="nombre" pattern="[A-Z]+" required>
			<br/>
			Año de Nacimiento
			<input  type="text" name="year" pattern="\d{4}" required>
			<br/>
			Mes de Nacimiento
			<input  type="text" name="mes" pattern="\d{2}" required>
			<br/>
			Día de Nacimiento
			<input  type="text" name="dia" pattern="\d{2}" required>
			<br/>
			Sexo
			<input type="radio" name="sexo" value="H" /> Hombre
			<input type="radio" name="sexo" value="M" checked /> Mujer<br/>
			2 Letras correspondientes con la entidad de nacimiento:
			<input  type="text" name="ent" pattern="[A-Z]{2}" required>
			<br/>
			<input type="submit">
		</form>
		<h2>
			Verificar CURP
		</h2>
		<p>Mayúsculas por favor...</p>
		<form action="curp.php" method="POST">
			CURP a verificar:
			<input  type="text" name="curp" pattern="\w{18}" autofocus required>
			<br/>
			<input type="submit">
		</form><pre>';
		if(isset($_POST['paterno'])&&isset($_POST['materno'])&&isset($_POST['nombre'])&&isset($_POST['year'])&&isset($_POST['mes'])&&isset($_POST['dia'])&&isset($_POST['sexo'])&&isset($_POST['ent']))
		{
		
		$textado[0]=substr(strtoupper($_POST['paterno']),0,1);
		$pvocal=strcspn(strtoupper($_POST['paterno']), "AEIOU");
		$textado[1]=substr(strtoupper($_POST['paterno']),$pvocal,1);
		$textado[2]=substr(strtoupper($_POST['materno']),0,1);
		$textado[3]=substr(strtoupper($_POST['nombre']),0,1);
		$textado[4]=substr(strtoupper($_POST['year']),-2,1);
		$textado[5]=substr(strtoupper($_POST['year']),-1,1);
		$textado[6]=substr(strtoupper($_POST['mes']),-2,1);
		$textado[7]=substr(strtoupper($_POST['mes']),-1,1);
		$textado[8]=substr(strtoupper($_POST['dia']),-2,1);
		$textado[9]=substr(strtoupper($_POST['dia']),-1,1);
		$textado[10]=substr(strtoupper($_POST['sexo']),-1,1);
		$textado[11]=substr(strtoupper($_POST['ent']),-2,1);
		$textado[12]=substr(strtoupper($_POST['ent']),-1,1);
		$textado[13]=substr(strtoupper($_POST['paterno']),strcspn(strtoupper($_POST['paterno']),"BCDFGHJKLMNPQRSTVWXYZ",1)+1,1);
		$textado[14]=substr(strtoupper($_POST['materno']),strcspn(strtoupper($_POST['materno']),"BCDFGHJKLMNPQRSTVWXYZ",1)+1,1);
		$textado[15]=substr(strtoupper($_POST['nombre']),strcspn(strtoupper($_POST['nombre']),"BCDFGHJKLMNPQRSTVWXYZ",1)+1,1);
		if(intval(strtoupper($_POST['year']))<2000)
			$textado[16]='0';
		else
			$textado[16]='A';
		$verify=0;
		for($i=0;$i<=15;$i++)
			$verify+=($equivalencias[substr(strtoupper($textado[$i]),$i,1)]*(18-$i));
		$verify%=10;
		$textado[17]=$verify;
		
		
		//ECHO strcspn(strtoupper($_POST['paterno']),"BCDFGHJKLMNPQRSTVWXYZ",1);
		/*$textado[13]=substr(strtoupper($_POST['paterno']),$pcons+1,1);
		var_dump($pcons);
		$pcons=strcspn(strtoupper($_POST['materno']),"BCDFGHJKLMNPQRSTVWXYZ",1);
		$textado[14]=substr(strtoupper($_POST['materno']),$pcons+1,1);*/
		//ECHO $_POST['materno'];
		
		$textado=implode($textado);
		echo 'CURP:<br/>'.$textado;
		}
		else
		{
				if(isset($_POST['curp'])&&strlen(($_POST['curp'])))
				{
					$curp=str_split(strtoupper($_POST['curp']));
					$verify=0;
					for($i=0;$i<=15;$i++)
					{
						$verify+=($equivalencias[(strtoupper($curp[$i]))]*(18-$i));
						echo ($equivalencias[(strtoupper($curp[$i]))]*(18-$i)).'<br/>';
					}
					echo $verify.'<br/>';
					if($verify%10==intval($curp[17])%10)
					{
						echo 'La CURP: '.implode($curp).' es válida';
					}
					else{
						echo 'La CURP: '.implode($curp).' es inválida';
					}
				}
				else {
					echo 'Petición inválida';
				}
		}
		echo '</pre>
		</body>
</html>';
?>