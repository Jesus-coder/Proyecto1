<?php
//Conexión a la base de datos
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos = "proyecto";


$connexion = mysqli_connect ($servidor, $usuario, $contraseña, $basededatos) or die ("<center>No se puede conectar con la base de datos\n</center>\n");