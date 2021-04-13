<?php
    //require "../php/conexion.php";
    //session_start();

    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
    

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historia Clinica TeleSalud</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon" href="./img/logo.ico" type="img/ico" />
    </head>
    <body> 
        <?php //    if($tipo_usuario == 1){ ?>
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="./index.php">Tablero de comandos</a>
                    <a class="dropdown-item" href="./php/nuevo_paciente.php">Nuevo paciente</a>
                    <a class="dropdown-item" href="./php/listado_pacientes.php">Listado de pacientes</a>
                    
                    <a class="dropdown-item" href="./historias_clinicas.php">Historias Clínicas</a>
                    <a class="dropdown-item" href="#">Reportes</a>
                </div>
        </div>
            <a class="navbar-brand" href="index.php">
                <img src="./img/logo.png" width="300" height="50" class="d-inline-block align-top" alt="">              
            </a>            
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo utf8_encode($nombre_apellido); ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="./logout.php">Cerrar sesión</a>
                    
                </div>
        </div>   
        </nav>

        
        