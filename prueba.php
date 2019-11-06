<!DOCTYPE html>
<html>
<head>
	<title></title>
		  <link rel="stylesheet" href="https://dev-style.agentfirecdn.com/bootstrap.client.css">
<link rel="stylesheet" href="https://dev-style.agentfirecdn.com/bootstrap.admin.css"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="simple-admin">
  <div data-component="sidebar">
    <div class="sidebar">
      <ul class="list-group flex-column d-inline-block first-menu">
        <li class="list-group-item py-2">
          <a href="principal.php">
            <img src="imagenes/reservas.png" height="40" class="mr-4"><span>Reservas</span>
          </a>
        </li> <!-- /.list-group-item -->
        
        <li class="list-group-item py-2">
          <a href="historial.php">
            <img src="imagenes/historial.png" height="40"class="mr-4"><span>Historial</span>
          </a>
        </li> <!-- /.list-group-item -->
<?php

include "conexion.php";
        $id=$_SESSION["nombre"];

        $txt_emp="SELECT nombre_usuarios FROM tbl_usuarios WHERE nombre_usuarios='$id' and admin_usuarios=1 OR nombre_usuarios='$id' and informatico_usuarios=1";

		$qry_res=mysqli_query($connexion,$txt_emp);
		if(null!=(mysqli_fetch_array($qry_res))){

        echo '<li class="list-group-item py-2">
          <a href="incidencias.php">
            <img src="imagenes/incidencias.png" height="40" class="mr-4"><span>Incidencias</span>
          </a>

        </li>
        <li class="list-group-item py-2"  style="margin-top: 370px">';

}else{
	echo '<li class="list-group-item py-2"  style="margin-top: 524.5px">';
}
?>



          <a href="logout.php">
            <img src="imagenes/logout.png" height="40" class="mr-4"><span>Cerrar sesión de <?php echo $_SESSION['nombre'];?></span>
          </a>
        </li> <!-- /.list-group-item -->
        
      </ul>
    </div> <!-- /.sidebar -->
  </div>
</div> <!-- /.simple-admin -->
<!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>



</body>
</html>
