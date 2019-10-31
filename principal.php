<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<!-- Barra de Navegacion -->
<center>
<nav>
        <ul class="menu">  
            <li><a href="">Reservas</a></li>
            <li><a href="">Prueba1</a></li>   
            <li><a href="">Prueba2</a></li>
            <a href=""><li style="position: absolute; right: 110px; top: 8px"><img src="imagenes/salir.jpg"></li></a>  
        </ul>   
</nav>
</center>
<br><br><br>
<!-- Filtros -->
<form action="">
<input type="checkbox" name="prueba1" value="prueba1"> prueba1
<input type="checkbox" name="prueba2" value="prueba2"> prueba2
<input type="checkbox" name="prueba3" value="prueba3" checked> prueba3
<input type="submit" value="Filtrar">
</form><br>
<table class="tabla">
	<!-- Primera Fila -->
  <tr class="tabla">
    <th class="tabla">Sala de informatica con ordenadores</th>
    <th class="tabla">Sala2</th> 
    <th class="tabla">Sala3</th>
  </tr>
  	<!-- Segunda Fila -->
  <tr class="tabla">
    <td class="tabla">Reservado</td>
    <td class="tabla">Libre</td>
    <td class="tabla">Averiado</td>
  </tr>
</table>
<table>
	<tr>
	<th><a class="boton" href="">Reservar</a></th>
    <th><a class="boton" href="">Reservar</a></th>
    <th><a class="boton" href="">Reservar</a></th>
    </tr>
</table>
</body>
</html>