<?php
    require "./php/conexion.php";
    
    session_start();

    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    //consultas para traer datos
    //echo $nombre_apellido;
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

    // fin consultas
    

?>

<?php include_once "./vistas/header.php"; ?>
    
<!-- Inicio contenido de las paginas -->
    <<div class="container align-center">
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
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Pacientes registrados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_pacientes; ?></p>
                    </div>                 
                </div>
            </div>  
        </div> 
    </div>
    

<!-- Fin contenido de las paginas-->

        
<?php include_once "./vistas/footer.php"; ?>
</html>