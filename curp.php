<?php
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
		<p>Mayúsculas por favor...</p>
		<form action="curp.php" method="POST">
			Apellido Paterno:
			<input  type="text" name="paterno" pattern="[A-Z]+" autofocus required>
			<br/>
			Apellido Materno
			<input  type="text" name="materno" pattern="[A-Z]+" required>
			<br/>
			Nombre
			<input  type="text" name="materno" pattern="[A-Z]+" required>
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
			<input  type="text" name="dia" pattern="[A-Z]{2}" required>
			<br/>
			<input type="submit">
		</form><pre>'
		.$textado.'</pre>
		</body>
</html>';
?>