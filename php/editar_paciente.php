<?php
include("conexion.php");

if(isset($_GET['id_paciente_edit'])) {
  $id_paciente = $_GET['id_paciente_edit'];
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

        <form id="form_e" action="editar_paciente_edit.php" method="POST">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Datos Personales</h2><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDNI">DNI</label>
                <input type="text" class="form-control" name="inputDNI" value="<?php echo $idni;?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input type="text" class="form-control" name="inputApellido" value="<?php echo $iapellido;?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombres</label>
                <input type="text" class="form-control" name="inputNombre" value="<?php echo $inombre;?>"  >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEdad">Edad</label>
                <input type="text" class="form-control" name="inputEdad" value="<?php echo $iedad;?>" >
            </div>
            <div class="form-group col-md-6">
                    <label for="inputObraSocial">Obra Social</label>
                    <select class="form-control form-control" name="inputObraSocial" required>
             
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
                <input type="text" class="form-control" name="inputOcupacion" value="<?php echo $iocupacion;?> ">
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelCel">Teléfono celular</label>
                <input type="text" class="form-control" name="inputTelCel" value="<?php echo $itel_cel;?>"  >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" name="inputEmail" value="<?php echo $iemail;?>"  >
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Dirección</label>
                <input type="text" class="form-control" name="inputDireccion" value="<?php echo $idireccion;?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputDispHoraria">Disponibilidad horaria</label>
                <input type="text" class="form-control" name="inputDispHoraria" value="<?php echo $idisp_horaria;?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputFechaAlta">Fecha de alta</label>
                <input type="date" class="form-control" name="inputFechaAlta" value="<?php echo $ifecha_alta;?>">
            </div>
            <div class="form-group col-md-6">
            <br>
                <label for="inputEstuvoInternado">¿Estuvo internado/a?</label><br>
                <?php $siIsChecked = $iestuvo_internado == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputEstuvoInternado" value="Si" <?php echo $siIsChecked ?> > Si
                <?php $noIsChecked = $iestuvo_internado == 'No' ? 'checked' : ''; ?>  
                <input type="radio" name="inputEstuvoInternado" value="No" <?php echo $noIsChecked ?>>  No <br>
                
            </div>
            <hr>
        </div>
        <hr><br>
            <h2 align='left'>Datos de Relevamiento</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimiento">¿Se encuentra bajo seguimiento de algún profesional luego del Covid-19?</label><br>
                <?php $siIsChecked = $ibajo_seguimiento == 'Si' ? 'checked' : ''; ?>
                <input type="radio" name="inputBajoSeguimiento" value="Si" <?php echo $siIsChecked ?>>  Si 
                <?php $noIsChecked = $ibajo_seguimiento == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoSeguimiento" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimientoProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoSeguimientoProfesional" value="<?php echo $ibajo_seguimiento_profesional;?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputSintomatologia">¿Presenta sintomatología?</label><br>
                <?php $siIsChecked = $isintomatologia == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputSintomatologia" value="Si" <?php echo $siIsChecked ?>>  Si 
                <?php $noIsChecked = $isintomatologia == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputSintomatologia" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <div class="form-group col-md-6">
            <label for="inputConsignarSintomatologia">Consignar Sintomatología</label>
                <textarea class="form-control" name="inputConsignarSintomatologia"  rows="3" cols="50"><?php echo $iconsignar_sintomatologia;?></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControl">¿Se encuentra bajo control médico?</label><br> 
                <?php $siIsChecked = $ibajo_control == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="Si" <?php echo $siIsChecked ?>>  Si 
                <?php $noIsChecked = $ibajo_control == 'No' ? 'checked' : ''; ?> 
                <input type="radio" name="inputBajoControl" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControlProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoControlProfesional"  value="<?php echo $ibajo_control_profesional;?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputMedicacion">¿Está tomando medicación actualmente?</label><br> 
                <?php $siIsChecked = $imedicacion == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputMedicacion" value="Si" <?php echo $siIsChecked ?>>  Si  
                <?php $noIsChecked = $imedicacion == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputMedicacion" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarMedicacion">Consignar medicación</label>
                <textarea class="form-control" name="inputConsignarMedicacion" rows="3" cols="50"><?php echo $iconsignar_medicacion;?></textarea>
            </div>
            
            <div class="form-group col-md-6">
                <label for="inputFamiliarCovid">¿Alguién más en la familia fue diagnosticado con Covid-19?</label><br> 
                <?php $siIsChecked = $ifamiliar_covid == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputFamiliarCovid" value="Si" <?php echo $siIsChecked ?>>  Si  
                <?php $noIsChecked = $ifamiliar_covid == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputFamiliarCovid" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovilidad">¿Cuenta con medio de movilidad para acercarse al hospital?</label><br> 
                <?php $siIsChecked = $imovilidad == 'Si' ? 'checked' : ''; ?> 
                <input type="radio" name="inputMovilidad" value="Si" <?php echo $siIsChecked ?>>  Si  
                <?php $noIsChecked = $imovilidad == 'No' ? 'checked' : ''; ?>
                <input type="radio" name="inputMovilidad" value="No" <?php echo $noIsChecked ?>>  No
            </div>
            <?php
             echo "<input type='hidden' name='id_paciente' value='$id_paciente'>";
            ?>
        </div>
        <br>
        <input id="form" type="submit" class="btn btn-primary float-right my-2" value="Actualizar" name="enviar_form">    
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


