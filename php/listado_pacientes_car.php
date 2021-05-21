<?php

    require "conexion.php";
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}
    //$id_int_cl_medica = $_GET['id_int_cl_medica'];
    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];


    
    $sql="SELECT paciente.id_paciente, paciente.apellido, paciente.nombre, paciente.dni, int_cl_medica.fecha_intervencion_cl_medica, int_cl_medica.id_int_cl_medica, int_cardiologica.estado_car, int_cardiologica.id_int_cardiologica
    FROM paciente 
    INNER JOIN int_cl_medica ON paciente.id_paciente = int_cl_medica.id_paciente
    INNER JOIN int_cardiologica ON int_cardiologica.id_int_cl_medica = int_cl_medica.id_int_cl_medica
    WHERE int_cl_medica.consignar_especialidad LIKE '%CAR%' AND int_cardiologica.estado_car='NA'";
    /*$sql="SELECT paciente.id_paciente, paciente.apellido, paciente.nombre, paciente.dni, int_cl_medica.fecha_intervencion_cl_medica, int_cl_medica.id_int_cl_medica, int_psicologica.estado, int_psicologica.id_int_psicologica
    FROM paciente 
    INNER JOIN int_cl_medica ON paciente.id_paciente = int_cl_medica.id_paciente
    INNER JOIN int_psicologica ON int_psicologica.id_int_cl_medica = int_cl_medica.id_int_cl_medica
    WHERE int_cl_medica.consignar_especialidad = 'PSICOLOGICA' AND int_psicologica.estado='NA'";*/ 
    //echo $sql;

    $resultado = mysqli_query($conn, $sql);

    //obtener id de la tabla int cl medica
    /*$query_cl ="SELECT MAX(id_int_cl_medica) AS id_cl_medica FROM int_cl_medica";
    $result_cl = mysqli_query($conn, $query_cl);
    if ($row = mysqli_fetch_row($result_cl)) {
    $id_int_cl_medica = trim($row[0]);
    //echo $id_int_cl_medica;
    }*/
    
?>
<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->
        <div class="container mt-5 bg-light">
        <h2 align='left'>Listado de pacientes | Cardiología</h2><br>
      
      <div class="col-lg-12">
      <div class="table-responsive">
        <table
          id="example"
          class="table table-striped table-bordered table-hover "
          style="width: 100%"
        >
          <thead>
            <tr>              
              <th>Fecha</th>
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
                <td><?php echo $row["fecha_intervencion_cl_medica"]; ?></td>
                
                <td><?php echo $row["dni"]; ?></td>
                <td><?php echo $row["apellido"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>

                <td>
                <a href="nuevo_int_cardiologica.php?id_paciente=<?php echo $row['id_paciente']?>&id_int_cl_medica=<?php echo $row["id_int_cl_medica"];?>" class="btn btn-info btn-sm" title="Agregar Int. Cardiológica"><i class="fas fa-couch"></i> </a>
                <!-- 
                  <a href="nuevo_int_cl_medica.php?id_paciente=<?php echo $row['id_paciente']?>&id_int_cl_medica=<?php echo $id_int_cl_medica;?>" class="btn btn-info btn-sm" title="Agregar Int. Cl. Médica"><i class="far fa-notes-medical"></i> </a>
                  <a href="editar_paciente.php?id_paciente_edit=<?php echo $row['id_paciente']?>" class="btn btn-secondary btn-sm" title="Editar paciente"><i class="fas fa-user-edit"></i> </a> 
                  <a href="eliminar_paciente.php?id_paciente_del=<?php echo $row['id_paciente']?>" class="btn btn-danger btn-sm" title="Eliminar paciente"><i class="fas fa-user-times"></i> </a> -->

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
        
        