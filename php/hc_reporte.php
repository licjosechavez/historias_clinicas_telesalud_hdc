<?php

    require "conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    
    $id_paciente = $_GET['id_paciente'];

    $sql="SELECT p.*, icl.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    WHERE p.id_paciente='$id_paciente'
    ORDER BY icl.fecha_intervencion_cl_medica ASC";
    $resultado = mysqli_query($conn, $sql);
    
?>
<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->
        <div>
          <div class=" container m-0 row">
              
          </div>
        </div>
        <div class="container mt-5 bg-light">

        <h2 align='left'>Historias Clínicas</h2>
        <div>

        <a href="../reportes/historia_clinica_completa.php?id_paciente=<?php echo $id_paciente?>" class="btn btn-warning" title="Imprimir HC completa" target="blank">Imprimir HC completa <i class="fas fa-print"></i> </a>
        </div>
        <br>
        <br>
        <h3 align='left'>Listado de atenciones/intervenciones</h3>
        <br>
        <br>
            
      
      <div class="col-lg-12">
      <div class="table-responsive">
        <table
          id="example"
          class="table table-striped table-bordered table-hover "
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>Id</th>
              <th>Fecha Int. Cl. Médica</th>
              <th>DNI</th>
              <th>Apellido</th>
              <th>Nombres</th>
              <th>Especialidad consignada</th>
              
              <th>Acciones</th>
              
            </tr>
          </thead>
          <tbody>
          <?php
           while($row = $resultado->fetch_assoc()){?>
              <tr> 
                <td><?php echo $row["id_int_cl_medica"]; ?></td>
                <td><?php echo $row["fecha_intervencion_cl_medica"]; ?></td>
                <td><?php echo $row["dni"]; ?></td>
                <td><?php echo $row["apellido"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["consignar_especialidad"]; ?></td>
                
                <td><a href="hc_reporte_individual.php?id_paciente=<?php echo $row['id_paciente']?>&id_int_cl_medica=<?php echo $row['id_int_cl_medica']?>&fecha_int_cl=<?php echo $row['fecha_intervencion_cl_medica']?>" class="btn btn-info btn-sm" title="Ver Historia Clínica"><i class="fas fa-search"></i> </a>
                 
               
                <a href="../reportes/int_individual_pdf.php?id_paciente=<?php echo $row['id_paciente']?>&id_int_cl_medica=<?php echo $row['id_int_cl_medica']?>&fecha_int_cl=<?php echo $row['fecha_intervencion_cl_medica']?>" class="btn btn-warning btn-sm" title="Imprimir intervención" target="blank"><i class="fas fa-print"></i> </a>
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