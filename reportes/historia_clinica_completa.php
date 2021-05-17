<?php

    require "../php/conexion.php";
    session_start();
    $id_paciente = $_GET['id_paciente'];
    //echo $id_paciente;

    
    function mostrarDatosCar ($resultadoscar) {
        
        if ($resultadoscar !=NULL) {

            
        echo "- ID: ".$resultadoscar['id_int_cardiologica']."<br/> ";
        echo "- Fecha int: ".$resultadoscar['fecha_int_car']."<br/> ";
        echo "- Motivo de la consulta: ".$resultadoscar['motivo_consulta_car']."<br/> ";
        echo "- APP: ".$resultadoscar['app_car']."<br/>";       
        echo "- ¿Bajo control médico?: ".$resultadoscar['bajo_control_medico_car']."<br/>";       
        echo "- Médico de cabecera: ".$resultadoscar['medico_cabecera_car']."<br/>";       
        echo "- Estudios complementarios: ".$resultadoscar['estudios_complementarios']."<br/>";
        echo "- Consignar estudios: ".$resultadoscar['consignar_estudios_car']."<br/>";       
        echo "- Conducta a seguir: ".$resultadoscar['conducta_seguir']."<br/>";       
         
        echo "<hr>";           
     
    }else {
            echo "<b><u>Intervención Cardiológica</u></b><br><br>";
            echo "<br/>No hay datos. <br/>";
        }  
    }

    // Traer datos personales
    $sql4="SELECT * 
    FROM paciente p
    WHERE p.id_paciente=$id_paciente";

    $result4 = mysqli_query($conn, $sql4);


    //Traer datos personales y de relevamiento, clinica med
    $sql3="SELECT p.*, icl.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    
    WHERE p.id_paciente=$id_paciente
    ORDER BY icl.fecha_intervencion_cl_medica DESC";

    $result3 = mysqli_query($conn, $sql3);

    // consulta psico
    $sql1="SELECT p.*, icl.*, ips.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    INNER JOIN int_psicologica ips ON ips.id_int_cl_medica = icl.id_int_cl_medica
    WHERE p.id_paciente=$id_paciente
    ORDER BY icl.fecha_intervencion_cl_medica DESC";

    $result1 = mysqli_query($conn, $sql1);

    // consulta cardio
    $sql2="SELECT p.*, icl.*, icar.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    INNER JOIN int_cardiologica icar ON icar.id_int_cl_medica = icl.id_int_cl_medica
    WHERE p.id_paciente=$id_paciente
    ORDER BY icl.fecha_intervencion_cl_medica DESC";

    $result2 = mysqli_query($conn, $sql2);
    ?>

</body>
</html>

<html>
<head>
<meta charset="utf-8"> 
</head>

<body>
<h1>Historia Clinica</h1><br>
<?php
           while($row = $result4->fetch_assoc()){?>
              <tr> 
                Datos personales
                <td><?php echo "DNI: ".$row["dni"]; ?></td><br>
                <td><?php echo "Apellido/s: ".$row["apellido"]; ?></td><br>
                <td><?php echo "Nombre/s: ".$row["nombre"]; ?></td><br>
                <br><br>
          <?php } ?>

<?php

echo "Intervenciones: <br><hr>";

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


$link = mysqli_connect("localhost", "root", "jatono84");

mysqli_select_db($link, "ts_hclinicas");

$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

$result = mysqli_query($link, "SELECT p.*, icl.*
FROM paciente p
INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente

WHERE p.id_paciente=$id_paciente
ORDER BY icl.fecha_intervencion_cl_medica ASC");

while ($fila = mysqli_fetch_array($result)){

mostrarDatos($fila);



}

mysqli_free_result($result);

mysqli_close($link);

?>

</body></html>

