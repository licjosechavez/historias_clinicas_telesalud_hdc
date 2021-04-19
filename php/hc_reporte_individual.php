<?php

    require "conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    if(isset($_GET['id_paciente'])) {
        $id_paciente = $_GET['id_paciente'];
        $id_int_cl_medica = $_GET['id_int_cl_medica'];;
        //echo $id_paciente;
        /*$query = "SELECT * FROM paciente WHERE id_paciente = $id_paciente";*/
        $sql="SELECT p.*, icl.*, ips.*
        FROM paciente p
        INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
        INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica
        WHERE p.id_paciente='$id_paciente' AND icl.id_int_cl_medica='$id_int_cl_medica'";
        //$resultado = mysqli_query($conn, $sql);
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          
          //datos personales y relevamiento
          $idni = $row["dni"];
          
          $iapellido = $row["apellido"];
          $inombre = $row["nombre"];
          //echo $inombre;
          $itel_cel = $row["tel_cel"];
          $iemail = $row["email"];
          $idireccion = $row["direccion"];
          $iedad = $row["edad"];
          $iobra_social = $row["obra_social"];
          $iocupacion = $row["ocupacion"];  
          $idisp_horaria = $row["disp_horaria"];
          $ifecha_alta = $row["fecha_alta"];
          $iestuvo_internado = $row["estuvo_internado"];
      
          $ibajo_seguimiento = $row["bajo_seguimiento"];
          $ibajo_seguimiento_profesional = $row["bajo_seguimiento_profesional"];
          $isintomatologia = $row["sintomatologia"];
          $iconsignar_sintomatologia = $row["consignar_sintomatologia"];
          $ibajo_control = $row["bajo_control"];
          $ibajo_control_profesional = $row["bajo_control_profesional"];
          $imedicacion = $row["medicacion"];
          $iconsignar_medicacion = $row["consignar_medicacion"];
          $ifamiliar_covid = $row["familiar_covid"];
          $imovilidad = $row["movilidad"];

          // datos de int cl medica
        $iestado_clinico_actual = $row["estado_clinico_actual"];
        $imedicacion_cl_medica = $row["medicacion_cl_medica"];
        $iestudios_realizados = $row["estudios_realizados"];
        $iconsulta_medica_breve = $row["consulta_medica_breve"];
        $irequiere_interconsulta = $row["requiere_interconsulta"];

        $iconsignar_especialidad="";
        if (isset($_POST["especialidad"])){
          $iconsignar_especialidad = implode(',', $_POST["especialidad"] );
        }
        
        $irequiere_laboratorio = $row["requiere_laboratorio"];
        $iconsignar_laboratorio = $row["consignar_laboratorio"];
        $irequiere_consulta_posterior = $row["requiere_consulta_posterior"];  
        $iseguimiento = $row["seguimiento"];
        $ifecha_int_cl_medica = $row["fecha_intervencion_cl_medica"];
        $id_paciente = $row["id_paciente"];
        $id_int_cl_medica = $row['id_int_cl_medica'];
        
        }
      }


    //$sql = "SELECT * FROM paciente WHERE estado = 'A'";
    
    //$id_paciente = $_GET['id_paciente'];
    //echo $id_paciente;
    /*$sql="SELECT p.*, icl.*, ips.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica
    WHERE p.id_paciente='$id_paciente'";
    $resultado = mysqli_query($conn, $sql);*/

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
<form id="form_e" action="#" method="POST">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Datos Personales</h2><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDNI">DNI</label>
                <input type="text" class="form-control" name="inputDNI" value="<?php echo $idni; ?>"  disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input type="text" class="form-control" name="inputApellido" value="<?php echo $iapellido;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombres</label>
                <input type="text" class="form-control" name="inputNombre" value="<?php echo $inombre;?>" disabled  >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEdad">Edad</label>
                <input type="text" class="form-control" name="inputEdad" value="<?php echo $iedad;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                    <label for="inputObraSocial">Obra Social</label>
                    <select class="form-control form-control" name="inputObraSocial" disabled>
             
                      <option value="<?php echo $iobra_social;?>" selected><?php echo $iobra_social;?></option>
                      <option value="PARTICULAR">PARTICULAR</option>
                      <option value="APOS">APOS</option>
                      <option value="OSUNLAR">OSUNLAR</option>
                      <option value="OSPIDA">OSPIDA</option>
                      <option value="OSECAC">OSECAC</option>
                      <option value="OSPIV">OSPIV</option>
                      <option value="OSDA">OSDA</option>
                      <option value="OSDE BINARIO">OSDE BINARIO</option>
                      <option value="OSPRERA">OSPRERA</option>
                      <option value="APSA">APSA</option>
                      <option value="TAC">TAC</option> 
                      <option value="OSBA">OSBA</option>
                      <option value="OMIT">OMIT</option>
                      <option value="PAMI">PAMI</option>
                      <option value="IPAUSS">IPAUSS</option>
                      <option value="DASUTEN">DASUTEN</option>
                      <option value="IOSE">IOSE</option> 
                      <option value="OSPRA">OSPRA</option>
                      <option value="HOSPITAL DR. ENRIQUE VERA BARROS">HOSPITAL DR. ENRIQUE VERA BARROS</option>
                      <option value="RED DE SEGUROS MEDICOS">RED DE SEGUROS MEDICOS</option>
                      <option value="HOSPITAL DE LA MADRE Y EL NIÑO">HOSPITAL DE LA MADRE Y EL NIÑO</option>
                      <option value="S.R.T.">S.R.T.</option>
                      <option value="FUNDACION">FUNDACION</option> 
                      
                      <option value="OBRA SOCIAL SIN CONVENIO">OBRA SOCIAL SIN CONVENIO</option>
                      <option value="OBRA SOCIAL SIN PRESTADOR">OBRA SOCIAL SIN PRESTADOR</option>
                      <option value="SUMAR">SUMAR</option>
                      <option value="GALENO">GALENO</option>
                      </select> 
            </div>
            <div class="form-group col-md-6">
                <label for="inputOcupacion">Ocupacion</label>
                <input type="text" class="form-control" name="inputOcupacion" value="<?php echo $iocupacion;?> " disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelCel">Teléfono celular</label>
                <input type="text" class="form-control" name="inputTelCel" value="<?php echo $itel_cel;?>"  disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" name="inputEmail" value="<?php echo $iemail;?>"  disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Dirección</label>
                <input type="text" class="form-control" name="inputDireccion" value="<?php echo $idireccion;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDispHoraria">Disponibilidad horaria</label>
                <input type="text" class="form-control" name="inputDispHoraria" value="<?php echo $idisp_horaria;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputFechaAlta">Fecha de alta</label>
                <input type="date" class="form-control" name="inputFechaAlta" value="<?php echo $ifecha_alta;?>" disabled>
            </div>
            <div class="form-group col-md-6">
            <br>
                <label for="inputEstuvoInternado">¿Estuvo internado/a?</label><br>
                <?php $siIsChecked = $iestuvo_internado == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputEstuvoInternado" value="Si" <?php echo $siIsChecked ?> disabled> Si
                <?php $noIsChecked = $iestuvo_internado == 'No' ? 'checked' : ''; ?>  
                <input type="radio" name="inputEstuvoInternado" value="No" <?php echo $noIsChecked ?> disabled>  No <br>
                
            </div>
            <hr>
        </div>
        <hr><br>
            <h2 align='left'>Datos de Relevamiento</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimiento">¿Se encuentra bajo seguimiento de algún profesional luego del Covid-19?</label><br>
                <?php $siIsChecked = $ibajo_seguimiento == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputBajoSeguimiento" value="Si" <?php echo $siIsChecked ?> disabled>  Si 
                <?php $noIsChecked = $ibajo_seguimiento == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoSeguimiento" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimientoProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoSeguimientoProfesional" value="<?php echo $ibajo_seguimiento_profesional;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputSintomatologia">¿Presenta sintomatología?</label><br>
                <?php $siIsChecked = $isintomatologia == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputSintomatologia" value="Si" <?php echo $siIsChecked ?> disabled>  Si 
                <?php $noIsChecked = $isintomatologia == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputSintomatologia" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <div class="form-group col-md-6">
            <label for="inputConsignarSintomatologia">Consignar Sintomatología</label>
                <textarea class="form-control" name="inputConsignarSintomatologia"  rows="3" cols="50" disabled><?php echo $iconsignar_sintomatologia;?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControl">¿Se encuentra bajo control médico?</label><br> 
                <?php $siIsChecked = $ibajo_control == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="Si" <?php echo $siIsChecked ?> disabled>  Si 
                <?php $noIsChecked = $ibajo_control == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControlProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoControlProfesional"  value="<?php echo $ibajo_control_profesional;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMedicacion">¿Está tomando medicación actualmente?</label><br> 
                <?php $siIsChecked = $imedicacion == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputMedicacion" value="Si" <?php echo $siIsChecked ?> disabled>  Si  
                <?php $noIsChecked = $imedicacion == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputMedicacion" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarMedicacion">Consignar medicación</label>
                <textarea class="form-control" name="inputConsignarMedicacion" rows="3" cols="50" disabled><?php echo $iconsignar_medicacion;?></textarea>
            </div>
            
            <div class="form-group col-md-6">
                <label for="inputFamiliarCovid">¿Alguién más en la familia fue diagnosticado con Covid-19?</label><br> 
                <?php $siIsChecked = $ifamiliar_covid == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputFamiliarCovid" value="Si" <?php echo $siIsChecked ?> disabled>  Si  
                <?php $noIsChecked = $ifamiliar_covid == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputFamiliarCovid" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovilidad">¿Cuenta con medio de movilidad para acercarse al hospital?</label><br> 
                <?php $siIsChecked = $imovilidad == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputMovilidad" value="Si" <?php echo $siIsChecked ?> disabled>  Si  
                <?php $noIsChecked = $imovilidad == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputMovilidad" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <?php
             echo "<input type='hidden' name='id_paciente' value='$id_paciente'>";
            ?>
        </div>
        <hr><br>
            <h2 align='left'>Intervención Clínica Médica</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEstadoClinicoActual">Estado clínico actual (síntomas presentes)</label>
                <textarea class="form-control" name="inputEstadoClinicoActual" rows="3" cols="50" disabled><?php echo $iestado_clinico_actual; ?></textarea>
            </div>
            <div class="form-group col-md-6">
            <label for="inputMedicacion">Medicación</label>
                <textarea class="form-control" name="inputMedicacion" rows="3" cols="50" disabled ><?php echo $imedicacion_cl_medica; ?></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="inputEstudiosRealizados">Estudios realizados hasta la fecha</label>
                <textarea class="form-control" name="inputEstudiosRealizados" rows="3" cols="50" disabled ><?php echo $iestudios_realizados; ?></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="inputConsultaMedicaBreve">Consulta médica (breve descripción de la información)</label>
                <textarea class="form-control" name="inputConsultaMedicaBreve" rows="8" cols="50" disabled ><?php echo $iconsulta_medica_breve; ?></textarea>
            </div>
            <div class="form-group col-md-6">
            <label for="inputRequiereInterconsulta">¿Requiere interconsulta?</label><br>
                <?php $siIsChecked = $irequiere_interconsulta == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputRequiereInterconsulta" value="Si" <?php echo $siIsChecked ?> disabled> Si
                <?php $noIsChecked = $irequiere_interconsulta == 'No' ? 'checked' : ''; ?>  
                <input type="radio" name="inputRequiereInterconsulta" value="No" <?php echo $noIsChecked ?> disabled>  No <br>
            </div>
            <div class="form-group col-md-6">
            <label for="inputConsignarEspecialidad">Consignar especialidad</label><br> 
                <label><input type="checkbox" name="especialidad[]" value="PSICOLOGICA"> PSICOLOGICA</label>
                <label><input type="checkbox" name="especialidad[]" value="CARDIOLOGICA" disabled> CARDIOLOGICA </label>
                <label><input type="checkbox" id="todos" value="Todos" disabled> Todos</label>
                
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
                <label for="inputRequiereLaboratorio">¿Requiere estudios de Laboratorio?</label><br> 
                <?php $siIsChecked = $irequiere_laboratorio == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputRequiereLaboratorio" value="Si" <?php echo $siIsChecked ?> disabled> Si
                <?php $noIsChecked = $irequiere_laboratorio == 'No' ? 'checked' : ''; ?>  
                <input type="radio" name="inputRequiereLaboratorio" value="No" <?php echo $noIsChecked ?> disabled>  No <br>
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarLaboratorio">Consignar estudios</label>
                <textarea class="form-control" name="inputConsignarLaboratorio" rows="3" cols="50" disabled><?php echo $iconsignar_laboratorio; ?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputRequiereConsultaPosterior">¿Requiere consultas posteriores?</label><br> 
                <?php $siIsChecked = $irequiere_consulta_posterior == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputRequiereConsultaPosterior" value="Si" <?php echo $siIsChecked ?> disabled> Si
                <?php $noIsChecked = $irequiere_consulta_posterior == 'No' ? 'checked' : ''; ?>  
                <input type="radio" name="inputRequiereConsultaPosterior" value="No" <?php echo $noIsChecked ?> disabled>  No <br>
            </div>
            <div class="form-group col-md-12">
                <label for="inputSeguimiento">Seguimiento</label>
                <textarea class="form-control" name="inputSeguimiento" rows="8" cols="50" disabled><?php echo $iseguimiento; ?></textarea>
            </div>   
        <hr><br><br><br>
        <h2 align='left'><br>Intervención Psicológica</h2><br>
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
            <br>
            <input id="form" type="submit" class="btn btn-success float-right mx-auto" value="Imprimir" name="enviar_form">
    </div>
</form>


</div>

<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>