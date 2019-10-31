<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="position: absolute; right: 180px; top: 12px; color: white;">
		<?php
		//Cerrar sesion de ".$_SESSION['nombre']."
		//Utilizar la variable $_SESSION anteriormente configurada
		session_start();
		if(isset($_SESSION['nombre'])){
			echo "Cerrar sesion de ".$_SESSION['nombre']."
			"?>
			</div>
			<div style="position: absolute; right: 110px; top: 8px">
			<?php echo "<a href='logout.php'><img src='imagenes/salir.jpg'></a>&nbsp;&nbsp;";
		}else{
			header("Location: index.php");
		}
		?>
	</div> 
</body>
</html>