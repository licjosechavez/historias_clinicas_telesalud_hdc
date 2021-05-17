<?php 


    

    function mostrarDatos(){
    require "../php/conexion.php";
    $query = "SELECT p.*, icl.*
    FROM paciente p
    INNER JOIN int_cl_medica icl ON p.id_paciente = icl.id_paciente
    
    WHERE p.id_paciente=35
    ORDER BY icl.fecha_intervencion_cl_medica ASC";     // Esta linea hace la consulta
    $result = mysqli_query($conn, $query);
    


    //echo $result;
    $cant = mysqli_num_rows($result);
    //echo $cant;

        for($i=0; $i<$cant; $i++){
            echo "<h2>Int. Clinica Medica</h2><br>";
            while ($row = mysqli_fetch_array($result)){
                $row = mysqli_fetch_assoc($result);
                $id_cl_m = $row["id_int_cl_medica"];
                echo $id_cl_m."<br>";
                $id_cl_m = $row["fecha_intervencion_cl_medica"];
                echo $id_cl_m;
            }
            echo "<h2>Int. Clinica PS</h2><br>";
           
            echo "<h2>Int. Clinica CAR</h2><br>";
            echo "<hr><hr>";
        }
    }
    
?>
<html> 
<head> 
<TITLE>Muestra los resultados de una consulta MySQL.</TITLE> 
</head> 

<body> 

<h1>Historia Clínica - Telesalud</h1>
<h2>Datos personales</h2><br><hr>

<?php mostrarDatos(); ?>
</body> 

</html> 