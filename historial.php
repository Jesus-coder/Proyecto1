<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<!-- Barra de Navegacion -->
<center>
<nav>
        <ul class="menu">  
            <li><a href="principal.php">Reservas</a></li>
            <li><a href="">Historial</a></li>   
            <li><a href="">Incidencias</a></li>
            <?php
            include "header.php";
            ?>
            <a href=""><li style="position: absolute; right: 110px; top: 8px"></li></a>  
        </ul>   
</nav>
</center>
<br><br><br>
<table class="tabla">
<?php
//Conectamos a la base de datos
    require_once 'conexion.php';
    
//Coger el id del usuario
$nombre_user= $_SESSION['nombre'];
$sql_user = mysqli_query($connexion, "SELECT id_usuarios FROM tbl_usuarios WHERE nombre_usuarios='$nombre_user'");
while ($res = mysqli_fetch_array($sql_user)) {
    $id_user = $res["id_usuarios"];
}
//Creamos la consulta de los registros del usuario
    $userb=$_SESSION['nombre'];
    $sql = mysqli_query($connexion, "SELECT R.id_reservas, R.inicio_reservas, R.final_reservas, T.nombre_recursos FROM tbl_reservas R LEFT JOIN tbl_recursos T ON R.id_recursos=T.id_recursos WHERE R.id_usuarios='$id_user'");
//Mostrar la tabla
    while ($res = mysqli_fetch_array($sql)) {
                    echo '<tr class="tabla">';
                    echo '<th class="tabla">' . $res["id_reservas"] . '</th>';
                    echo '<th class="tabla">' . $res["inicio_reservas"] . '</th>';
                    echo '<th class="tabla">' . $res["final_reservas"] . '</th>';
                    echo '<th class="tabla">' . $res["nombre_recursos"] . '</th>';
                    echo '</tr>';
    }
?>
</table>


