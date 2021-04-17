<?php
    require "conexion.php";
    
    session_start();

    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->

        <form id="form_e" action="nuevo_insert.php" method="POST">
        <div class="container mt-5 bg-light">
        <br>
        <h2 align='left'>Datos Personales</h2><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputDNI">DNI</label>
                <input type="text" class="form-control" name="inputDNI" placeholder="Ingrese su nro de documento" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputApellido">Apellido</label>
                <input type="text" class="form-control" name="inputApellido" placeholder="Apellido" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNombre">Nombres</label>
                <input type="text" class="form-control" name="inputNombre" placeholder="Nombre Completo" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEdad">Edad</label>
                <input type="text" class="form-control" name="inputEdad" placeholder="Edad" >
            </div>
            <div class="form-group col-md-6">
                    <label for="inputObraSocial">Obra Social</label>
                    <select class="form-control form-control" name="inputObraSocial" required>
                      <option value="" disabled selected>Obra Social</option>
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
                      <option value="" disabled selected>Obra Social</option>
                      <option value="OBRA SOCIAL SIN CONVENIO">OBRA SOCIAL SIN CONVENIO</option>
                      <option value="OBRA SOCIAL SIN PRESTADOR">OBRA SOCIAL SIN PRESTADOR</option>
                      <option value="SUMAR">SUMAR</option>
                      <option value="GALENO">GALENO</option>
                      </select> 
            </div>
            <div class="form-group col-md-6">
                <label for="inputOcupacion">Ocupacion</label>
                <input type="text" class="form-control" name="inputOcupacion" placeholder="Ocupación" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelCel">Teléfono celular</label>
                <input type="text" class="form-control" name="inputTelCel" placeholder="Celular" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" name="inputEmail" placeholder="Email" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputDireccion">Dirección</label>
                <input type="text" class="form-control" name="inputDireccion" placeholder="Ingrese su dirección">
            </div>
            <div class="form-group col-md-6">
                <label for="inputDispHoraria">Disponibilidad horaria</label>
                <input type="text" class="form-control" name="inputDispHoraria" placeholder="Disponibilidad horaria">
            </div>
            <div class="form-group col-md-6">
                <label for="inputFechaAlta">Fecha de alta</label>
                <input type="date" class="form-control" name="inputFechaAlta" value="2020-03-01">
            </div>
            <div class="form-group col-md-6">
            <br>
                <label for="inputEstuvoInternado">¿Estuvo internado/a?</label>  
                <input type="radio" name="inputEstuvoInternado" value="Si">  Si  <input type="radio" name="inputEstuvoInternado" value="No" required>  No <br>
            </div>
            <hr>
        </div>
        <hr><br>
            <h2 align='left'>Datos de Relevamiento</h2><br>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimiento">¿Se encuentra bajo seguimiento de algún profesional luego del Covid-19?</label><br> 
                <input type="radio" name="inputBajoSeguimiento" value="Si">  Si  <input type="radio" name="inputBajoSeguimiento" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoSeguimientoProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoSeguimientoProfesional" placeholder="Profesional">
            </div>
            <div class="form-group col-md-6">
                <label for="inputSintomatologia">¿Presenta sintomatología?</label><br> 
                <input type="radio" name="inputSintomatologia" value="Si">  Si  <input type="radio" name="inputSintomatologia" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
            <label for="inputConsignarSintomatologia">Consignar Sintomatología</label>
                <textarea class="form-control" name="inputConsignarSintomatologia" rows="3" cols="50" placeholder="Sintomatología..."></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControl">¿Se encuentra bajo control médico?</label><br> 
                <input type="radio" name="inputBajoControl" value="Si">  Si  <input type="radio" name="inputBajoControl" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputBajoControlProfesional">Consignar Profesional</label>
                <input type="text" class="form-control" name="inputBajoControlProfesional" placeholder="Profesional">
            </div>
            <div class="form-group col-md-6">
                <label for="inputMedicacion">¿Está tomando medicación actualmente?</label><br> 
                <input type="radio" name="inputMedicacion" value="Si">  Si  <input type="radio" name="inputMedicacion" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputConsignarMedicacion">Consignar medicación</label>
                <textarea class="form-control" name="inputConsignarMedicacion" rows="3" cols="50" placeholder="Medicación..."></textarea>
            </div>
            
            <div class="form-group col-md-6">
                <label for="inputFamiliarCovid">¿Alguién más en la familia fue diagnosticado con Covid-19?</label><br> 
                <input type="radio" name="inputFamiliarCovid" value="Si">  Si  <input type="radio" name="inputFamiliarCovid" value="No" required>  No
            </div>
            <div class="form-group col-md-6">
                <label for="inputMovilidad">¿Cuenta con medio de movilidad para acercarse al hospital?</label><br> 
                <input type="radio" name="inputMovilidad" value="Si">  Si  <input type="radio" name="inputMovilidad" value="No" required>  No
            </div>

        </div>
        <br>
        <input id="form" type="submit" class="btn btn-primary float-right my-2" value="Dar de Alta" name="enviar_form">    
    </div>
</form>

<div class="container bg-light mt-0">
    <a href="/ts_hclinicas/dashboard.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a>
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>

