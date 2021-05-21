<?php
require "../php/conexion.php";
session_start();
$id_paciente = $_GET['id_paciente'];

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

//
$datos_cl = "";

function mostrarDatos ($resultados) {

  if ($resultados !=NULL) {
  
    echo "<b><u>Intervención Clinica Médica</u></b><br><br>";
    echo "- ID: ".$resultados['id_int_cl_medica']."<br/> ";
    echo "- Fecha int: ".$resultados['fecha_intervencion_cl_medica']."<br/> ";
    echo "- Est clin: ".$resultados['estado_clinico_actual']."<br/>";       
    echo "- Medicacion: ".$resultados['medicacion_cl_medica']."<br/>";       
    echo "- Est realizados: ".$resultados['estudios_realizados']."<br/>";       
    echo "- Consulta breve: ".$resultados['consulta_medica_breve']."<br/>";
    echo "- Requiere interconsulta: ".$resultados['requiere_interconsulta']."<br/>";       
    echo "- Especialidad: ".$resultados['consignar_especialidad']."<br/>";       
    echo "- Requiere laboratorio: ".$resultados['requiere_laboratorio']."<br/>";
    echo "- Seguimiento: ".$resultados['seguimiento']."<br/><br/>";
  
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
          echo "<b><u>Intervención Psicológica</u></b><br><br>";
          echo "- ID: ".$row5['id_int_psicologica']."<br/> ";
          echo "- Fecha int: ".$row5['fecha_int_ps']."<br/> ";
          echo "- Sintomatología: ".$row5['sintomatologia_ps']."<br/> ";
          echo "- Modalidad: ".$row5['modalidad_ps']."<br/>";       
          echo "- Grupo Familiar: ".$row5['grupo_familiar']."<br/>";       
          echo "- Requiere interconsulta: ".$row5['requiere_interconsulta_ps']."<br/>";       
          echo "- Consingar especialidad: ".$row5['consignar_especialidad_ps']."<br/>";
          echo "- Requiere articulacion con otra institución: ".$row5['requiere_art_institucion']."<br/>";       
          echo "- Consignar institución: ".$row5['consignar_institucion']."<br/>";       
          echo "- breve reseña de la intervención: ".$row5['breve_resenia_int_ps']."<br/>";
          echo "- Seguimiento: ".$row5['seguimiento_ps']."<br/><br/>";
          
        }
        else {
        echo "<b><u>Intervención Psicológica</u></b><br>";
        echo "<br/>No hay datos. <br/>";
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
          echo "<b><u><br>Intervención Cardiológica</u></b><br><br>";
          echo "- ID: ".$row6['id_int_cardiologica']."<br/> ";
          echo "- Fecha int: ".$row6['fecha_int_car']."<br/> ";
          echo "- Motivo de la consulta: ".$row6['motivo_consulta_car']."<br/> ";
          echo "- APP: ".$row6['app_car']."<br/>";       
          echo "- ¿Bajo control médico?: ".$row6['bajo_control_medico_car']."<br/>";       
          echo "- Médico de cabecera: ".$row6['medico_cabecera_car']."<br/>";       
          echo "- Estudios complementarios: ".$row6['estudios_complementarios']."<br/>";
          echo "- Consignar estudios: ".$row6['consignar_estudios_car']."<br/>";       
          echo "- Conducta a seguir: ".$row6['conducta_seguir']."<br/>"; 
      
  
      }
      else {
        echo "<b><u>Intervención Cardiológica</u></b><br>";
      echo "<br/>No hay datos. <br>";
        }
        
        
        
        
  
  
  echo "<hr><hr><br/>";}
  
  else {
    echo "<br/>No hay más datos!!! <br/>";}
  
  }



require_once __DIR__ . '/MPDF/vendor/autoload.php';

