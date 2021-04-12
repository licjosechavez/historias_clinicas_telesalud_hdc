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

