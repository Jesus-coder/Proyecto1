<?php
//Declaramos variables
$sala=$_REQUEST["sala"];
$objeto=$_REQUEST["objeto"];
$check='C';

//Filtramos segun las variables que nos mandó el usuario y le devolvemos fl, que indicara el tipo de filtro que ha hecho el usuario
if (isset($_REQUEST["sala"]) && isset($_REQUEST["objeto"]) ) {
   header('Location: principal.php?fl='.$check);
}else if(isset($_REQUEST["sala"])){
    header('Location: principal.php?fl='.$sala);
}else if(isset($_REQUEST["objeto"])){
    header('Location: principal.php?fl='.$objeto);
}






