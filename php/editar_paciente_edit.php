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
        $id_paciente = $_POST['id_paciente'];

        $query = "UPDATE paciente SET dni='$idni', apellido='$iapellido', nombre='$inombre', tel_cel='$itel_cel', email='$iemail', direccion='$idireccion', edad='$iedad', obra_social='$iobra_social', ocupacion='$iocupacion', fecha_alta='$ifecha_alta', disp_horaria='$idisp_horaria', estuvo_internado='$iestuvo_internado', bajo_seguimiento='$ibajo_seguimiento', bajo_seguimiento_profesional='$ibajo_seguimiento_profesional', sintomatologia='$isintomatologia', consignar_sintomatologia='$iconsignar_sintomatologia', bajo_control='$ibajo_control', bajo_control_profesional='$ibajo_control_profesional', medicacion='$imedicacion', consignar_medicacion='$iconsignar_medicacion', familiar_covid='$ifamiliar_covid', movilidad='$imovilidad' WHERE id_paciente='$id_paciente'";

          //echo $query;
          $result = mysqli_query($conn, $query);
          //echo $result;
         
        }

        if($result) {
          echo'<script type="text/javascript">
          alert("Paciente actualizado exitosamente.-");
          window.location.href="/ts_hclinicas/php/listado_pacientes.php";
          </script>';
            
          } 
         else{
          echo'<script type="text/javascript">
          alert("Eroor al actualizar paciente.-");
          window.location.href="/ts_hclinicas/php/listado_pacientes.php";
          </script>';
          
        }

?>