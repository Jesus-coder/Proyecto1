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
    <body>
        <form id='login' action='' method='post' accept-charset='UTF-8'>
                <table>
                    <tr>
                        <th><legend>Login</legend></th>
                        <th><input type='hidden' name='submitted' id='submitted' value='1'/></th>
                    </tr>
                    <tr>
                        <th><label for='username' >Nombre de Usuario:</label></th>
                        <th><input type='text' placeholder="Introduce el usuario" name='username' id='username'  maxlength="50" required/></th>
                    </tr>
                    <tr>
                        <th><label for='password' >Contraseña:</label></th>
                        <th><input type='password' placeholder="Introduce contraseña" name='password' id='password' maxlength="50" required/></th>
                    </tr>
                    <tr>
                        <th><button class="button" type="submit">Entrar</button></th></th>
                    </tr>
                </table>
        </form>
    </body>
</html>
