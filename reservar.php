<?php
include("conexion.php"); 
	if(isset($_POST['save']))
	{
		session_start(); //recupera la sesión actual
		$usuario = $_SESSION['nombre']; //asigna el nombre de sesión a la variable $usuario
		$fecha = date('Y-m-d H:i:s');//obtiene fecha actual
		$checkbox1=$_POST['recurso'];//recoje el array de checkbox y lo asigna a la variable $checkbox1
		//Bucle que recorre el array y le asigna los valores de cada iteracion a la variable $chk1 
		foreach($checkbox1 as $chk1)  
		{  
		   	$selestado="SELECT estado_recursos FROM tbl_recursos WHERE `tbl_recursos`.`id_recursos` = $chk1"; 
		   	$sql_query_estado=mysqli_query($connexion, $selestado);
		    while(($estado = mysqli_fetch_array($sql_query_estado))) 
		    {
			      	$update="UPDATE `tbl_recursos` SET `estado_recursos` = 'ocupado' WHERE `tbl_recursos`.`id_recursos` = $chk1";
			      	$sql_query_update=mysqli_query($connexion, $update);
			      	$insert ="INSERT INTO `tbl_reservas` (`inicio_reservas`, `id_recursos`, `id_usuarios` ) VALUES ('$fecha', ".$chk1.", (SELECT `id_usuarios` FROM `tbl_usuarios` WHERE `nombre_usuarios`='".$usuario."'))";
			      	$sql_query_insert=mysqli_query($connexion, $insert);
		      
		     }
		         
		}
		header('Location: principal.php')  
    } 

    if(isset($_POST['save2']))
    {
		session_start();
		$usuario = $_SESSION['nombre']; 
		$fecha = date('Y-m-d H:i:s');
		$checkbox1=$_POST['recurso'];   
		foreach($checkbox1 as $chk1)  
		{  
		   	$selestado="SELECT estado_recursos FROM tbl_recursos WHERE `tbl_recursos`.`id_recursos` = $chk1"; 
		   	$sql_query_estado=mysqli_query($connexion, $selestado);
		    while(($estado = mysqli_fetch_array($sql_query_estado))) 
		    {
		      	
			     
			    $update="UPDATE `tbl_recursos` SET `estado_recursos` = 'disponible' WHERE `tbl_recursos`.`id_recursos` = $chk1";
			    $sql_query_update=mysqli_query($connexion, $update);
			    $update_fecha ="UPDATE `tbl_reservas` SET `final_reservas` = '$fecha'  WHERE `tbl_reservas`.`id_recursos` = $chk1";
			    $sql_query_update=mysqli_query($connexion, $update_fecha);
		    }
		         
		}
		header('Location: principal.php')  
	}
?>