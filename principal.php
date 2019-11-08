<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/codigo.js"></script>
</head>
<body>
	<!-- Barra de Navegacion -->
    <?php
    include "header.php";
    ?>

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
    <input class="boton" type="submit" value="Filtrar">
</form><br>
<!--------------------------------Tabla de reservas general --------------------------------------->
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
        <table id="reservar" border="1">
            <tr>
                <th align='center'colspan="4">Reservas</th>
            </tr>
            <?php
            $usuarios = $_SESSION['nombre'];
            //se incluye la pagina conexion.php para poder recoger la conexión a la BD
            include("conexion.php");
            //consulta para obtener el id del usuario actual
            $id_usuario= "SELECT id_usuarios 
                          FROM tbl_usuarios 
                          WHERE nombre_usuarios = '".$usuarios."'";
            //consulta para extraer la columna comentario de la tabla, para darle nombre a las columnas de la tabla tbl_recurso
            $sqlcomment = "SELECT column_comment 
                            FROM information_schema.columns 
                            WHERE table_name = 'tbl_recursos'";
                //consulta para mostrar la tabla recursos con su tipo
            $sqlrecursos = "SELECT *, tbl_tiporecursos.id_tiporecursos
                            FROM tbl_recursos 
                            LEFT JOIN tbl_tiporecursos 
                            ON tbl_recursos.id_tiporecursos=tbl_tiporecursos.id_tiporecursos
                            $orderby" ;
            //consulta que muestra la tabla de recursos, su tipo, y las reservas para generar a posteriori la tabla mis reservas
            $sqlrecursos2 = "SELECT *, tbl_tiporecursos.id_tiporecursos
                            FROM tbl_recursos 
                            LEFT JOIN tbl_tiporecursos 
                            ON tbl_recursos.id_tiporecursos=tbl_tiporecursos.id_tiporecursos
                            LEFT JOIN tbl_reservas 
                            ON tbl_reservas.id_recursos=tbl_recursos.id_recursos";
            $comments = mysqli_query($connexion, $sqlcomment);
            $userid = mysqli_fetch_assoc(mysqli_query($connexion, $id_usuario));
            //Bucle para recorrer la columna comentario de la tbl_recursos
            while(($comment = mysqli_fetch_array($comments, MYSQLI_ASSOC)))
            { 
                  
                if($comment['column_comment'])
                           
                {
                        
                    foreach ($comment as $head)
                    {
                    echo "<th align='center'>". $head . "</th>";                        
                    }
                }
            }
            echo "<th id='todo'><input type='checkbox' onchange='SelectAll(this)' name='recurso[]'><label>Todo</label></th>";
            echo "</tr>";
            //Ejecución de la consulta para mostrar tabla recursos
            $recursos = mysqli_query($connexion, $sqlrecursos);
            //Bucle para recorrer la tabla recursos y si el estado es ocupado, desabilita el checkbox
            while(($fila = mysqli_fetch_array($recursos)))
            { 
                if($fila['estado_recursos'] == 'disponible'){
                    ?>
                    <tr>  
                        <td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila[2]; ?></td>
                        <td><?php echo $fila[5]; ?></td>
                        <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>"></td>
                    </tr>
                        <?php
                }else{
                          ?>
                    <tr>
                        <td><?php echo $fila[1]; ?></td>
                        <td><?php echo $fila[2]; ?></td>
                        <td><?php echo $fila[5]; ?></td>
                        <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>" disabled></td>
                    </tr>
                        <?php 
                } 
            }     
                        ?>        


    <!--------------------------------Tabla de reservas del propio usuario --------------------------------------->
        </table>
        <br>
        <input style="margin-left: 400px;" class="boton" type="submit" value="reservar" name="save"></td> 
    </form>
</div>
<div style="position: absolute; left: 640px; top: 56px">
    <form action="reservar.php" method="post" enctype="multipart/form-data">
        <table border="1" id="misreservas">  
            <tr>
                <th align='center' colspan="5">Mis Reservas</th>
            </tr>
            <?php
            //consulta para extraer la columna comentario de la tabla, para darle nombre a las columnas de la tabla tbl_recurso y tbl_reservas
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
                    }
                }
                echo "</tr>";
                //Ejecución consulta de la tabla de mis reservas
                $recursos2 = mysqli_query($connexion, $sqlrecursos2);
                while(($fila = mysqli_fetch_array($recursos2)))
                { 
                    if($fila['estado_recursos'] == 'ocupado' and $fila['id_usuarios'] == $userid['id_usuarios'] and $fila['final_reservas'] == NULL )
                    {
                        ?>

                        <tr>  
                            <td><?php echo $fila[1]; ?></td>
                            <td><?php echo $fila[2]; ?></td>
                            <td><?php echo $fila[5]; ?></td>
                            <td><?php echo $fila[7]; ?></td>

                            <td><input type="checkbox" name="recurso[]" value="<?php echo $fila[0]; ?>"></td>
                            
                            <?php $idrecurso = $fila[0];
                             $nomrecurso=$fila[1];
                             $tiporecurso = $fila[5];?>

                            <td><a href="#myModal" id='enlace' data-id="<?php echo $fila[0];?>" onclick= 'executeJS(<?php echo$idrecurso;?>,<?php echo'"'.$nomrecurso.'"';?>,<?php echo'"'.$tiporecurso.'"';?>)'><img border="0" title="Abrir incidencia" alt="exclamación" src="imagenes/exclamacion.png" width="20" height="20"></a></td>
                        </tr> 
                        <?php
                    }

                }
            ?>
        </table>
        <br>
        <input style="margin-left: 540px;" class="boton" type="submit" value="Liberar" name="save2"></td> 
    </form>
    <div id="myModal" class="modalmask">
            <div class="modalbox movedown" id="resultadoContent">

                <a href="principal.php" title="Close" class="close">X</a>
                <form action="incidencias.proc.php" method="post" enctype="multipart/form-data">
                    <legend>Incidencia</legend>
                    <p id='mensaje_incidencia'></p>
                    <input type='hidden' name='idrecurso' id="info" value=""/>
                    <input type='hidden' name='nombrerecurso' id="nrecurso" disabled/>
                    <textarea type="text" name='desc' placeholder="Descripción de incidencia" style="height: 90%;width:90%;position: relative;"></textarea><br>
                    <input type="submit" value="Enviar" name="incidencia"></td>                
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/codigo.js"></script>
 </body>
</html>
