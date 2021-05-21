<?php
require "conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

        if (isset($_POST['enviar_form'])) {
        
        //Listado de Parametros
        $idni = $_POST["inputDNI"];
        $iapellido = $_POST["inputApellido"];
        $inombre = $_POST["inputNombre"];
        $itel_cel = $_POST["inputTelCel"];
        $iemail = $_POST["inputEmail"];
        $idireccion = $_POST["inputDireccion"];
        $iedad = $_POST["inputEdad"];
        $iobra_social = $_POST["inputObraSocial"];
        $iocupacion = $_POST["inputOcupacion"];  
        $idisp_horaria = $_POST["inputDispHoraria"];
        $ifecha_alta = $_POST["inputFechaAlta"];
        $iestuvo_internado = $_POST["inputEstuvoInternado"];

        $ibajo_seguimiento = $_POST["inputBajoSeguimiento"];
        $ibajo_seguimiento_profesional = $_POST["inputBajoSeguimientoProfesional"];
        $isintomatologia = $_POST["inputSintomatologia"];
        $iconsignar_sintomatologia = $_POST["inputConsignarSintomatologia"];
        $ibajo_control = $_POST["inputBajoControl"];
        $ibajo_control_profesional = $_POST["inputBajoControlProfesional"];
        $imedicacion = $_POST["inputMedicacion"];
        $iconsignar_medicacion = $_POST["inputConsignarMedicacion"];
        $ifamiliar_covid = $_POST["inputFamiliarCovid"];
        $imovilidad = $_POST["inputMovilidad"];

        
          $query = "INSERT INTO paciente (dni, apellido, nombre, tel_cel, email, direccion, edad, obra_social, ocupacion, fecha_alta, disp_horaria, estuvo_internado, bajo_seguimiento, bajo_seguimiento_profesional, sintomatologia, consignar_sintomatologia, bajo_control, bajo_control_profesional, medicacion, consignar_medicacion, familiar_covid, movilidad) VALUES ( '$idni', '$iapellido', '$inombre', '$itel_cel', '$iemail', '$idireccion', '$iedad', '$iobra_social', '$iocupacion', '$ifecha_alta', '$idisp_horaria','$iestuvo_internado', '$ibajo_seguimiento', '$ibajo_seguimiento_profesional', '$isintomatologia', '$iconsignar_sintomatologia', '$ibajo_control', '$ibajo_control_profesional', '$imedicacion','$iconsignar_medicacion','$ifamiliar_covid','$imovilidad')";
          //echo $query;
          $result = mysqli_query($conn, $query);
         
        }

        if($result) {
          echo'<script type="text/javascript">
          alert("Paciente ingresado exitosamente.-");
          window.location.href="/ts_hclinicas/php/listado_pacientes.php";
          </script>';
            
          } 
         else{
          echo'<script type="text/javascript">
          alert("Eroor al ingresar paciente.-");
          window.location.href="/ts_hclinicas/php/listado_pacientes.php";
          </script>';
          
        }

?>