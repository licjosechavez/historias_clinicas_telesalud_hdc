<?php

    require "conexion.php";
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
    
    

    
    $sql = "SELECT * FROM paciente WHERE estado = 'A'"; 

    /*$sql ="SELECT p.*, icl.* FROM paciente p INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    WHERE p.estado = 'A'";*/

    /*$sql ="SELECT p.id_paciente, p.dni, p.apellido, p.nombre, icl.id_int_cl_medica FROM paciente p INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente WHERE p.estado = 'A'";*/ 

    /*$sql ="SELECT p.id_paciente, p.dni, p.apellido, p.nombre, icl.id_int_cl_medica FROM paciente p INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente WHERE p.estado = 'A'";*/

    

    $resultado = mysqli_query($conn, $sql);


?>
<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->
        <div class="container mt-5 bg-light">
        <h2 align='left'>Historias Clínicas</h2><br>
      
      <div class="col-lg-12">
      <div class="table-responsive">
        <table
          id="example"
          class="table table-striped table-bordered table-hover "
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>ID Paciente</th>
              <th>DNI</th>
              <th>Apellido</th>
              <th>Nombres</th>
              
              <th>Acciones</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           while($row = $resultado->fetch_assoc()){?>
              <tr> 
                
                <td><?php echo $row["id_paciente"]; ?></td>
                
                <td><?php echo $row["dni"]; ?></td>
                <td><?php echo $row["apellido"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                
                <td><a href="hc_reporte.php?id_paciente=<?php echo $row['id_paciente']?>" class="btn btn-info btn-sm" title="Ver intervención/es"><i class="fas fa-search"></i> </a> 
                <a href="../reportes/hc_completa.php?id_paciente=<?php echo $row['id_paciente']?>" class="btn btn-warning" title="Imprimir HC completa" target="blank">Imprimir <i class="fas fa-print"></i> </a>
                
                </td>
          
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>         
</div>


        </div>

<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>