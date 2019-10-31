<?php
   //se incluye la pagina conexion.php para poder recoger la conexión a la BD
   include("conexion.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      session_start();
      // username and password sent from form 
      
      $myusername = $_REQUEST['username'];
      $mypassword = $_REQUEST['password']; 
      $pass = md5($mypassword);
	  if (isset( $_REQUEST['username'])){
	  
      $sql = "SELECT id_usuarios FROM tbl_usuarios WHERE nombre_usuario = '$myusername' and pwd_usuarios = '$pass'";
	  
	
      $result = mysqli_query($connexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['nombre'] = $myusername;
         
         header("location: principal.php");
      }else {
        phpAlert(   'Usuario o contraseña incorrectos'   );
        header('Refresh:0; url = index.php?us='.$myusername);
      }
	  }
   }
?>