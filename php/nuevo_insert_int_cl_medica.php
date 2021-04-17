<?php
require "conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
        
        if (isset($_POST['enviar_form'])) {
        
        //Listado de Parametros
        $id_insertado = mysqli_insert_id($conn);
        //echo $id_insertado;
        $iestado_clinico_actual = $_POST["inputEstadoClinicoActual"];
        $imedicacion = $_POST["inputMedicacion"];
        $iestudios_realizados = $_POST["inputEstudiosRealizados"];
        $iconsulta_medica_breve = $_POST["inputConsultaMedicaBreve"];
        $irequiere_interconsulta = $_POST["inputRequiereInterconsulta"];

        $iconsignar_especialidad="";
        if (isset($_POST["especialidad"])){
          $iconsignar_especialidad = implode(',', $_POST["especialidad"] );
        }
        
        $irequiere_laboratorio = $_POST["inputRequiereLaboratorio"];
        $iconsignar_laboratorio = $_POST["inputConsignarLaboratorio"];
        $irequiere_consulta_posterior = $_POST["inputRequiereConsultaPosterior"];  
        $iseguimiento = $_POST["inputSeguimiento"];
        $id_paciente = $_POST["id_paciente"];
        $id_int_cl_medica = $_POST['id_int_cl_medica'];
                
          $query2 = "INSERT INTO int_cl_medica (id_paciente, estado_clinico_actual, medicacion, estudios_realizados, consulta_medica_breve, requiere_interconsulta, consignar_especialidad, requiere_laboratorio, consignar_laboratorio, requiere_consulta_posterior, seguimiento) VALUES ( '$id_paciente','$iestado_clinico_actual', '$imedicacion', '$iestudios_realizados', '$iconsulta_medica_breve', '$irequiere_interconsulta', '$iconsignar_especialidad', '$irequiere_laboratorio', '$iconsignar_laboratorio', '$irequiere_consulta_posterior', '$iseguimiento')";
          //echo $query2;
          $result2 = mysqli_query($conn, $query2);
        }

        if($result2) 
        {

            /*echo "<script language='javascript'>
                alert('INT. CL. MEDICA INGRESADA EXITOSAMENTE');
                
              </script>";*/
              //$mystring = 'abc';
              $psicologica   = 'PSICOLOGICA';
              $cardiologica   = 'CARDIOLOGICA';
              $pos = strpos($iconsignar_especialidad, $psicologica);
              //echo $pos;
              $pos2 = strpos($iconsignar_especialidad, $cardiologica);
              
              // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
              // porque la posición de 'a' está en el 1° (primer) caracter.
              /*if($pos === true && $pos2 === true) {
                echo "La especialidad '$psicologica' y '$cardiologica' fue encontrada en la cadena '$iconsignar_especialidad'";
              }*/
              
              if($pos === 0 && $pos2 === 0) {
                /*echo "<script language='javascript'>
                alert('INT. CL. MEDICA INGRESADA EXITOSAMENTE');     
                </script>";*/
                  // INSERT EN LA TABLO PS
                  $query5 = "INSERT INTO int_psicologica (id_int_cl_medica) VALUES ($id_int_cl_medica);";
                  //$result5 = mysqli_query($conn, $query5);
                  //echo $query5;
                  

                  // INSERT EN LA TABLA CARDIO
                  /*$query4 = "INSERT INTO int_cardiologica (id_int_cl_medica) VALUES ($id_int_cl_medica);";
                  $result4 = mysqli_query($conn, $query4);*/
                  
                } else if($pos === 0) {
                  echo "La cadena '$psicologica' fue encontrada en la cadena '$iconsignar_especialidad'";
                  echo " y existe en la posición $pos";
                  $query3 = "INSERT INTO int_psicologica (id_int_cl_medica) VALUES ($id_int_cl_medica);";
                  echo $query3;
                  $result3 = mysqli_query($conn, $query3);
                  header('Location: ./listado_pacientes.php');
                  }  
                 else if($pos2 === 0) {
                    /*echo "La cadena '$cardiologica' fue encontrada en la cadena '$iconsignar_especialidad'";*/
                    //echo " y existe en la posición $pos";
                    /*$query4 = "INSERT INTO int_cardiologica (id_int_cl_medica) VALUES ($id_int_cl_medica);";
                    $result4 = mysqli_query($conn, $query4);*/
                    //echo "agregar tab cardio";
                    }
                else {
                      header('Location: ./listado_pacientes.php');
                    }
        }
        else{
              echo "<script language='javascript'>
                alert('ERROR');
              </script>"; 
              header('Location: ../index.php');
        }  
        
         
        
?>