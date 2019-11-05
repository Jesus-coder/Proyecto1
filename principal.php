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
                $orderby = '';
                break;
            case 'S' :
               $orderby = "where tbl_tiporecursos.nombre_tiporecursos = 'Sala'";
                break;
            case 'O' :
               $orderby = "where tbl_tiporecursos.nombre_tiporecursos = 'Objeto'";
                break;
        }
        ?>
<div>
<form action="reservar.php" method="post" enctype="multipart/form-data">
<!---Tabla de recursos que ven todos los usuarios --->
<table border="1">
<tr>
<th align='center'colspan="4">Reservas</th>
</tr>
<?php
    $usuarios = $_SESSION['nombre'];
   //se incluye la pagina conexion.php para poder recoger la conexión a la BD
  include("conexion.php");
    $id_usuario= "SELECT id_usuarios FROM tbl_usuarios WHERE nombre_usuarios = '".$usuarios."'";
    $sqlcomment = "SELECT column_comment FROM information_schema.columns WHERE table_name = 'tbl_recursos'";
    $sqlrecursos = "SELECT *, tbl_tiporecursos.id_tiporecursos
                    FROM tbl_recursos 
                    LEFT JOIN tbl_tiporecursos 
                    ON tbl_recursos.id_tiporecursos=tbl_tiporecursos.id_tiporecursos
                    LEFT JOIN tbl_reservas 
                    ON tbl_reservas.id_recursos=tbl_recursos.id_recursos $orderby" ;
    $comments = mysqli_query($connexion, $sqlcomment);
    $userid = mysqli_fetch_assoc(mysqli_query($connexion, $id_usuario));
    while(($comment = mysqli_fetch_array($comments, MYSQLI_ASSOC)))
          { 
      
            if($comment['column_comment'])
               
            {
            
                foreach ($comment as $head)
                
                {
                           echo "<th align='center'>". $head . "</th>";
            
                }
             // $i++;
            }
          }
          echo "</tr>";
    //-- matriu de taules relacionades ---
    $recursos = mysqli_query($connexion, $sqlrecursos);
    while(($fila = mysqli_fetch_array($recursos)))
      { 
      if($fila['id_usuarios'] !== $userid['id_usuarios'] and $fila['estado_recursos'] == 'ocupado' or  $fila['estado_recursos'] == 'disponible'){
?>
        <tr>  
        <td><?php echo $fila[1]; ?></td>
        <td><?php echo $fila[2]; ?></td>
        <td><?php echo $fila[5]; ?></td>
        <?php
        if($fila['estado_recursos'] == 'ocupado' or $fila['estado_recursos'] == 'incidencia'){
          ?>
          <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>" disabled></td>
          </tr>
        <?php
        } else {
        ?>
        <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>"></td>
        </tr>
     
<?php
        }
        
      }
        
    }
  
?>

</table>
<input type="submit" value="reservar" name="save"></td> 
</form>
<div style="position: relative; left: 750px; bottom: 400px">
<table border="1" >
<tr>
<th align='center' colspan="5">Mis Reservas</th>
</tr>
<form action="reservar.php" method="post" enctype="multipart/form-data">
<?php
$sqlcomment = "SELECT column_comment FROM information_schema.columns WHERE table_name = 'tbl_recursos' or table_name = 'tbl_reservas' and COLUMN_NAME = 'inicio_reservas'";
$comments = mysqli_query($connexion, $sqlcomment);
    while(($comment = mysqli_fetch_array($comments, MYSQLI_ASSOC)))
          { 
      
            if($comment['column_comment'])
               
            {
            
                foreach ($comment as $head)
                
                {
                           echo "<th align='center'>". $head . "</th>";
            
                }
             // $i++;
            }
          }
          echo "</tr>";
    //-- matriu de taules relacionades ---
    $recursos = mysqli_query($connexion, $sqlrecursos);
    while(($fila = mysqli_fetch_array($recursos)))
          { 
          if($fila['estado_recursos'] == 'ocupado' and $fila['id_usuarios'] == $userid['id_usuarios'] and $fila['final_reservas'] == NULL ){
?>

            <tr>  
            <td><?php echo $fila[1]; ?></td>
            <td><?php echo $fila[2]; ?></td>
            <td><?php echo $fila[5]; ?></td>
            <td><?php echo $fila[7]; ?></td>

            <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>"></td>
            </tr> 
<?php
          }

  }
?>
</table>
<input type="submit" value="Liberar" name="save2"></td> 
</form>
</div>

</body>
</html>