$html = '
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Intervención TeleSalud - Individual</title>
    <!-- <link rel="stylesheet" href="style.css" media="all" /> -->
  </head>
  <body>
       <div id="logo">
        <img src="./img/logo_hdc_r-2.png" style="width=75px">
      </div>

      <!-- <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> -->
    <header class="clearfix">
      <h1>Historia Clínica completa</h1>
    </header>
    <main>
    <h3>Datos Personales</h3><br>
    <table>
    <tr>';
    $html.=' 
    <td class="desc">DNI: '.$idni.'</td>   
          <td class="desc">Apellido y Nombre: '.$iapellido." $inombre" .'</td>
          <tr>
          <td class="desc">Edad: '.$iedad." años".'</td>
          <td class="desc">Obra Social: '.$iobra_social.'</td>
          </tr>
          <tr>
          <td class="desc">Ocupación: '.$iocupacion.'</td>
          <td class="desc">Tel. celular: '.$itel_cel.'</td>
          </tr>
          <tr>
          <td class="desc">Email: '.$iemail.'</td>
          <td class="desc">Dirección: '.$idireccion.'</td>
          </tr>
          <tr>
          <td class="desc">Disp. horaria: '.$idisp_horaria.'</td>
          <td class="desc">Fecha de alta: '.$ifecha_alta.'</td>
          </tr>
          <tr>
          <td class="desc">¿Estuvo internado?: '.$iestuvo_internado.'</td>
          </tr>

      </tr>';
    $html.='
    </table>

      <h3>Datos de Relevamiento</h3><br>
      <table>
          <tr>';
          $html.=' 
          <td class="desc">¿Se encuentra bajo seguimiento de algún profesional luego del Covid-19? '.$ibajo_seguimiento.'</td>   
          <td class="desc">Profesional: '.$ibajo_seguimiento_profesional.'</td>
          <tr>
          <td class="desc">¿Presenta sintomatología?: '.$isintomatologia.'</td>
          <td class="desc">Sintomatología: '.$iconsignar_sintomatologia.'</td>
          </tr>
          <tr>
          <td class="desc">¿Se encuentra bajo control médico?: '.$ibajo_control.'</td>
          <td class="desc">Profesional: '.$ibajo_control_profesional.'</td>
          </tr>
          <tr>
          <td class="desc">¿Está tomando medicación actualmente?: '.$imedicacion.'</td>
          <td class="desc">Medicación: '.$iconsignar_medicacion.'</td>
          </tr>
          <tr>
          <td class="desc">¿Alguién más en la familia fue diagnosticado con Covid-19?: '.$ifamiliar_covid.'</td>
          <td class="desc">¿Cuenta con medio de movilidad para acercarse al hospital?: '.$imovilidad.'</td>
          </tr>
            </tr>
            ';
          $html.='
      </table>
      <hr>
      <h3>Cantidad de intervenciones: ';
      $html.=' '.$cant.' </h3><br>
      
      <h3>Datos de Intervención de Clínica Médica</h3><br>
      
      <table>
          <tr>';
          $html.=' 
          <td class="desc"></td>
           
            </tr>';


echo "hola";




          $html.='
      </table>

    </main>
  </body>
  
</html>

';


//$cabecera = "<span><b>Mi primer documento PDF dinámico con mPDF</b></span>"; 
$pie = "<span> <a href=\"http://hospital.unlar.edu.ar\">Hospital de Clínicas - UNLaR</a> - <i>Fecha: ".date("d/m/Y")."</i> </span>";
$mpdf = new \Mpdf\Mpdf(); 
$css = file_get_contents('style.css'); 
$mpdf->WriteHTML($css, 1); 
//$mpdf->WriteHTML($html); 
//$mpdf->SetHTMLHeader($cabecera);
//$mpdf->setFooter("{PAGENO}");
//$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetHTMLFooter($pie);

//$mpdf->AddPage("", "", 1);
$mpdf->WriteHTML($html); 
$mpdf->Output();

?>