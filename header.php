<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="https://dev-style.agentfirecdn.com/bootstrap.client.css">
<link rel="stylesheet" href="https://dev-style.agentfirecdn.com/bootstrap.admin.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/estilos.css">

</head>
<body>
		<?php
		//Cerrar sesion de ".$_SESSION['nombre']."
		//Utilizar la variable $_SESSION anteriormente configurada
		session_start();
		if(isset($_SESSION['nombre'])){
			//echo "Cerrar sesion de ".$_SESSION['nombre'].""

        
        include "prueba.php";
        

}else{
			header("Location: index.php");
		}
		?>
</body>
</html>