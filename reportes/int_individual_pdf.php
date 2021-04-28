<?php

    require "../php/conexion.php";
    session_start();
    if(!isset($_SESSION["id"])){
      //header("Location: index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];  
    

    if(isset($_GET['id_paciente']) AND isset ($_GET['id_int_cl_medica'] )) {
        $id_paciente = $_GET['id_paciente'];
        $id_int_cl_medica = $_GET['id_int_cl_medica'];
        //echo $id_paciente;
        /*$query = "SELECT * FROM paciente WHERE id_paciente = $id_paciente";*/
        $sql="SELECT p.*, icl.*, ips.*
        FROM paciente p
        INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
        INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica
        WHERE p.id_paciente=$id_paciente AND icl.id_int_cl_medica=$id_int_cl_medica";
        //$resultado = mysqli_query($conn, $sql);
        
        $result = mysqli_query($conn, $sql);
        echo $sql;
        
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          
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

          // datos de int cl medica
        $iestado_clinico_actual = $row["estado_clinico_actual"];
        $imedicacion_cl_medica = $row["medicacion_cl_medica"];
        $iestudios_realizados = $row["estudios_realizados"];
        $iconsulta_medica_breve = $row["consulta_medica_breve"];
        $irequiere_interconsulta_cl = $row["requiere_interconsulta"];

        $iconsignar_especialidad_cl=$row["consignar_especialidad"];

        $irequiere_laboratorio = $row["requiere_laboratorio"];
        $iconsignar_laboratorio = $row["consignar_laboratorio"];
        $irequiere_consulta_posterior = $row["requiere_consulta_posterior"];  
        $iseguimiento = $row["seguimiento"];
        $ifecha_int_cl_medica = $row["fecha_intervencion_cl_medica"];
        //echo $ifecha_int_cl_medica;
        $id_paciente = $row["id_paciente"];
        $id_int_cl_medica = $row['id_int_cl_medica'];

        // datos de int psicologica
        //Listado de Parametros
        $id_insertado = mysqli_insert_id($conn);
        //echo $id_insertado;
        $isintomatologia_ps = $row["sintomatologia_ps"];
        //$imedicacion = $row["inputMedicacion"];
        $irequiere_interconsulta_ps = $row["requiere_interconsulta_ps"];
        $iconsignar_especialidad = $row["consignar_especialidad_ps"];
        $ifecha_intervencion = $row["fecha_int_ps"];

        $imodalidad=$row["modalidad_ps"];;

        $irequiere_articulacion = $row["requiere_art_institucion"];
        $iconsignar_institucion = $row["consignar_institucion"];
        $igrupo_familiar = $row["grupo_familiar"];
        $ibreve_reseña_intervencion = $row["breve_resenia_int_ps"];
        $iseguimiento_ps = $row["seguimiento_ps"];  
        
        }
      }

      //echo $iapellido;  

require_once __DIR__ . '/MPDF/vendor/autoload.php';

$html = '
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
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

      <h1>Intervención TeleSalud</h1>
      

    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Apellido</th>
            <th class="desc">Nombre</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>';
          $html.='
            <td class="service">'.$iapellido.'
            </td>
            <td class="desc">'.$inombre.'</td>
            <td class="unit"></td>
            <td class="qty"></td>
            <td class="total"></td>
            </tr>';
          $html.='
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
'; 
$mpdf = new \Mpdf\Mpdf(); 
$css = file_get_contents('style.css'); 
$mpdf->WriteHTML($css, 1); 
$mpdf->WriteHTML($html); $mpdf->Output();
