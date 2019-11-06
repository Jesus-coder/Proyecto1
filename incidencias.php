<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<!-- Barra de Navegacion -->
            <?php
            include "header.php";
            ?>
<br><br><br>

<form action="reservar.php" method="incidecia.proc.php" enctype="multipart/form-data">
<?php
//Conectamos a la base de datos
    require_once 'conexion.php';
    
//Creamos la consulta de los registros del usuario
    $sql = mysqli_query($connexion, "SELECT * FROM tbl_indicencias");
//Mostrar la tabla
    while ($res = mysqli_fetch_array($sql)) {
                    echo '<tr class="tabla">';
                    echo '<th class="tabla">' . $res["id_incidencias"] . '</th>';
                    echo '<th class="tabla">' . $res["inicio_incidencias"] . '</th>';
                    echo '<th class="tabla">' . $res["final_incidencias"] . '</th>';
                    echo '<th class="tabla">' . $res["informe_incidencias"] . '</th>';
                    echo '<th class="tabla">' . $res["id_recursos"] . '</th>';
                    echo '<th class="tabla">' . $res["id_usuarios"] . '</th>';
                    echo '<td><input type="checkbox" name="incidencia[]" value="<?php echo $fila[0]; ?>"></td>';
                    echo '</tr>';
    }
?>
</form>


