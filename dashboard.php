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
    //total pacientes sin obra social
    $consulta3 = "SELECT * FROM paciente WHERE obra_social = 'PARTICULAR'";
    $resultado3 = mysqli_query($conn, $consulta2);
    $total_particular = mysqli_num_rows($resultado3);
    //total pacientes estuvieron internados
    $consulta4 = "SELECT * FROM paciente WHERE estuvo_internado = 'Si'";
    $resultado4 = mysqli_query($conn, $consulta4);
    $total_estuvo_internado = mysqli_num_rows($resultado4);
    //total pacientes estuvieron internados
    $consulta5 = "SELECT * FROM paciente WHERE medicacion = 'Si'";
    $resultado5 = mysqli_query($conn, $consulta5);
    $total_medicados = mysqli_num_rows($resultado5);

    // fin consultas
    

?>

<?php include_once "./php/header.php"; ?>
    
<!-- Inicio contenido de las paginas -->
    <div class="container align-center">
    <br>
    <h1>Pacientes</h1>
    <div class="row">
    
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registrados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_pacientes; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Bajo seguimiento</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_bajo_seg; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Con movilidad</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_movilidad; ?></p>
                    </div>                 
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sin Obra Social</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_particular; ?></p>
                    </div>                 
                </div>
            </div>  
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Estuvieron internados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_estuvo_internado; ?></p>
                    </div>                 
                </div>
            </div> 
            <div class="col-md-3 col-sm-6 col-xs-12 mt-5 ml-5">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Medicados</h5>
                        <p class="card-text h2 text-center font-weight-normal"><?php echo $total_medicados; ?></p>
                    </div>                 
                </div>
            </div> 
        </div> 
    </div>
<!-- Fin contenido de las paginas-->     
<?php include_once "./php/footer.php"; ?>