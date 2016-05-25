<?php
session_start();


ECHO '
<!DOCTYPE html>
<html>
	<head>
		<title>
			Seguridad-Proyecto
		</title>
	</head>
	<body>
		<h1>
			Seguridad-Inicio
		</h1>';
		
if(!isset($_SESSION['sh']))
echo '
		<h2>
			Registro
		</h2>
		<form action="inicio.php" method="POST">
			Nombre de Usuario(letras, números y _)5:
			<input  type="text" name="user" pattern="\w{5}\w+" autofocus required>
			<br/>
			Contraseña (letras, números y _)6:
			<input  type="password" name="pass" pattern="\w{6}\w+" required>
			<br/>
			
			<input type="submit">
		</form>
		<h2>
			Login
		</h2>
		<form action="inicio.php" method="POST">
			Nombre de Usuario:
			<input  type="text" name="userl" pattern="\w{5}\w+" autofocus required>
			<br/>
			Contraseña:
			<input  type="password" name="passl" pattern="\w{6}\w+" required>
			<br/>
			<input  type="hidden" name="gg" value"'.sha1(mcrypt_create_iv(5)).'"/>
			<input type="submit">
		</form>';
else
	echo '<h1>Bienvenid@</h1>
		<h2>
			Salir
		</h2>
		<form action="inicio.php" method="POST">
			<input  type="hidden" name="gg" value"'.$_SESSION['sh'].'"/>
			<input type="submit">
		</form>';
		
echo'	</body>
</html>';

?>