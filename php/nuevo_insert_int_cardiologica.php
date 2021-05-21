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
        $id_insertado = mysqli_insert_id($conn);
        //echo $id_insertado;
        $imotivo_consulta_car = $_POST["inputMotivo_consulta_car"];
        $iapp_car = $_POST["inputApp_car"];
        $ibajo_control_medico_car = $_POST["inputBajo_control_medico_car"];
        $imedico_cabecera_car = $_POST["inputMedico_cabecera_car"];
        $iestudios_complementarios = $_POST["inputEstudios_complementarios"];
        $iconsignar_estudios = $_POST["inputConsignar_estudios_car"];
        
        $ifecha_int_car = $_POST["inputFecha_int_car"];
        $iconducta_seguir = $_POST["inputConducta_seguir"];
         

        $id_paciente = $_POST["id_paciente"];
        $id_int_cl_medica = $_POST['id_int_cl_medica'];

        $query2 = "UPDATE int_cardiologica SET motivo_consulta_car='$imotivo_consulta_car', app_car='$imotivo_consulta_car', bajo_control_medico_car='$ibajo_control_medico_car', medico_cabecera_car='$imedico_cabecera_car', estudios_complementarios='$iestudios_complementarios', consignar_estudios_car='$iconsignar_estudios', conducta_seguir='$iconducta_seguir', fecha_int_car='$ifecha_int_car', estado_car='A' WHERE id_int_cl_medica='$id_int_cl_medica'";

          echo $query2;
          //die();
          $result2 = mysqli_query($conn, $query2);
        }

        if($result2) 
        {

            echo "<script language='javascript'>
                alert('INT. CARDIOLOGICA INGRESADA EXITOSAMENTE');
                
              </script>";  

              header('Location: listado_pacientes_car.php');
        }
        else{
              echo "<script language='javascript'>
                alert('ERROR');
              </script>"; 
              //header('Location: ../index.php');
        }  
        
         
        
?>