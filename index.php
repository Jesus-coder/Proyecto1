<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <script type="text/javascript" src="js/codigo.js">
    </script>
    <body style="background-color: #FFDE90">
        <center>
        <br><br>
        <form id='login' action='login.proc.php' method='post' accept-charset='UTF-8' onsubmit = "return ValidacionLogin()">
                <table style="border: solid 2px;border-radius: 12px; background-color: #FFD472; width: 500px;  ">
                    <tr>
                        <th style="background-color: #FFC94D; border: 1px solid; border-radius: 12px;"><legend style="font-size: 40px;">Login</legend></th>
                        <th><input type='hidden' name='submitted' id='submitted' value='1'/></th>
                    </tr>
                    <tr>
                        <th style="font-size: 30px;"><label for='username' >Nombre de Usuario</label></th>
                        </tr>
                        <tr>
                        <th><input style="width: 290px; height: 30px; font-size: 25px;" type='text' placeholder="Introduce el usuario" pattern="[a-z]{1,15}" name='username' id='username'  value="<?php 
                                if (isset($_GET['us'])) {
                                    $user=$_GET['us'];
                                    echo "$user";
                                }
                        ?>" maxlength="50"/></th>
                    </tr>
                    <tr>
                        <th style="font-size: 30px;"><label for='password' >Contraseña</label></th>
                    </tr>
                    <tr>
                        <th><input style="width: 290px; height: 30px; font-size: 25px;" type='password' placeholder="Introduce contraseña" name='password' id='password' maxlength="50"/></th>
                    </tr>
                    
                    <tr>
                        <th><button style="height: 50px; font-size: 35px; text-decoration: none;width: 180px;padding: 5px;color: white;background-color: #FFC94D;border-radius: 6px;border: 1px solid black; margin-top: 190px; margin-bottom: 30px;" class="button" type="submit">Entrar</button></th></th>
                    </tr>
                </table>
                <p style="font-size: 25px;" id="alerta" class="alerta"></p>
        </form>
        </center>
    </body>
</html>
