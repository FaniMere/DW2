<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="static/CSS/estilo.css" type="text/css"/>

    </head>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	
    <body>
    <?php
        if (session()->get('loggedin')) {  
        }
        else {
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Inicia sesión para acceder a la pagina.</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>
            ";
            exit;
        }
        $now = time();           
        if ($now > session()->get('expire')) {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Tu sesión ha terminado!</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>";
            exit;
        }
        if (session()->get('puesto')!="ADMINISTRADOR") {
            session_destroy();
            echo "<div class='alert alert-danger mt-4' role='alert'>
            <h4>Privilegios Insuficientes!</h4>
            <p><a href='login'>Iniciar sesión!</a></p></div>";
            exit;
        }
    ?>
        <div class="main">
            <div class="head">
                <a href="{{route('loginn')}}">
                    <i class="icono izq fa fa-sign-out-alt" title="salir"></i>
                </a>
            </div>
                <h3 class="encabezado" align="center" style="color:#005892;">Inicio</h3>
                <h3 class="" style="color:#445255; margin-left: 38px;"> Bienvenido! {{session()->get('name')}} </h3>
                
            <hr style="margin-left: 40px; margin-right: 40px;">
            <br>
            <div class="row pantalla">
                <div class="col-lg-3 opc" >
                    <a href="{{route('listaem')}}">
                        <img src="static/img/empl.png" style="width:90%;">
                        <h3 class=>Lista de Empleados</h3>
                    </a>
                </div>
                <br>
                <div class="col-lg-3 opc" >
                    <a href="{{route('repemps')}}">
                        <img src="static/img/calendario.png" style="width:90%;">
                        <h3 class=>Reportes de empleados</h3>
                    </a>
                </div>
                <br>
                <div class="col-lg-3 opc" >
                    <a href="{{route('regem')}}">
                        <img src="static/img/reg.png" style="width:90%;">
                        <h3 class=>Registro de empleados</h3>
                    </a>
                </div>
            </div>
            <br><hr><br>
            <div class="row pantalla">
                <div class="col-lg-3 opc" >
                    <a href="{{route('infocont')}}">
                        <img src="static/img/datos.png" style="width:90%;">
                        <h3 class=>Información de contacto</h3>
                    </a>
                </div>
                <div class="col-lg-3 opc" >
                    <a href="{{route('camcon')}}">
                        <img src="static/img/contr.png" style="width:90%;">
                        <h3 class=>Cambiar contraseña</h3>
                    </a>
                </div>
            </div>
        </div>
		<br>
    </body>