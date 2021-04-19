<?php

    require "conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    $sql2="SELECT paciente.id_paciente, paciente.apellido, paciente.nombre, paciente.dni, int_cl_medica.fecha_intervencion_cl_medica, int_cl_medica.id_int_cl_medica, int_psicologica.estado, int_psicologica.id_int_psicologica
    FROM paciente 
    INNER JOIN int_cl_medica ON paciente.id_paciente = int_cl_medica.id_paciente
    INNER JOIN int_psicologica ON int_psicologica.id_int_cl_medica = int_cl_medica.id_int_cl_medica
    WHERE int_cl_medica.consignar_especialidad = 'PSICOLOGICA' AND int_psicologica.estado='NA'";
    $sql = "SELECT * FROM paciente WHERE estado = 'A'";
    $resultado = mysqli_query($conn, $sql);

    

    //obtener id de la tabla int cl medica
    $query_cl ="SELECT MAX(id_int_cl_medica) AS id_cl_medica FROM int_cl_medica";
    $result_cl = mysqli_query($conn, $query_cl);
    if ($row = mysqli_fetch_row($result_cl)) {
    $id_int_cl_medica = trim($row[0]);
    //echo $id_int_cl_medica;
    }
    
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
              
              <th>DNI</th>
              <th>Apellido</th>
              <th>Nombres</th>
              <th>Tel. Celular</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>Acciones</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           while($row = $resultado->fetch_assoc()){?>
              <tr> 
                
                <td><?php echo $row["dni"]; ?></td>
                <td><?php echo $row["apellido"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["tel_cel"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["direccion"]; ?></td>
                <td><a href="hc_reporte.php?id_paciente=<?php echo $row['id_paciente']?>" class="btn btn-info btn-sm" title="Ver Historia Clínica"><i class="fas fa-file-medical"></i> </a> 
                <a href="hc_reporte_pdf.php?id_paciente_edit=<?php echo $row['id_paciente']?>" class="btn btn-secondary btn-sm" title="Imprimir"><i class="fas fa-print"></i> </a> 
                <!--<a href="eliminar_paciente.php?id_paciente_del=<?php echo $row['id_paciente']?>" class="btn btn-danger btn-sm" title="Eliminar paciente"><i class="fas fa-user-times"></i> </a> -->
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