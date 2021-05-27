<?php
$fecha_i = $_POST['fecha_inicio'];
$fecha_i_cast = str_replace("T", " ", $fecha_i);

$fecha_f = $_POST['fecha_final'];
$fecha_f_cast = str_replace("T", " ", $fecha_f);
/*$GLOBALS['fecha_i_cast'];
$GLOBALS['fecha_f_cast'];*/

function Consulta(){
  $fecha_i = $_POST['fecha_inicio'];
$fecha_i_cast = str_replace("T", " ", $fecha_i);

$fecha_f = $_POST['fecha_final'];
$fecha_f_cast = str_replace("T", " ", $fecha_f);
echo "<hr>";
  

  require "../php/conexion.php";
  $query = "SELECT p.*, icl.*
  FROM paciente p
  INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
  WHERE icl.fecha_intervencion_cl_medica
  BETWEEN '$fecha_i_cast' AND '$fecha_f_cast'
  ORDER BY icl.fecha_intervencion_cl_medica ASC ";
  $resultado = mysqli_query($conn, $query);
  
  $tabla="";
  $tabla.= "<table>
              <thead>
              <tr>
                  <th>Nro</th>
                  <th>Fecha de la intervención</th>
                  <th>DNI</th>
                  <th>Apellido/s</th>
                  <th>Nombre/s</th>
                  <th>Obra Social</th>
                  <th>Direccion</th>
                  <th>Tel. celular</th>
                  <th>Email</th>
                  <th>Especialidad</th>
                  <th>Laboratorio</th>
              </tr>
            </thead>";
            $i=0;
            while($row = $resultado->fetch_assoc()){
              $i++;
              $tabla.= "<tr>
                        <td>".$i."</td>
                        <td>".$row['fecha_intervencion_cl_medica']."</td>
                        <td>".$row['dni']."</td>
                        <td>".$row['apellido']."</td>
                        <td>".$row['nombre']."</td>
                        <td>".$row['obra_social']."</td>
                        <td>".$row['direccion']."</td>
                        <td>".$row['tel_cel']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['consignar_especialidad']."</td>
                        <td>".$row['consignar_laboratorio']."</td>
                        </tr>";

    }
              $tabla.="</table>";
              return $tabla;
}

$html .= "<!DOCTYPE html>
      <html lang='es'>
      <head>
        <meta charset='utf-8'>
        <title>Intervención TeleSalud - Individual</title>
        <!-- <link rel='stylesheet' href='style.css' media='all' /> -->
      </head>
      <body>
          <div id='logo2'>
            <img src='.././img/logo.png' style='width=75px'>
          </div>
          <br>
          <h4>Fecha de inicio: $fecha_i_cast || Fecha de fin: $fecha_f_cast</h4><br>
        <header class='clearfix'>
          <h1>Listado de pacientes PosCovid19 entre dos fechas</h1>
        </header>
        ";
$html .= Consulta();
$html.= "</main>   
      </body>
      </html>";




?>


<?php
    require_once __DIR__ . '/MPDF/vendor/autoload.php';

    //$cabecera = "<span><b>Mi primer documento PDF dinámico con mPDF</b></span>"; 
    $pie = "<span> <a href=\"http://hospital.unlar.edu.ar\">Hospital de Clínicas - UNLaR</a> - <i>Fecha: ".date("d/m/Y")."</i> </span>";
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
    $css = file_get_contents('style.css'); 
    $mpdf->WriteHTML($css, 1); 
    $mpdf->SetHTMLFooter($pie);
    $mpdf->WriteHTML($html); 
    $mpdf->Output();
?>