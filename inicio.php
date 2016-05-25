<?php
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['pass']))
{
	$cc=mysqli_connect("localhost", "root", "", "seguridadBN");

}

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
		</form>
		
		';
		
echo'	<a href="asimetrico.php">Cifrado Asimetrico</a><br/>
		<a href="curp.php">CURP</a><br/>
		<a href="p8.html">Hash</a><br/>
		<a href="p8p2.html">Loose loose</a><br/>
		<a href="p9.html">ISBN</a><br/>
		<a href="playfair.html">Playfair</a><br/>
		<a href="simetrico.html">Cifrado Simetrico</a><br/>
		<a href="simple.html">Cifrado Simple</a><br/>
		<a href="visa.php">VISA</a><br/></body>
</html>';

?>