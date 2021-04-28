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
        $isintomatologia = $_POST["inputSintomatologia"];
        $imedicacion = $_POST["inputMedicacion"];
        $irequiere_interconsulta = $_POST["inputRequiereInterconsulta"];
        $iconsignar_especialidad = $_POST["inputConsignarEspecialidad"];
        $ifecha_intervencion = $_POST["inputFechaIntervencion"];
        $imodalidad="";
        if (isset($_POST["modalidad"])){
          $imodalidad = implode(',', $_POST["modalidad"] );
        }
        $irequiere_articulacion = $_POST["inputRequiereArticulacion"];
        $iconsignar_institucion = $_POST["inputConsignarInstitucion"];
        $igrupo_familiar = $_POST["inputGrupoFamiliar"];
        $ibreve_reseña_intervencion = $_POST["inputBreveReseniaIntervencion"];
        $iseguimiento = $_POST["inputSeguimientoPsicologia"];  

        $id_paciente = $_POST["id_paciente"];
        $id_int_cl_medica = $_POST['id_int_cl_medica'];

        $query2 = "UPDATE int_psicologica SET sintomatologia_ps='$isintomatologia', modalidad_ps='$imodalidad', grupo_familiar='$igrupo_familiar', requiere_interconsulta_ps='$irequiere_interconsulta', consignar_especialidad_ps='$iconsignar_especialidad', requiere_art_institucion='$irequiere_articulacion', consignar_institucion='$iconsignar_institucion', breve_resenia_int_ps='$ibreve_reseña_intervencion', seguimiento_ps ='$iseguimiento', fecha_int_ps='$ifecha_intervencion', estado='A' WHERE id_int_cl_medica='$id_int_cl_medica'";

          //echo $query2;
          $result2 = mysqli_query($conn, $query2);
        }

        if($result2) 
        {

            echo "<script language='javascript'>
                alert('INT. PSICOLOGICA INGRESADA EXITOSAMENTE');
                
              </script>";   
              header('Location: listado_pacientes_ps.php');
        }
        else{
              echo "<script language='javascript'>
                alert('ERROR');
              </script>"; 
              //header('Location: ../index.php');
        }  
        
         
        
?>