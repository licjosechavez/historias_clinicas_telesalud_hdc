<?php
    require "conexion.php";
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
        <link href="/ts_hclinicas/css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon" href="/ts_hclinicas/img/logo.ico" type="img/ico" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!--datables CSS básico-->
        <link
        rel="stylesheet"
        type="text/css"
        href="/ts_hclinicas/vendor/datatables/datatables.min.css"
        />
        <!--datables estilo bootstrap 4 CSS-->
        <link
        rel="stylesheet"
        type="text/css"
        href="/ts_hclinicas/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"
        />
    </head>
    <body> 
        
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="/ts_hclinicas/dashboard.php">Tablero de comandos</a>
                    <?php if($tipo_usuario == 1){ ?>
                    <a class="dropdown-item" href="/ts_hclinicas/php/listado_pacientes.php">Listado de pacientes</a>
                    <a class="dropdown-item" href="/ts_hclinicas/php/nuevo_paciente.php">Nuevo paciente</a>
                    <?php } ?>
                    
                    <?php if($tipo_usuario == 2 ){ ?>
                    <a class="dropdown-item" href="/ts_hclinicas/php/listado_pacientes_ps.php">Listado de pacientes | Psicología</a>
                    <?php } ?>
                    <a class="dropdown-item" href="/ts_hclinicas/php/historias_clinicas.php">Historias Clínicas</a>
                    
                    <a class="dropdown-item" href="/ts_hclinicas/php/reportes.php">Reportes</a>
                    
                    
                    
                    
                    
                </div>
        </div>
            <a class="navbar-brand" href="index.php">
                <img src="/ts_hclinicas/img/logo.png" width="300" height="50" class="d-inline-block align-top" alt="">              
            </a>            
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo utf8_encode($nombre_apellido); ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="/ts_hclinicas/logout.php">Cerrar sesión</a>
                    
                </div>
        </div>   
        </nav>

        
        