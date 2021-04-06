<?php
    require "./php/conexion.php";
    //total pacientes registrados
    $consulta = "SELECT * FROM paciente";
    $resultado = mysqli_query($conn, $consulta);
    $total_pacientes = mysqli_num_rows($resultado); 
    //total pacientes bajo seguimiento medico
    $consulta1 = "SELECT * FROM paciente WHERE bajo_seguimiento = 'Si'";
    $resultado1 = mysqli_query($conn, $consulta1);
    $total_bajo_seg = mysqli_num_rows($resultado1); 
    //total pacientes con movilidad
    $consulta2 = "SELECT * FROM paciente WHERE movilidad = 'Si'";
    $resultado2 = mysqli_query($conn, $consulta2);
    $total_movilidad = mysqli_num_rows($resultado2); 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historia Clinica TeleSalud</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon" href="img/logo.ico" type="img/ico" />
    </head>
    <body> 
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="./index.php">Tablero de comandos</a>
                    <a class="dropdown-item" href="./php/nuevo_paciente.php">Nuevo paciente</a>
                    <a class="dropdown-item" href="./php/listado_pacientes.php">Listado de pacientes</a>
                    <a class="dropdown-item" href="./agregar_intervencion.php">Agregar intervención</a>
                    <a class="dropdown-item" href="#">Reportes</a>
                </div>
        </div>
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" width="300" height="50" class="d-inline-block align-top" alt="">              
            </a>            
            <div></div>   
        </nav>

        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pacientes registrados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_pacientes; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pacientes bajo seguimiento</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_bajo_seg; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pacientes con movilidad</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_movilidad; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pacientes registrados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_pacientes; ?></p>
                    </div>                 
                </div>
            </div>  
        </div>

        
       
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="./js/bootstrap.min.js"></script>
        
    </body>
    <footer class="font-small mt-5" style="background-color: #002752;position: fixed; bottom: 0px; width: 100%; height: 50px">
        <div class="text-white text-center py-3">© 2020 - Área de Sistemas - HDC
            <a class="text-info" href="#"></a>
        </div>
    </footer>
</html>