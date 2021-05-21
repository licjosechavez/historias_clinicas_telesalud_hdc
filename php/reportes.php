<?php

    require "conexion.php";
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];


    $sql = "SELECT * FROM paciente WHERE estado = 'A'";
    $resultado = mysqli_query($conn, $sql);

    //obtener id de la tabla int cl medica
    $query_cl ="SELECT MAX(id_int_cl_medica) AS id_cl_medica FROM int_cl_medica";
    $result_cl = mysqli_query($conn, $query_cl);
    if ($row = mysqli_fetch_row($result_cl)) {
    $id_int_cl_medica = trim($row[0]);
    $id_int_cl_medica;
    $id_int_cl_medica_sig = $id_int_cl_medica + 1;
    //echo $id_int_cl_medica_sig;
    }
    
?>
<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->
        <div class="container mt-5 bg-light">
        <h2 align='left'>Reportes</h2><br><br>
      
      <div class="col-lg-12">
        <ul>
        <li>
          Cantidad de pacientes atendidos por fecha 
        </li>
        </ul>
        <br><br><br><br><br><br><br><br><br><br><br>
          
       
         
      </div>
    </div>
  </div>         
</div>


        </div>

<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>
        
        