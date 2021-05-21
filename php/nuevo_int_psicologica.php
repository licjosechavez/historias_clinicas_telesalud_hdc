<?php

require "conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    // cons
    if(isset($_GET['id_paciente'])) {
        if(isset($_GET['id_int_cl_medica'])){
          $id_int_cl_medica = $_GET['id_int_cl_medica'];
          //echo $id_int_cl_medica;
        }
          $id_paciente = $_GET['id_paciente'];
      
        //echo $id_paciente;
        $query = "SELECT * FROM paciente WHERE id_paciente = $id_paciente";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          
          $idni = $row["dni"];   
          $iapellido = $row["apellido"];
          $inombre = $row["nombre"];
          $idireccion = $row["direccion"];
          $iedad = $row["edad"];
          $itel_cel = $row["tel_cel"];
          
        
        }
      }
    // fin cons


    /*if(isset($_GET['id_paciente'])) {
        if(isset($_GET['id_int_cl_medica'])){
          $id_int_cl_medica = $_GET['id_int_cl_medica'];
          //echo $id_int_cl_medica;
        }*/
          $id_paciente = $_GET['id_paciente'];

          $sql2 = "SELECT paciente.id_paciente, paciente.apellido, paciente.nombre, paciente.dni, paciente.edad, paciente.direccion, int_cl_medica.fecha_intervencion_cl_medica 
            FROM paciente 
            INNER JOIN int_cl_medica ON paciente.id_paciente = int_cl_medica.id_paciente 
    
    WHERE int_cl_medica.consignar_especialidad = 'PSICOLOGICA'";

    $resultado2 = mysqli_query($conn, $sql2);

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

        <form id="form_e" action="nuevo_insert_int_psicologica.php" method="POST" name="nuevo_cl_medica">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Intervención Psicológica</h2><br>
        <h2 align='left'>Datos Personales</h2><br>
        <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="inputDNI">DNI</label>
                <input type="text" class="form-control" name="inputDNI" placeholder="Ingrese su nro de documento" value="<?php echo $idni;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputApellido">Apellido/s</label>
                <input type="text" class="form-control" name="inputApellido" placeholder="Apellido" value="<?php echo $iapellido;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombre/s</label>
                <input type="text" class="form-control" name="inputNombre" placeholder="Nombre Completo" value="<?php echo $inombre;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEdad">Edad</label>
                <input type="text" class="form-control" name="inputEdad" placeholder="Edad" value="<?php echo $iedad;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Dirección</label>
                <input type="text" class="form-control" name="inputDireccion" placeholder="Ingrese su dirección" value="<?php echo $idireccion;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelCel">Tel. Celular</label>
                <input type="text" class="form-control" name="inputTelCel" placeholder="Ingrese su tel. cel." value="<?php echo $itel_cel;?>" disabled>
            </div>
            <hr>
        </div>
        <hr><br>
            <h2 align='left'>Datos de la Intervención</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputSintomatologia">¿Presenta sintomatología?</label><br> 
                <input type="radio" name="inputSintomatologia" value="Si">  Si  <input type="radio" name="inputSintomatologia" value="No">  No
            </div>
            <div class="form-group col-md-6">
            <label for="inputMedicacion">Medicación</label>
                <textarea class="form-control" name="inputMedicacion" rows="3" cols="50" placeholder="Medicación"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputRequiereInterconsulta">¿Requiere interconsulta?</label><br> 
                <input type="radio" name="inputRequiereInterconsulta" value="Si">  Si  <input type="radio" name="inputRequiereInterconsulta" value="No">  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarEspecialidad">Consignar Especialidad</label>
                <textarea class="form-control" name="inputConsignarEspecialidad" rows="3" cols="50" placeholder="Consignar Especialidad"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputFechaIntervencion">Fecha de intervención</label>
                <input type="date" class="form-control" name="inputFechaIntervencion" value="2020-03-01">
            </div>
            <div class="form-group col-md-6">
            <label for="inputModalidad">Modalidad de la intervención</label><br> 
                <label><input type="checkbox" name="modalidad[]" value="LLAMADO TELEFONICO"> LLAMADO TELEFONICO</label>
                <label><input type="checkbox" name="modalidad[]" value="VIDEOLLAMADA"> VIDEOLLAMADA</label>
                <label><input type="checkbox" name="modalidad[]" value="PRESENCIAL"> PRESENCIAL</label>
                <label><input type="checkbox" id="todos" value="Todos"> Todos</label>
                
                <script>
                var checkbox = document.getElementById('todos');
                checkbox.addEventListener('change', function() {
                    if(this.checked) {
                        seleccionar_todo();
                    }
                    else{
                        deseleccionar_todo()

                    }
                });
                function seleccionar_todo(){
                        for (i=0;i<document.nuevo_cl_medica.elements.length;i++)
                            if(document.nuevo_cl_medica.elements[i].type == "checkbox")
                                document.nuevo_cl_medica.elements[i].checked=1
                    }
                function deseleccionar_todo(){
                        for (i=0;i<document.nuevo_cl_medica.elements.length;i++)
                            if(document.nuevo_cl_medica.elements[i].type == "checkbox")
                                document.nuevo_cl_medica.elements[i].checked=0
                    }
                </script>
            </div>

            <div class="form-group col-md-6">
                <label for="inputRequiereArticulacion">¿Requiere articulación con otras instituciones de asistencia en Salud Mental?</label><br> 
                <input type="radio" name="inputRequiereArticulacion" value="Si">  Si  <input type="radio" name="inputRequiereArticulacion" value="No">  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarInstitucion">Consignar Institución</label>
                <textarea class="form-control" name="inputConsignarInstitucion" rows="3" cols="50" placeholder="Consignar Institución"></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="inputGrupoFamiliar">Grupo familiar</label>
                <textarea class="form-control" name="inputGrupoFamiliar" rows="8" cols="50" placeholder="Grupo familiar"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="inputBreveReseniaIntervencion">Breve reseña de la intervención</label>
                <textarea class="form-control" name="inputBreveReseniaIntervencion" rows="8" cols="50" placeholder="Breve reseña de la intervención"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="inputSeguimientoPsicologia">Seguimiento / Acompañamiento</label>
                <textarea class="form-control" name="inputSeguimientoPsicologia" rows="8" cols="50" placeholder="Seguimiento"></textarea>
            </div>
            <?php
             echo "<input type='hidden' name='id_paciente' value='$id_paciente'>";
             echo "<input type='hidden' name='id_int_cl_medica' value='$id_int_cl_medica'>";
             //echo $id_int_cl_medica;
            ?>

        </div>
        <br>
        <input id="form" type="submit" class="btn btn-primary float-right my-2" value="Guardar intervención" name="enviar_form">    
    </div>
</form>

<div class="container bg-light mt-0">
    <a href="listado_pacientes_ps.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a>
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>