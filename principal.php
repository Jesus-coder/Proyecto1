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
            <li><a href="">Reservas</a></li>
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
<!-- Filtros -->
<form action="filtros.php" method="post">
    <input type="checkbox" name="sala" value="S" <?php
    if (isset($_GET['fl'])) {
        $var = $_GET['fl'];
        if ($var == 'S' || $var == 'C') {
            echo "checked";
        }
    }
        ?>> Salas
    <input type="checkbox" name="objeto" value="O" <?php
    if (isset($_GET['fl'])) {
        $var = $_GET['fl'];
        if ($var == 'O' || $var == 'C') {
            echo "checked";
        }
    }
    ?>> Objeto
<input type="submit" value="Filtrar">
</form><br>
<table class="tabla">
    <?php
    //Conectamos a la base de datos
    require_once 'conexion.php';
    
    //Si la variable que devuelve filtros.php no esta inicializada que me muestre todos los recursos, en caso contrario que me muestre los recursos que ha filtrado el usuario
    if (!isset ($_GET['fl'])){
        $filtro='C';
    }else{
        $filtro=$_GET['fl'];
    }
    
    //Hacemos un switch para las querys, segun el filtro hará una consulta diferente
    switch ($filtro) {
            case 'C' :
                $sql = mysqli_query($connexion, "SELECT R.nombre_recursos, R.estado_recursos, I.nombre_tiporecursos FROM tbl_recursos R LEFT JOIN tbl_tiporecursos I ON R.id_tiporecursos=I.id_tiporecursos");
                break;
            case 'S' :
                $sql = mysqli_query($connexion, "SELECT R.nombre_recursos, R.estado_recursos, I.nombre_tiporecursos FROM tbl_recursos R LEFT JOIN tbl_tiporecursos I ON R.id_tiporecursos=I.id_tiporecursos WHERE I.id_tiporecursos=1");
                break;
            case 'O' :
                $sql = mysqli_query($connexion, "SELECT R.nombre_recursos, R.estado_recursos, I.nombre_tiporecursos FROM tbl_recursos R LEFT JOIN tbl_tiporecursos I ON R.id_tiporecursos=I.id_tiporecursos WHERE I.id_tiporecursos=2");
                break;
        }
        
    //Mostrar las tablas filtradas
        while ($res = mysqli_fetch_array($sql)) {
                    echo '<tr class="tabla">';
                    echo '<th class="tabla">' . $res["nombre_recursos"] . '</th>';
                    echo '<th class="tabla">' . $res["estado_recursos"] . '</th>';
                    echo '<th class="tabla">' . $res["nombre_tiporecursos"] . '</th>';
                    echo '</tr>';
                    if ($res["estado_recursos"]=="disponible"){
                    echo '<th>' . '<a class="boton" href="">Reservar</a>' . '</th>';
                    }else{
                        echo '<th>' . '<a class="boton">Reservado</a>' . '</th>';
                    }
                }
        ?>
</table>
</body>
</html>