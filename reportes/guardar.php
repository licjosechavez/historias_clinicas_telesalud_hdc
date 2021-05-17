<?php

    require "../php/conexion.php";
    session_start();
    $id_paciente = $_GET['id_paciente'];
    //echo $id_paciente;

    function mostrarDatosCl ($resultados) {
        
        if ($resultados !=NULL) {
            //echo "<b><u>Intervención Clinica Médica</u></b><br><br>";
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
       
    } else {
      echo "<b><u>Intervención Clínica Médica</u></b><br><br>";
      echo "<br/>No hay datos. <br/>";
        }    
    }

    function mostrarDatosPs ($resultadosps) {
        
        if ($resultadosps !=NULL) {
        echo "- ID: ".$resultadosps['id_int_psicologica']."<br/> ";
        echo "- Fecha int: ".$resultadosps['fecha_int_ps']."<br/> ";
        echo "- Sintomatología: ".$resultadosps['sintomatologia_ps']."<br/> ";
        echo "- Modalidad: ".$resultadosps['modalidad_ps']."<br/>";       
        echo "- Grupo Familiar: ".$resultadosps['grupo_familiar']."<br/>";       
        echo "- Requiere interconsulta: ".$resultadosps['requiere_interconsulta_ps']."<br/>";       
        echo "- Consingar especialidad: ".$resultadosps['consignar_especialidad_ps']."<br/>";
        echo "- Requiere articulacion con otra institución: ".$resultadosps['requiere_art_institucion']."<br/>";       
        echo "- Consignar institución: ".$resultadosps['consignar_institucion']."<br/>";       
        echo "- breve reseña de la intervención: ".$resultadosps['breve_resenia_int_ps']."<br/>";
        echo "- Seguimiento: ".$resultadosps['seguimiento_ps']."<br/><br/>"; 
              
    }else {
      echo "<b><u>Intervención Psicológica</u></b><br><br>";
      echo "<br/>No hay datos. <br/>";
        }   
    }
    
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica - Completa</title>
</head>
<body>
<h1>Historia Clínica - Telesalud</h1>

<?php
if (mysqli_num_rows($result3) > 0) {
        $row = mysqli_fetch_assoc($result3);
        
        //datos personales
        $idni = $row["dni"];
        $iapellido = $row["apellido"];
        $inombre = $row["nombre"];
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
        //Mostrar datos
        
    } else {
        echo "No tiene Información.-";
}
?>


<?php
$cant=mysqli_num_rows($result3);
//echo "cantidad de registros: ".$cant."<br>";

//for($i=0;$i<$cant; $i++){
  //echo $i+1;
  /*while($fila = mysqli_fetch_array($result1)){
    echo "<h2>Cl Médica</h2>";

    echo "- ID: ".$fila['id_int_cl_medica']."<br/> ";
    echo "- Especialidad: ".$fila['consignar_especialidad']."<br/> ";


  }*/
//}
/*echo "<h2>Psico</h2>";
while($fila = mysqli_fetch_assoc($result1)){
    mostrarDatosPs($fila);
}
echo "<h2>Cardio</h2>";
while ($fila = mysqli_fetch_assoc($result2)){
    mostrarDatosCar($fila);

}*/
  
/*while($fila = mysqli_fetch_array($result1)) {
  echo" Muestra en pantalla de los resultados";
  // Para esta situación se muestran TODOS los registros
}*/
  


?>

</body>
</html>

<html><head><meta charset="utf-8"> </head>

<body>

<?php

//Ejemplo aprenderaprogramar.com

function mostrarDatos ($resultados) {

if ($resultados !=NULL) {

echo "- Nombre: ".$resultados['nombre']."<br/> ";

echo "- Id: ".$resultados['id_int_cl_medica']."<br/>";

echo "- Especialidad: ".$resultados['consignar_especialidad']."<br/>";



echo "**********************************<br/>";}

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
ORDER BY icl.fecha_intervencion_cl_medica DESC");

while ($fila = mysqli_fetch_array($result)){

mostrarDatos($fila);

}

mysqli_free_result($result);

mysqli_close($link);

?>

</body></html>

