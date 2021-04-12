<?php
include("conexion.php");

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
    //$id_paciente = $_POST['id_paciente'];
  
  }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historia Clinica TeleSalud</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon"   href="../img/logo.ico" type="img/ico" />
    </head>
    <body> 
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="../index.php">Tablero de comandos</a>
                    <a class="dropdown-item" href="../php/nuevo_paciente.php">Nuevo paciente</a>
                    <a class="dropdown-item" href="../php/listado_pacientes.php">Listado de pacientes</a>
                    <a class="dropdown-item" href="./agregar_intervencion.php">Agregar intervención</a>
                    <a class="dropdown-item" href="#">Reportes</a>
                </div>
            </div>
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo.png" width="300" height="50" class="d-inline-block align-top" alt="">              
            </a>            
            <div></div>   
        </nav>

        <form id="form_e" action="nuevo_insert_int_cl_medica.php" method="POST" name="nuevo_cl_medica">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Intervencion Clínica Médica</h2><br>
        <h2 align='left'>Datos Personales</h2><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDNI">DNI</label>
                <input type="text" class="form-control" name="inputDNI" value="<?php echo $idni;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputApellido">Apellido/s</label>
                <input type="text" class="form-control" name="inputApellido" value="<?php echo $iapellido;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombres/s</label>
                <input type="text" class="form-control" name="inputNombre" value="<?php echo $inombre;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEdad">Edad</label>
                <input type="text" class="form-control" name="inputEdad" value="<?php echo $iedad;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                    <label for="inputObraSocial">Obra Social</label>
                    <select class="form-control form-control" name="inputObraSocial" required disabled>
                    <option value="<?php echo $iobra_social;?>" disabled selected><?php echo $iobra_social;?></option>
                      
                      </select> 
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelCel">Teléfono celular</label>
                <input type="text" class="form-control" name="inputTelCel" value="<?php echo $itel_cel;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" name="inputEmail" value="<?php echo $iemail;?>" disabled >
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Dirección</label>
                <input type="text" class="form-control" name="inputDireccion" value="<?php echo $idireccion;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputFechaAlta">Fecha de alta</label>
                <input type="date" class="form-control" name="inputFechaAlta" value="<?php echo $ifecha_alta;?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControl">¿Se encuentra bajo control médico?</label><br> 
                <?php $siIsChecked = $ibajo_control == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="Si" <?php echo $siIsChecked ?> disabled>  Si 
                <?php $noIsChecked = $ibajo_control == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="No" <?php echo $noIsChecked ?> disabled>  No
            </div>
            <hr>
        </div>
        <hr><br>
            <h2 align='left'>Datos de Relevamiento</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEstadoClinicoActual">Estado clínico actual (síntomas presentes)</label>
                <textarea class="form-control" name="inputEstadoClinicoActual" rows="3" cols="50" placeholder="Estado clínico actual..."></textarea>
            </div>
            <div class="form-group col-md-6">
            <label for="inputMedicacion">Medicación</label>
                <textarea class="form-control" name="inputMedicacion" rows="3" cols="50" placeholder="Medicación..."></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="inputEstudiosRealizados">Estudios realizados hasta la fecha</label>
                <textarea class="form-control" name="inputEstudiosRealizados" rows="3" cols="50" placeholder="Estudios realizados hasta la fecha..."></textarea>
            </div>
            <div class="form-group col-md-12">
            <label for="inputConsultaMedicaBreve">Consulta médica (breve descripción de la información)</label>
                <textarea class="form-control" name="inputConsultaMedicaBreve" rows="8" cols="50" placeholder="Consulta médica (breve descripción de la intervención)..."></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputRequiereInterconsulta">¿Requiere interconsulta?</label><br>
                <input type="radio" name="inputRequiereInterconsulta" value="Si" required>  Si  <input type="radio" name="inputRequiereInterconsulta" value="No" required>  No 
            </div>
            <div class="form-group col-md-6">
            <label for="inputConsignarEspecialidad">Consignar especialidad</label><br> 
                <label><input type="checkbox" name="especialidad[]" value="PSICOLOGICA"> PSICOLOGICA</label>
                <label><input type="checkbox" name="especialidad[]" value="CARDIOLOGICA"> CARDIOLOGICA</label>
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
                <label for="inputRequiereLaboratorio">¿Requiere estudios de Laboratorio?</label><br> 
                <input type="radio" name="inputRequiereLaboratorio" value="Si" required>  Si  <input type="radio" name="inputRequiereLaboratorio" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarLaboratorio">Consignar estudios</label>
                <textarea class="form-control" name="inputConsignarLaboratorio" rows="3" cols="50" placeholder="Consignar estudios..."></textarea>
            </div>
            
            <div class="form-group col-md-6">
                <label for="inputRequiereConsultaPosterior">¿Requiere consultas posteriores?</label><br> 
                <input type="radio" name="inputRequiereConsultaPosterior" value="Si" required>  Si  <input type="radio" name="inputRequiereConsultaPosterior" value="No" required>  No  
            </div>
            <div class="form-group col-md-12">
                <label for="inputSeguimiento">Seguimiento</label>
                <textarea class="form-control" name="inputSeguimiento" rows="8" cols="50" placeholder="Seguimiento..."></textarea>
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
    <a href="../index.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a>
</div>

       
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        <br><br><br><br><br><br><br>
    </body>
    <footer class="font-small mt-5" style="background-color: #002752;position: fixed; bottom: 0px; width: 100%; height: 50px">
        <div class="text-white text-center py-3">© 2020 - Área de Sistemas - HDC
            <a class="text-info" href="#"></a>
        </div>
    </footer>
</html>