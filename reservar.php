<?php
include("conexion.php"); 
	if(isset($_POST['save'])){
		session_start(); //recuperamos la sesion
		$usuario = $_SESSION['nombre']; 
		//fecha actual
		$fecha = date('Y-m-d H:i:s');

		$checkbox1=$_POST['recurso'];  
		$chk="";  
		foreach($checkbox1 as $chk1)  
		    {  
		   	$selestado="SELECT estado_recursos FROM tbl_recursos WHERE `tbl_recursos`.`id_recursos` = $chk1"; 
		   	$sql_query_estado=mysqli_query($connexion, $selestado);
		    while(($estado = mysqli_fetch_array($sql_query_estado))) {
			      	echo 'if disponible';
			      	$update="UPDATE `tbl_recursos` SET `estado_recursos` = 'ocupado' WHERE `tbl_recursos`.`id_recursos` = $chk1";
			      	$sql_query_update=mysqli_query($connexion, $update);
			      	$insert ="INSERT INTO `tbl_reservas` (`inicio_reservas`, `id_recursos`, `reserva_actual`, `id_usuarios` ) VALUES ('$fecha', ".$chk1.", 1, (SELECT `id_usuarios` FROM `tbl_usuarios` WHERE `nombre_usuarios`='".$usuario."'))";
			      	echo $insert;
			      	$sql_query_insert=mysqli_query($connexion, $insert);
		      
		      }
		         
		   }  
      echo $chk;
      } 

    if(isset($_POST['save2'])){
		session_start(); //recuperamos la sesion
		$usuario = $_SESSION['nombre']; 
		//fecha actual
		$fecha = date('Y-m-d H:i:s');

		$checkbox1=$_POST['recurso'];  
		$chk="";  
		foreach($checkbox1 as $chk1)  
		    {  
		   	$selestado="SELECT estado_recursos FROM tbl_recursos WHERE `tbl_recursos`.`id_recursos` = $chk1"; 
		   	$sql_query_estado=mysqli_query($connexion, $selestado);
		    while(($estado = mysqli_fetch_array($sql_query_estado))) 
		         {
		      	
			      	echo 'if ocupado';
			      	$update="UPDATE `tbl_recursos` SET `estado_recursos` = 'disponible' WHERE `tbl_recursos`.`id_recursos` = $chk1";
			      	$sql_query_update=mysqli_query($connexion, $update);
			      	$update_fecha ="UPDATE `tbl_reservas` SET `final_reservas` = '$fecha'  WHERE `tbl_reservas`.`id_recursos` = $chk1";
			      	$sql_query_update=mysqli_query($connexion, $update_fecha);
		      }
		         
		   }  
      echo $chk;
}
?>