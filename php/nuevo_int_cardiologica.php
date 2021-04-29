<?php

    require "conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
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

        <form id="form_e" action="nuevo_insert_int_cardiologica.php" method="POST" name="nuevo_cl_medica">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Intervención Cardiológica</h2><br>
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
                <label for="inputMotivo_consulta_car">Motivo de la consulta</label> 
                <textarea class="form-control" name="inputMotivo_consulta_car" rows="3" cols="50" placeholder="Motivo...."></textarea>
                
            </div>
            <div class="form-group col-md-6">
            <label for="inputApp_car">Antecedentes Personales Patológicos</label>
                <textarea class="form-control" name="inputApp_car" rows="3" cols="50" placeholder="APP..."></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajo_control_medico_car">¿Está bajo control médico?</label><br> 
                <input type="radio" name="inputBajo_control_medico_car" value="Si">  Si  <input type="radio" name="inputbajo_control_medico_car" value="No">  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputMedico_cabecera_car">Médico de cabecera</label>
                <textarea class="form-control" name="inputMedico_cabecera_car" rows="3" cols="50" placeholder="Médico de cabecera"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEstudios_complementarios">Estudios complementarios</label><br> 
                <input type="radio" name="inputEstudios_complementarios" value="Si">  Si  <input type="radio" name="inputEstudios_complementarios" value="No">  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignar_estudios_car">Consignar estudios complementarios</label>
                <textarea class="form-control" name="inputConsignar_estudios_car" rows="3" cols="50" placeholder="Consignar estudios complementarios..."></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputFecha_int_car">Fecha de intervención</label>
                <input type="date" class="form-control" name="inputFecha_int_car" value="2020-03-01">
            </div>
           

            
            <div class="form-group col-md-6">
                <label for="inputConducta_seguir">Conducta a seguir</label>
                <textarea class="form-control" name="inputConducta_seguir" rows="3" cols="50" placeholder="Conducta a seguir..."></textarea>
            </div>

            <?php
             echo "<input type='hidden' name='id_paciente' value='$id_paciente'>";
             echo "<input type='hidden' name='id_int_cl_medica' value='$id_int_cl_medica'>";
             //echo $id_int_cl_medica;
            ?>

        </div>
        <br>
        <input id="form" type="submit" class="btn btn-primary float-right my-2" value="Guardar" name="enviar_form">    
    </div>
</form>

<div class="container bg-light mt-0">
    <a href="listado_pacientes_car.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a>
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>