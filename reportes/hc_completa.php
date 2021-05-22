<?php 

require "../php/conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}
$id_paciente = $_GET['id_paciente'];
$GLOBALS['id_paciente'];

// Traer datos personales
$sql4="SELECT * 
FROM paciente p
WHERE p.id_paciente=$id_paciente";

$result4 = mysqli_query($conn, $sql4);
if (mysqli_num_rows($result4) > 0) {
  $row = mysqli_fetch_assoc($result4);

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
    //datos relevamiento
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
// fin datos personaales

//Traer datos personales y de relevamiento, clinica med
$sql3="SELECT p.*, icl.*
FROM paciente p
INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente

WHERE p.id_paciente=$id_paciente
ORDER BY icl.fecha_intervencion_cl_medica DESC";

$result3 = mysqli_query($conn, $sql3);
$cant=mysqli_num_rows($result3);
$GLOBALS['cant'];

function mostrarDatos ($resultados) {

    if ($resultados !=NULL) {

        echo " <h2><b><u>Intervención Clinica Médica</u></b></h2><br>";
      //echo "<b><u>Intervención Clinica Médica</u></b><br><br>";
      echo "<table>";
          echo "<tr>";
          echo "<td class='desc'>ID: ".$resultados['id_int_cl_medica']." <br/></td> ";
          echo "<td class='desc'>Fecha de la intervención: ".$resultados['fecha_intervencion_cl_medica']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Estado clínico actual: ".$resultados['estado_clinico_actual']." <br/></td> ";
          echo "<td class='desc'>Medicación: ".$resultados['medicacion_cl_medica']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Esudios realizados: ".$resultados['estudios_realizados']." <br/></td> ";
          echo "<td class='desc'>Consulta médica breve: ".$resultados['consulta_medica_breve']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Requiere interconsulta: ".$resultados['requiere_interconsulta']." <br/></td> ";
          echo "<td class='desc'>Consignar especialidad: ".$resultados['consignar_especialidad']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Requiere laboratorio: ".$resultados['requiere_laboratorio']." <br/></td> ";
          echo "<td class='desc'>Consignar laboratorio: ".$resultados['consignar_laboratorio']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Requiere consultas posteriores: ".$resultados['requiere_consulta_posterior']." <br/></td> ";
          echo "<td class='desc'>Seguimiento: ".$resultados['seguimiento']." <br/></td> ";
          
      echo "</table>";

    
      //datos psicologia
      require "../php/conexion.php";
      $id_paciente = $_GET['id_paciente'];
      $id_int_cl_medica = $resultados['id_int_cl_medica'];
      $sql5="SELECT p.*, icl.*, ips.* 
      FROM paciente p 
      INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente 
      INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica 
      WHERE p.id_paciente = '$id_paciente' AND icl.id_int_cl_medica = '$id_int_cl_medica' ";
    
          //$resultado = mysqli_query($conn, $sql);
          $resultadosps = mysqli_query($conn, $sql5);
          if (mysqli_num_rows($resultadosps) > 0) {
            $row5 = mysqli_fetch_assoc($resultadosps);
            echo " <h2><b><u>Intervención Psicológica</u></b></h2><br>";

            echo "<table>";
          echo "<tr>";
          echo "<td class='desc'>ID: ".$row5['id_int_psicologica']." <br/></td> ";
          echo "<td class='desc'>Fecha de la intervención: ".$row5['fecha_int_ps']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Sintomatología: ".$row5['sintomatologia_ps']." <br/></td> ";
          echo "<td class='desc'>Modalidad: ".$row5['modalidad_ps']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Grupo familiar: ".$row5['grupo_familiar']." <br/></td> ";
          echo "<td class='desc'>Requiere interconsulta: ".$row5['requiere_interconsulta_ps']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Consignar especialidad: ".$row5['consignar_especialidad_ps']." <br/></td> ";
          echo "<td class='desc'>Requiere articular con otra institución: ".$row5['requiere_art_institucion']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Requiere laboratorio: ".$row5['requiere_laboratorio']." <br/></td> ";
          echo "<td class='desc'>Consignar institución: ".$row5['consignar_institucion']." <br/></td> ";
          echo "<tr>";
          echo "<td class='desc'>Breve reseña de la intervención: ".$row5['breve_resenia_int_ps']." <br/></td> ";
          echo "<td class='desc'>Seguimiento: ".$row5['seguimiento_ps']." <br/></td> ";
          
      echo "</table>";

            
          }
          else {
            echo " <h2><b><u>Intervención Psicológica</u></b></h2>";
          echo "No hay datos. <br/>";
            } 
        
            // consulta cardio
        $sql2="SELECT p.*, icl.*, icar.*
        FROM paciente p
        INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
        INNER JOIN int_cardiologica icar ON icar.id_int_cl_medica = icl.id_int_cl_medica
        WHERE p.id_paciente=$id_paciente AND icl.id_int_cl_medica = '$id_int_cl_medica'";
    
        $result2 = mysqli_query($conn, $sql2);
        //$resultado = mysqli_query($conn, $sql);
        $resultadoscar = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($resultadoscar) > 0) {
          $row6 = mysqli_fetch_assoc($resultadoscar);

          echo " <h2><b><u>Intervención Cardiológica</u></b></h2><br>";

          echo "<table>";
        echo "<tr>";
        echo "<td class='desc'>ID: ".$row6['id_int_cardiologica']." <br/></td> ";
        echo "<td class='desc'>fecha_int_car: ".$row6['fecha_int_car']." <br/></td> ";
        echo "<tr>";
        echo "<td class='desc'>Motivo de la consulta: ".$row6['motivo_consulta_car']." <br/></td> ";
        echo "<td class='desc'>APP: ".$row6['app_car']." <br/></td> ";
        echo "<tr>";
        echo "<td class='desc'>¿Bajo control médico?: ".$row6['bajo_control_medico_car']." <br/></td> ";
        echo "<td class='desc'>Médico de cabecera: ".$row6['medico_cabecera_car']." <br/></td> ";
        echo "<tr>";
        echo "<td class='desc'>Estudios complementarios: ".$row6['estudios_complementarios']." <br/></td> ";
        echo "<td class='desc'>Consignar estudios: ".$row6['consignar_estudios_car']." <br/></td> ";
        echo "<tr>";
        echo "<td class='desc'>Conducta a seguir: ".$row6['conducta_seguir']." <br/></td> ";
        echo "<tr>";
        
        echo "</table>";

          
        }
        else {
            echo " <h2><b><u>Intervención Cardiológica</u></b></h2>";
            echo "No hay datos. <br/>";
          } 

    echo "<hr><hr><br/>";
    }else {
      echo "<br/>No hay más datos. <br/>";
    }

}
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Historia Clínica - TeleSalud - HDC</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    

  </head>
  <body>
       <div id="logo">
        <img src="./img/logo_hdc_r-2.png" style="width=100px">
      </div>
      <h4><a href="javascript:window.print()"><i class="fas fa-print"> Imprimir</i><br><br></a>
      Seguimiento de pacientes PosCovid 19</h4>
     

      
    <header class="clearfix">
      <h1>Historia Clínica - TeleSalud</h1>
      
    </header>
    <main>
    <h2>Datos Personales</h2><br>
      <table>
          <tr>
          
          <td class="desc">DNI: <?php echo $idni; ?></td>   
          <td class="desc">Apellido y Nombre: <?php echo $iapellido.' '.$inombre ; ?></td>
          <tr>
          <td class="desc">Edad: <?php echo $iedad.' años' ; ?></td>
          <td class="desc">Obra Social: <?php echo $iobra_social;?></td>
          </tr>
          <tr>
          <td class="desc">Ocupación: <?php echo $iocupacion;?></td>
          <td class="desc">Tel. celular: <?php echo $itel_cel;?></td>
          </tr>
          <tr>
          <td class="desc">Email: <?php echo $iemail;?></td>
          <td class="desc">Dirección: <?php echo $idireccion;?></td>
          </tr>
          <tr>
          <td class="desc">Disp. horaria: <?php echo $idisp_horaria;?></td>
          <td class="desc">Fecha de alta: <?php echo $ifecha_alta;?></td>
          </tr>
          <tr>
          <td class="desc">¿Estuvo internado?: <?php echo $iestuvo_internado;?></td>
          </tr> 
            </tr>
         
      </table>

      <h2>Datos de Relevamiento</h2><br>
      <table>
          <tr>
          
          <td class="desc">¿Se encuentra bajo seguimiento de algún profesional luego del Covid-19? <?php echo $ibajo_seguimiento;?></td>   
          <td class="desc">Profesional: <?php echo $ibajo_seguimiento_profesional;?></td>
          <tr>
          <td class="desc">¿Presenta sintomatología?: <?php echo $isintomatologia;?></td>
          <td class="desc">Sintomatología: <?php echo $iconsignar_sintomatologia;?></td>
          </tr>
          <tr>
          <td class="desc">¿Se encuentra bajo control médico?: <?php echo $ibajo_control;?></td>
          <td class="desc">Profesional: <?php echo $ibajo_control_profesional;?></td>
          </tr>
          <tr>
          <td class="desc">¿Está tomando medicación actualmente?: <?php echo $imedicacion;?></td>
          <td class="desc">Medicación: <?php echo $iconsignar_medicacion;?></td>
          </tr>
          <tr>
          <td class="desc">¿Alguién más en la familia fue diagnosticado con Covid-19?: <?php echo $ifamiliar_covid;?></td>
          <td class="desc">¿Cuenta con medio de movilidad para acercarse al hospital?: <?php echo $imovilidad;?></td>
          </tr>
            </tr>
      </table>
      <hr>
      <h3>Cantidad de intervenciones: <?php echo $cant; ?></h3>
      <hr>

        <?php 
        $result = mysqli_query($conn, "SELECT p.*, icl.*
        FROM paciente p
        INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente

        WHERE p.id_paciente=$id_paciente
        ORDER BY icl.fecha_intervencion_cl_medica ASC");

        
           
            while ($fila = mysqli_fetch_array($result)){
                mostrarDatos($fila);
                }

        
        ?>
    
          
      </table>

      

  </body>
</html>